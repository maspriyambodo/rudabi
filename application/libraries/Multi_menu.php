<?php

defined("BASEPATH") or exit("No direct script access allowed");

class Multi_menu {

    private $nav_tag_open = '<ul class="menu-nav">';
    private $nav_tag_close = "</ul>";
    private $item_tag_open = '<li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">';
    private $item_tag_close = "</li>";
    private $parent_tag_open = '<li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">';
    private $parent_tag_close = "</li>";
    private $parent_anchor = '<a href="%s" class="menu-link menu-toggle">%s<i class="menu-arrow"></i></a>';
    private $parentl1_tag_open = '<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">';
    private $parentl1_tag_close = "</li>";
    private $parentl1_anchor = '<a href="%s" class="menu-link menu-toggle">%s<i class="menu-arrow"></i></a>';
    private $children_tag_open = '<div class="menu-submenu menu-item-open"><ul class="menu-subnav">';
    private $children_tag_close = "</ul></div>";
    private $item_active_class = "menu-item-active";
    private $item_active = "";
    private $item_anchor = '<a href="%s" class="menu-link">%s</a>';
    private $divided_items_list = [];
    private $divided_items_list_count = 0;
    private $item_divider = '<li class="menu-section"> <h4 class="menu-text">#</h4> <i class="menu-icon fas fa-ellipsis-h icon-md"></i> </li>';
    private $menu_id = "";
    private $menu_label = "";
    private $menu_key = "";
    private $menu_parent = "";
    private $menu_order = "";
    private $menu_icon = "";
    private $icon_position = "left";
    private $menu_icons_list = null;
    private $_additional_item = [];
    private $uri_segment = 1;
    private $group_menu = "";

    public function __construct($config = []) {
        $this->ci = &get_instance();
        $this->initialize($config);
    }

    public function initialize($config = []) {
        foreach ($config as $key => $value) {
            $this->$key = $value;
        }
        $this->divided_items_list_count = count($this->divided_items_list);
    }

    public function set_divided_items($items = [], $divider = null) {
        if (count($items)) {
            $this->divided_items_list = $items;
            $this->item_divider = $divider ? $divider : $this->item_divider;
            $this->divided_items_list_count = count($this->divided_items_list);
        }
    }

    public function render($config = [], $divided_items_list = [], $divider = "") {
        $html = "";
        if (is_array($config)) {
            $this->initialize($config);
        } elseif (is_string($config)) {
            $this->item_active = $config;
        }
        if (count($this->items)) {
            $items = $this->prepare_items($this->items);
            $this->set_divided_items($divided_items_list, $divider);
            $this->render_item($items, $html);
        }
        return $html;
    }

    public function set_items($items = []) {
        $this->items = $items;
    }

    private function prepare_items(array $data, $parent = null) {
        $items = [];
        foreach ($data as $item) {
            if ($item[$this->menu_parent] == $parent) {
                $items[$item[$this->menu_id]] = $item;
                $items[$item[$this->menu_id]]["children"] = $this->prepare_items($data, $item[$this->menu_id]);
            }
        }
        usort($items, [$this, "sort_by_order"]);
        return $items;
    }

    private function sort_by_order($a, $b) {
        return $a[$this->menu_order] - $b[$this->menu_order];
    }

    private function render_item($items, &$html = "") {
        if (empty($html)) {
            $nav_tag_opened = true;
            $html .= $this->nav_tag_open;
            if (!empty($this->_additional_item["first"])) {
                $html .= $this->_additional_item["first"];
            }
        } else {
            $html .= $this->children_tag_open;
        }
        foreach ($items as $item) {
            if (isset($item[$this->menu_label], $item[$this->menu_key])) {
                $label = $item[$this->menu_label];
                $icon = empty($item[$this->menu_icon]) ? "" : $item[$this->menu_icon];
                if (isset($this->menu_icons_list[$item[$this->menu_key]])) {
                    $icon = $this->menu_icons_list[$item[$this->menu_key]];
                }
                if ($icon) {
                    $icon = "<span class='svg-icon menu-icon'><i class='{$icon}'></i></span>";
                    $label = trim($this->icon_position == "right" ? "<span class='menu-text'>" . $label . "</span> " . $icon : $icon . " <span class='menu-text'>" . $label . "</span>");
                } else {
                    $label = trim("<i class='menu-bullet menu-bullet-dot'><span></span></i><span class='menu-text'>" . $label . "</span> ");
                }
                $slug = $item[$this->menu_key];
                $group = $item[$this->group_menu];
                $has_children = !empty($item["children"]);
                if ($this->divided_items_list_count > 0 and in_array($slug, $this->divided_items_list)) {
                    $html .= str_replace("#", $group, $this->item_divider);
                }
                if ($has_children) {
                    if (is_null($item[$this->menu_parent]) && $this->parentl1_tag_open != "") {
                        $tag_open = $this->parentl1_tag_open;
                        $item_anchor = $this->parentl1_anchor != "" ? $this->parentl1_anchor : $this->parent_anchor;
                    } else {
                        $tag_open = $this->parent_tag_open;
                        $item_anchor = $this->parent_anchor;
                    }
                    $href = "javascript:;";
                } else {
                    $tag_open = $this->item_tag_open;
                    $href = site_url($slug);
                    $item_anchor = $this->item_anchor;
                }
                $html .= $this->set_active($tag_open, $slug);
                if (substr_count($item_anchor, "%s") == 2) {
                    $html .= sprintf($item_anchor, $href, $label);
                } else {
                    $html .= sprintf($item_anchor, $label);
                }
                if ($has_children) {
                    $this->render_item($item["children"], $html);
                    if (is_null($item[$this->menu_parent]) && $this->parentl1_tag_close != "") {
                        $html .= $this->parentl1_tag_close;
                    } else {
                        $html .= $this->parent_tag_close;
                    }
                } else {
                    $html .= $this->item_tag_close;
                }
            }
        }
        if (isset($nav_tag_opened)) {
            if (!empty($this->_additional_item["last"])) {
                $html .= $this->_additional_item["last"];
            }
            $html .= $this->nav_tag_close;
        } else {
            $html .= $this->children_tag_close;
        }
    }

    public function inject_item($item, $position = null) {
        if (empty($position)) {
            $position = "last";
        }
        $this->_additional_item[$position] = $item;
        return $this;
    }

    private function set_active($html, $slug) {
        $segment = $this->ci->uri->segment($this->uri_segment);
        if (($this->item_active != "" && $slug == $this->item_active) || $slug == $segment) {
            $doc = new DOMDocument();
            $doc->loadHTML($html);
            foreach ($doc->getElementsByTagName("*") as $tag) {
                $tag->setAttribute("class", ($tag->hasAttribute("class") ? $tag->getAttribute("class") . " " : "") . $this->item_active_class);
            }
            return preg_replace("~<(?:!DOCTYPE|/?(?:html|body))[^>]*>\s*~i", "", $doc->saveHTML());
        }
        return $html;
    }

}
