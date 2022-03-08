<?php

defined('STDIN') OR exit('doh');
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
            'simpenghulu' => $this->simpenghulu(),
            'siwak' => $this->siwak(),
            'epa' => $this->penyuluh(),
            'simkah' => $this->Simkah_get()
        ];
        write_file(FCPATH . '/Dashboard_cron.json', json_encode($data), 'r+');
        $this->pusher->trigger('rudabi_dashboard-channel', 'rudabi_dashboard-event', []);
        echo 'sukses';
    }

    private function Data_json() {
        $this->curl = new Curl\Curl();
        $this->curl->setTimeout(50);
        $this->curl->setHeader('Connection', 'keep-alive');
        $this->curl->setHeader('User-Agent', $this->agent->referrer());
        $this->curl->setFollowLocation(true);
        $this->curl->get(base_url('Dashboard_cron.json'));
        return $this->curl->response;
//        print_array($sihat->sihat->alat_hisab_rukyat);
    }

    private function penyuluh() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => sys_parameter('BASE_URL')['param_value'] . 'api/e-pa/penyuluh/lists?token=' . Enkrip(sys_parameter('EPA_TOKEN')['param_value']),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 50,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: bodo_cms=njg4f10968nfmd2kfr15hrpf9vhdns30; bodo_csrf_name=6395a314621c7eebf44f0b75f1ec8950'
            )
        ));
        $response = curl_exec($curl);
        $penyuluh = json_decode($response);
        $http_code = curl_getinfo($curl)['http_code'];
        curl_close($curl);
        $kua = 0;
        $pns = 0;
        $non_pns = 0;
        $tot_penyuluh = 0;
        foreach ($penyuluh->data as $value) {
            $result = [
                'kua' => $kua += $value->jumlah_kua,
                'pns' => $pns += $value->jumlah_pns,
                'non_pns' => $non_pns += $value->jumlah_nonpns,
                'tot_penyuluh' => $tot_penyuluh += $value->jumlah_pns + $value->jumlah_nonpns
            ];
        }
        if ($http_code <> 200) {
            log_message('error', 'error ketika mendapatkan data penyuluh');
            $data = [
                'kua' => $this->Data_json()->epa->kua,
                'pns' => $this->Data_json()->epa->pns,
                'non_pns' => $this->Data_json()->epa->non_pns,
                'tot_penyuluh' => $this->Data_json()->epa->tot_penyuluh
            ];
        } else {
            $data = [
                'kua' => $result['kua'],
                'pns' => $result['pns'],
                'non_pns' => $result['non_pns'],
                'tot_penyuluh' => $result['tot_penyuluh']
            ];
        }
        return $data;
    }

    private function sihat() {
        $this->curl = new Curl\Curl();
        $this->curl->setTimeout(50);
        $this->curl->setHeader('Connection', 'keep-alive');
        $this->curl->setHeader('User-Agent', $this->agent->referrer());
        $this->curl->setFollowLocation(true);
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/siihat/total?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data sihat');
            $data = [
                'alat_hisab_rukyat' => $this->Data_json()->sihat->alat_hisab_rukyat,
                'tenaga_ahli' => $this->Data_json()->sihat->tenaga_ahli,
                'hisab_pengukuran' => $this->Data_json()->sihat->hisab_pengukuran
            ];
        } else {
            $sihat = $this->curl->response;
            $data = [
                'alat_hisab_rukyat' => $sihat[0]->alat_hisab_rukyat,
                'tenaga_ahli' => $sihat[1]->tenaga_ahli,
                'hisab_pengukuran' => $sihat[2]->hisab_pengukuran
            ];
        }
        $this->curl->close();
        return $data;
    }

    private function masjid() {
        $this->curl = new Curl\Curl();
        $this->curl->setTimeout(50);
        $this->curl->setHeader('Connection', 'keep-alive');
        $this->curl->setHeader('User-Agent', $this->agent->referrer());
        $this->curl->setFollowLocation(true);
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/eimas/dtmasjid?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        $masjid = $this->curl->response;
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data masjid');
            $data = [
                'data_masjid' => $this->Data_json()->masjid->data_masjid
            ];
        } else {
            $data = [
                'data_masjid' => $masjid[0]->data_masjid
            ];
        }
        $this->curl->close();
        return $data;
    }

    private function mushalla() {
        $this->curl = new Curl\Curl();
        $this->curl->setTimeout(50);
        $this->curl->setHeader('Connection', 'keep-alive');
        $this->curl->setHeader('User-Agent', $this->agent->referrer());
        $this->curl->setFollowLocation(true);
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/eimas/dtmushalla?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data mushalla');
            $data = [
                'data_mushalla' => $this->Data_json()->mushalla->data_mushalla
            ];
        } else {
            $mushalla = $this->curl->response;
            $data = [
                'data_mushalla' => $mushalla[0]->data_mushalla
            ];
        }
        $this->curl->close();
        return $data;
    }

    private function simpenghulu() {
        $this->curl = new Curl\Curl();
        $this->curl->setTimeout(50);
        $this->curl->setHeader('Connection', 'keep-alive');
        $this->curl->setHeader('User-Agent', $this->agent->referrer());
        $this->curl->setFollowLocation(true);
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/simpenghulu/total?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data simpenghulu');
            $data = [
                'data_kua' => $this->Data_json()->simpenghulu->data_kua,
                'data_penghulu' => $this->Data_json()->simpenghulu->data_penghulu,
                'data_peristiwa_nikah' => $this->Data_json()->simpenghulu->data_peristiwa_nikah
            ];
        } else {
            $simpenghulu = $this->curl->response;
            $data = [
                'data_kua' => $simpenghulu[0]->data_kua,
                'data_penghulu' => $simpenghulu[1]->data_penghulu,
                'data_peristiwa_nikah' => $simpenghulu[2]->data_peristiwa_nikah
            ];
        }
        $this->curl->close();
        return $data;
    }

    private function siwak() {
        $this->curl = new Curl\Curl();
        $this->curl->setTimeout(50);
        $this->curl->setHeader('Connection', 'keep-alive');
        $this->curl->setHeader('User-Agent', $this->agent->referrer());
        $this->curl->setFollowLocation(true);
        $this->curl->get('http://10.1.99.90/rudabi_api/datapi/siwaks/wakaf?KEY=BOBA');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
            log_message('error', 'error ketika mendapatkan data siwak');
            $data = [
                'tanah_wakaf' => $this->Data_json()->siwak->tanah_wakaf
            ];
        } else {
            $siwak = $this->curl->response;
            $data = [
                'tanah_wakaf' => $siwak[0]->tanah_wakaf
            ];
        }
        $this->curl->close();
        return $data;
    }

    private function Simkah_get() {
        $this->curl = new Curl\Curl();
        $this->curl->setTimeout(50);
        $this->curl->setHeader('Connection', 'keep-alive');
        $this->curl->setHeader('User-Agent', $this->agent->referrer());
        $this->curl->setFollowLocation(true);
        $this->curl->setBasicAuthentication('simkah_sim', 'simkahsim@!');
        $this->curl->setCookie('cookiesession1', '678B28A6WYZABCDEFHIJKLMNOPQR08DC');
        $this->curl->setHeader('Content-Type', 'application/json');
        $this->curl->get('https://simkah.kemenag.go.id/api/grafik/daftarnikah?tahun=' . date('Y') . '&level=pusat');
        $getInfo = $this->curl->getInfo();
        if ($getInfo['http_code'] <> 200) {
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
        $data = $this->model->index();
        $this->curl->close();
        return $data;
    }

}
