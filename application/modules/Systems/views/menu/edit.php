<div class="card card-custom">
    <div class="card-body">
        <form action="<?php echo site_url('Systems/Menu/Update/'); ?>" method="post">
            <input type="hidden" name="<?php echo $csrf['name'] ?>" value="<?php echo $csrf['hash'] ?>"/>
            <input type="hidden" name="id_menu" value="<?php echo str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($data[0]->id_menu)); ?>"/>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="menu_parent">Menu Parent:</label>
                        <select id="menu_parent" class="form-control custom-select" name="menu_parent">
                            <option value="">Parent</option>
                            <?php
                            foreach ($menu as $a) {
                                if ($a->id_menu == $data[0]->id_parent) {
                                    $select_menu = 'selected=""';
                                } else {
                                    $select_menu = null;
                                }
                                echo '<option value="' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($a->id_menu)) . '" ' . $select_menu . '>' . $a->nama_menu . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="link_menu">Location:</label>
                        <input id="link_menu" type="text" name="link_menu" class="form-control" autocomplete="off" required="" value="<?php echo $data[0]->link; ?>"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="nama_menu">Menu:</label>
                        <input id="nama_menu" type="text" name="nama_menu" class="form-control" autocomplete="off" required="" value="<?php echo $data[0]->nama_menu; ?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-group">
                        <label for="order_no">Order:</label>
                        <input id="order_no" type="text" name="order_no" class="form-control" required="" autocomplete="off" value="<?php echo $data[0]->order_no; ?>"/>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="gr_menu">Group:</label>
                        <select id="gr_menu" class="form-control custom-select" required="" name="gr_menu">
                            <option value="" <?php
                            if ($data[0]->id_parent) {
                                echo 'disabled=""';
                            } else {
                                echo null;
                            }
                            ?>>Choose Group</option>
                                    <?php
                                    foreach ($name_group as $name_group) {
                                        if ($name_group->id == $data[0]->id_group_menu) {
                                            $select_group = 'selected=""';
                                        } else {
                                            $select_group = null;
                                        }
                                        if ($data[0]->id_parent and $name_group->id != $data[0]->id_group_menu) {
                                            $select_disable = 'disabled=""';
                                        } else {
                                            $select_disable = null;
                                        }
                                        echo '<option value="' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($name_group->id)) . '" ' . $select_group . ' ' . $select_disable . '>' . $name_group->nama . '</option>';
                                    }
                                    ?>
                        </select>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-group">
                        <label for="ico_menu">Icon:</label>
                        <input id="ico_menu" type="text" name="ico_menu" class="form-control" autocomplete="off" value="<?php echo $data[0]->icon; ?>"/>
                    </div>
                </div>
            </div>
            <hr>
            <div class="btn-group">
                <a href="<?php echo site_url('Systems/Menu/index/'); ?>" class="btn btn-danger" title="Cancel Update"><i class="fas fa-times"></i> Cancel</a>
                <button type="submit" class="btn btn-success"><i class="far fa-save"></i> Update</button>
            </div>
        </form>
    </div>
</div>