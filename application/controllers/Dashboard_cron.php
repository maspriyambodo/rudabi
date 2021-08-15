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
        $this->curl = new Curl\Curl();
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
        $this->pusher->trigger('my-channel', 'my-event', $data);
        log_message('error', 'crontab berhasil dieksekusi!');
    }

    private function sihat() {
        $sihat = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/siihat/total?KEY=BOBA');
        $data = [
            'alat_hisab_rukyat' => number_format($sihat[0]->alat_hisab_rukyat, 0),
            'tenaga_ahli' => number_format($sihat[1]->tenaga_ahli, 0),
            'hisab_pengukuran' => number_format($sihat[2]->hisab_pengukuran, 0)
        ];
        return $data;
    }

    private function masjid() {
        $masjid = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/eimas/dtmasjid?KEY=BOBA');
        $data = [
            'data_masjid' => number_format($masjid[0]->data_masjid, 0)
        ];
        return $data;
    }

    private function mushalla() {
        $mushalla = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/eimas/dtmushalla?KEY=BOBA');
        $data = [
            'data_mushalla' => number_format($mushalla[0]->data_mushalla, 0)
        ];
        return $data;
    }

    private function targetcatin() {
        $targetcatin = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/embimwin/total_targetcatin?KEY=BOBA');
        $data = [
            'realisasi_wilayah' => number_format($targetcatin[0]->realisasi_wilayah, 0)
        ];
        return $data;
    }

    private function data_catin() {
        $data_catin = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/embimwin/total_datacatin?KEY=BOBA');
        $data = [
            'jumlah_peserta' => number_format($data_catin[0]->jumlah_peserta, 0)
        ];
        return $data;
    }

    private function pustakadigital() {
        $pustakadigital = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/esbsnn/pustakadigital?KEY=BOBA');
        $data = [
            'pustakadigital' => number_format($pustakadigital[0]->total, 0)
        ];
        return $data;
    }

    private function simpenghulu() {
        $simpenghulu = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/simpenghulu/total?KEY=BOBA');
        $data = [
            'data_kua' => number_format($simpenghulu[0]->data_kua, 0),
            'data_penghulu' => number_format($simpenghulu[1]->data_penghulu, 0),
            'data_peristiwa_nikah' => number_format($simpenghulu[2]->data_peristiwa_nikah, 0)
        ];
        return $data;
    }

    private function lptq() {
        $lptq = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/simpenaiss/lptq?KEY=BOBA');
        $data = [
            'lptq' => number_format($lptq[0]->lptq, 0)
        ];
        return $data;
    }

    private function ormasislam() {
        $ormas_islam = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/simpenaiss/ormasislam?KEY=BOBA');
        $data = [
            'ormas_islam' => number_format($ormas_islam[0]->ormas_islam, 0)
        ];
        return $data;
    }

    private function penyuluh() {
        $penyuluh = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/epay/totalnew?KEY=BOBA');
        $data = [
            'penyuluh' => number_format($penyuluh[0]->penyuluh, 0)
        ];
        return $data;
    }

    private function siwak() {
        $siwak = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/siwaks/wakaf?KEY=BOBA');
        $data = [
            'tanah_wakaf' => number_format($siwak[0]->tanah_wakaf)
        ];
        return $data;
    }

    private function baznas() {
        $baznas = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/simzat/totaldatabaznas?KEY=BOBA');
        $data = [
            'databaznas' => number_format($baznas[0]->databaznas, 0)
        ];
        return $data;
    }

    private function laznas() {
        $laznas = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/simzat/totaldatalaznas?KEY=BOBA');
        $data = [
            'datalaznas' => number_format($laznas[0]->datalaznas, 0)
        ];
        return $data;
    }

    private function pustakaslim() {
        $jumlah_buku = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/pustaka/totalbuku?KEY=BOBA');
        $data = [
            'jumlah_buku' => number_format($jumlah_buku[0]->jumlah_buku, 0)
        ];
        return $data;
    }

    private function mtq() {
        $mtq = $this->curl->get('https://rudabi.kemenag.dev/rudabi_api/datapi/Mtq/totalpeserta?KEY=BOBA');
        $data = [
            'tot_mtq' => number_format($mtq[0]->total, 0)
        ];
        return $data;
    }

    public function Simkah_get() {
        $this->load->library('user_agent');
        $this->curl->setBasicAuthentication('simkah_sim', 'simkahsim@!');
        $this->curl->setCookie('cookiesession1', '678B28A6WYZABCDEFHIJKLMNOPQR08DC');
        $this->curl->setHeader('Connection', 'keep-alive');
        $this->curl->setHeader('Accept-Encoding', 'gzip, deflate, br');
        $this->curl->setHeader('Content-Type', 'application/json');
        $this->curl->setHeader('User-Agent', $this->agent->referrer());
        $this->curl->setFollowLocation(true);
        $this->curl->get('https://simkah.kemenag.go.id/api/grafik/daftarnikah?tahun=' . date('Y') . '&level=pusat');
        return $this->curl->response;
    }

}
