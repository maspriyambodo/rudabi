<?php

/*
 * Product:        System of kementerian agama Republik Indonesia
 * License Type:   Government
 * Access Type:    Multi-User
 * License:        https://maspriyambodo.com
 * maspriyambodo@gmail.com
 * 
 * Thank you,
 * maspriyambodo
 */

/**
 * Description of Dashboard_cron
 *
 * @author centos
 */
class Dashboard_cron extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Applications/M_simkah', 'model');
        $this->load->helper('file');
        $this->load->library('user_agent');
        $this->curl = new Curl\Curl();
        $this->curl->disableTimeout();
        $this->curl->setHeader('Connection', 'keep-alive');
        $this->curl->setHeader('User-Agent', $this->agent->referrer());
        $this->curl->setFollowLocation(true);
        $this->pusher_option = [
            'cluster' => 'ap1',
            'useTLS' => true
        ];
        $this->pusher = new Pusher\Pusher(
                '4587e4cb86b14bb98e69',
                '9c0c9ad504eeb5598286',
                '1030899',
                $this->pusher_option
        );
    }

    public function index() {
        $data = [
            'file_date' => date('Y-m-d H:i:s'),
            'sihat' => $this->sihat(),
            'masjid' => $this->masjid(),
            'mushalla' => $this->mushalla(),
            'targetcatin' => $this->targetcatin(),
            'data_catin' => $this->data_catin(),
            'pustakadigital' => $this->pustakadigital(),
            'simpenghulu' => $this->simpenghulu(),
            'lptq' => $this->lptq(),
            'ormasislam' => $this->ormasislam(),
            'penyuluh' => $this->penyuluh(),
            'siwak' => $this->siwak(),
            'baznas' => $this->baznas(),
            'laznas' => $this->laznas(),
            'pustakaslim' => $this->pustakaslim(),
            'mtq' => $this->mtq(),
            'simkah' => $this->Simkah_get()
        ];
        write_file(FCPATH . '/Dashboard_cron.json', json_encode($data), 'r+');
        $this->pusher->trigger('rudabi_dashboard-channel', 'rudabi_dashboard-event', []);
    }

    private function sihat() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/siihat/total?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data sihat');
            $data = [
                'alat_hisab_rukyat' => 0,
                'tenaga_ahli' => 0,
                'hisab_pengukuran' => 0
            ];
        } else {
            $sihat = $this->curl->response;
            $data = [
                'alat_hisab_rukyat' => $sihat[0]->alat_hisab_rukyat,
                'tenaga_ahli' => $sihat[1]->tenaga_ahli,
                'hisab_pengukuran' => $sihat[2]->hisab_pengukuran
            ];
        }
        return $data;
    }

    private function masjid() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/eimas/dtmasjid?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        $masjid = $this->curl->response;
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data masjid');
            $data = [
                'data_masjid' => 0
            ];
        } else {
            $data = [
                'data_masjid' => $masjid[0]->data_masjid
            ];
        }
        return $data;
    }

    private function mushalla() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/eimas/dtmushalla?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data mushalla');
            $data = [
                'data_mushalla' => 0
            ];
        } else {
            $mushalla = $this->curl->response;
            $data = [
                'data_mushalla' => $mushalla[0]->data_mushalla
            ];
        }
        return $data;
    }

    private function targetcatin() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/embimwin/total_targetcatin?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data targetcatin');
            $data = [
                'realisasi_wilayah' => 0
            ];
        } else {
            $targetcatin = $this->curl->response;
            $data = [
                'realisasi_wilayah' => $targetcatin[0]->realisasi_wilayah
            ];
        }
        return $data;
    }

    private function data_catin() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/embimwin/total_datacatin?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data data_catin');
            $data = [
                'jumlah_peserta' => 0
            ];
        } else {
            $data_catin = $this->curl->response;
            $data = [
                'jumlah_peserta' => $data_catin[0]->jumlah_peserta
            ];
        }
        return $data;
    }

    private function pustakadigital() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/esbsnn/pustakadigital?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data pustakadigital');
            $data = [
                'pustakadigital' => 0
            ];
        } else {
            $pustakadigital = $this->curl->response;
            $data = [
                'pustakadigital' => $pustakadigital[0]->total
            ];
        }
        return $data;
    }

    private function simpenghulu() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/simpenghulu/total?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data simpenghulu');
            $data = [
                'data_kua' => 0,
                'data_penghulu' => 0,
                'data_peristiwa_nikah' => 0
            ];
        } else {
            $simpenghulu = $this->curl->response;
            $data = [
                'data_kua' => $simpenghulu[0]->data_kua,
                'data_penghulu' => $simpenghulu[1]->data_penghulu,
                'data_peristiwa_nikah' => $simpenghulu[2]->data_peristiwa_nikah
            ];
        }
        return $data;
    }

    private function lptq() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/simpenaiss/lptq?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data lptq');
            $data = [
                'lptq' => 0
            ];
        } else {
            $lptq = $this->curl->response;
            $data = [
                'lptq' => $lptq[0]->lptq
            ];
        }
        return $data;
    }

    private function ormasislam() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/simpenaiss/ormasislam?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data ormasislam');
            $data = [
                'ormas_islam' => 0
            ];
        } else {
            $ormas_islam = $this->curl->response;
            $data = [
                'ormas_islam' => $ormas_islam[0]->ormas_islam
            ];
        }
        return $data;
    }

    private function penyuluh() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/epay/totalnew?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data penyuluh');
            $data = [
                'penyuluh' => 0
            ];
        } else {
            $penyuluh = $this->curl->response;
            $data = [
                'penyuluh' => $penyuluh[0]->penyuluh
            ];
        }
        return $data;
    }

    private function siwak() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/siwaks/wakaf?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data siwak');
            $data = [
                'tanah_wakaf' => 0
            ];
        } else {
            $siwak = $this->curl->response;
            $data = [
                'tanah_wakaf' => $siwak[0]->tanah_wakaf
            ];
        }
        return $data;
    }

    private function baznas() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/simzat/totaldatabaznas?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data baznas');
            $data = [
                'databaznas' => 0
            ];
        } else {
            $baznas = $this->curl->response;
            $data = [
                'databaznas' => $baznas[0]->databaznas
            ];
        }
        return $data;
    }

    private function laznas() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/simzat/totaldatalaznas?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data laznas');
            $data = [
                'datalaznas' => 0
            ];
        } else {
            $laznas = $this->curl->response;
            $data = [
                'datalaznas' => $laznas[0]->datalaznas
            ];
        }
        return $data;
    }

    private function pustakaslim() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/pustaka/totalbuku?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data pustakaslim');
            $data = [
                'jumlah_buku' => 0
            ];
        } else {
            $jumlah_buku = $this->curl->response;
            $data = [
                'jumlah_buku' => $jumlah_buku[0]->jumlah_buku
            ];
        }
        return $data;
    }

    private function mtq() {
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/Mtq/totalpeserta?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data mtq');
            $data = [
                'tot_mtq' => 0
            ];
        } else {
            $mtq = $this->curl->response;
            $data = [
                'tot_mtq' => $mtq[0]->total
            ];
        }
        return $data;
    }

    private function Simkah_get() {
        $this->curl->setBasicAuthentication('simkah_sim', 'simkahsim@!');
        $this->curl->setCookie('cookiesession1', '678B28A6WYZABCDEFHIJKLMNOPQR08DC');
        $this->curl->setHeader('Content-Type', 'application/json');
        $this->curl->get('https://simkah.kemenag.go.id/api/grafik/daftarnikah?tahun=' . date('Y') . '&level=pusat');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            $update = $this->model->index();
            log_message('error', 'error ketika mendapatkan data simkah');
        } else {
            $sj = $this->curl->response;
            foreach ($sj->data as $value) {
                $update[] = (object) [
                            'provinsi' => $value->name,
                            'jumlah' => $value->value
                ];
            }
            $this->model->Update_simkah($update);
        }
        return $update;
    }

}
