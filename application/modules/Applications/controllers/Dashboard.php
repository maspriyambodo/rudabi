<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->user = $this->bodo->Dec($this->session->userdata('id_user'));
        $this->curl = new Curl\Curl();
    }

    public function index() {
        $data = [
            'csrf' => $this->bodo->Csrf(),
            'item_active' => 'Applications/Dashboard/index/',
            'privilege' => $this->bodo->Check_previlege('Applications/Dashboard/index/'),
            'pagetitle' => 'Dashboard',
            'siteTitle' => 'Dashboard Application | ' . $this->bodo->Sys('app_name'),
            'breadcrumb' => [
                0 => [
                    'nama' => 'Dashboard',
                    'link' => null,
                    'status' => true
                ]
            ]
        ];
        $data['content'] = $this->parser->parse("v_dashboard", $data, true);
        return $this->parser->parse('Template/layout', $data);
    }

    public function Get_sihat() {
        $this->curl->get($this->bodo->Url_API() . 'siihat/total?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_masjid() {
        $this->curl->get($this->bodo->Url_API() . 'eimas/dtmasjid?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_musholla() {
        $this->curl->get($this->bodo->Url_API() . 'eimas/dtmushalla?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_targetcatin() {
        $this->curl->get($this->bodo->Url_API() . 'embimwin/total_targetcatin?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_datacatin() {
        $this->curl->get($this->bodo->Url_API() . 'embimwin/total_datacatin?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_alat() {
        $this->curl->get($this->bodo->Url_API() . 'siihat/alat?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_pustakadigital() {
        $this->curl->get($this->bodo->Url_API() . 'esbsnn/pustakadigital?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_satker() {
        $this->curl->get($this->bodo->Url_API() . 'esbsnn/sekretariat?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_sicakep() {
        $this->curl->get($this->bodo->Url_API() . 'sicakepp/total?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_monev() {
        $this->curl->get($this->bodo->Url_API() . 'monev/total?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_simpenghulu() {
        $this->curl->get($this->bodo->Url_API() . 'simpenghulu/total?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_lptq() {
        $this->curl->get($this->bodo->Url_API() . 'simpenaiss/lptq?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_ormasislam() {
        $this->curl->get($this->bodo->Url_API() . 'simpenaiss/ormasislam?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_penyuluh() {
        $this->curl->get($this->bodo->Url_API() . 'epay/totalnew?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_siwak() {
         $this->curl->get($this->bodo->Url_API() . 'siwaks/wakaf?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_baznas() {
        $this->curl->get($this->bodo->Url_API() . 'simzat/totaldatabaznas?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_laznas() {
        $this->curl->get($this->bodo->Url_API() . 'simzat/totaldatalaznas?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_pustakaslim() {
        $this->curl->get($this->bodo->Url_API() . 'pustaka/totalbuku?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

    public function Get_mtq() {
        $this->curl->get($this->bodo->Url_API() . 'Mtq/totalpeserta?KEY=BOBA');
        if ($this->curl->error) {
            $response = [];
        } else {
            $response = $this->curl->response;
        }
        ToJson($response);
    }

}
