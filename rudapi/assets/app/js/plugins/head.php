<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./favicon.ico">

    <title>Pustaka Bimas Islam - Kementerian Agama Republik Indonesia</title>

    <link href="./assets/css/fontawesome-all.min.css" rel="stylesheet" />
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/js/plugins/camera/camera.css" rel="stylesheet" />
    <link href="./assets/js/plugins/vegas/vegas.min.css" rel="stylesheet" />

    <link href="./assets/css/style.css" rel="stylesheet">
    <link href="./assets/css/style.resp.css" media="screen and (max-width: 600px)" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-sm">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-chevron-circle-right"></i>
      </button>
      <a class="navbar-brand" href="#" alt="Unit Percetakan Al-Qur'an"><span>UPQ</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse2" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-align-justify"></i>
      </button>
      <div class="navbar-brand-right mt-2 mt-md-0 text-center">
        <img src="./assets/img/logo-kemenag.png" alt="Kementerian Agama Republik Indonesia" />
        <div class="navbar-brand-right-title">
            <h1>Direktorat Jenderal Bimbingan Masyarakat Islam</h1>
            <h4>Kementerian Agama Republik Indonesia</h4>
        </div>
      </div>
    </nav>
    <div class="navbar-nav-outer navbar-expand-sm">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item<?php echo ($active_page=="BIMAS"?" active":""); ?>">
                    <a class="nav-link" href="bimas.php">Bimas Islam</a>
                </li>
                <li class="nav-item<?php echo ($active_page=="KETENTUAN"?" active":""); ?>">
                    <a class="nav-link" href="ketentuan.php">Ketentuan</a>
                </li>
                <li class="nav-item<?php echo ($active_page=="SEARCH"?" active":""); ?>">
                    <a class="nav-link" href="pencarian.php">Pencarian</a>
                </li>
                <li class="nav-item<?php echo ($active_page=="CONTACT"?" active":""); ?>">
                    <a class="nav-link" href="kontak-kami.php">Kontak Kami</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-nav-outer-bottom navbar-expand-sm">
        <div class="collapse navbar-collapse" id="navbarCollapse2">
            <ul class="navbar-nav">
                <li class="nav-item<?php echo ($active_page=="HOME"?" active":""); ?>">
                    <a class="nav-link" href="./">Beranda</a>
                </li>
                <li class="nav-item dropdown<?php echo ($active_page=="REGULASI"?" active":""); ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Regulasi</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Undang Undang</a>
                        <a class="dropdown-item" href="#">Peraturan Pemerintah</a>
                        <a class="dropdown-item" href="#">Peraturan Presiden</a>
                        <a class="dropdown-item" href="#">Keputusan Presiden</a>
                        <a class="dropdown-item" href="#">Peraturan Kementerian Agama</a>
                        <a class="dropdown-item" href="#">Keputusan Kementerian Agama</a>
                        <a class="dropdown-item" href="#">Lainnya</a>
                    </div>
                </li>
                <li class="nav-item dropdown<?php echo ($active_page=="URUSAN"?" active":""); ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Urusan Agama Islam<br/><span>dan Pembinaan Syariah</span></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Hisab Rukyat dan Syariah</a>
                        <a class="dropdown-item" href="#">Kemasjidan</a>
                        <a class="dropdown-item" href="#">Bina Paham Keagamaan Islam & Penanganan Konflik</a>
                        <a class="dropdown-item" href="#">Kepustakaan Islam</a>
                
                    </div>
                </li>
                <li class="nav-item dropdown<?php echo ($active_page=="PENERANGAN"?" active":""); ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Bina KUA<br/><span>dan Keluarga Sakinah</span></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Bina Kepenghulluan</a>
                        <a class="dropdown-item" href="#">Bina Kelembagaan KUA</a>
                        <a class="dropdown-item" href="#">Mutu, Sarana, Prasarana & Sistem Informasi KUA</a>
                        <a class="dropdown-item" href="#">Bina Keluarga Sakinah</a>
           
                    </div>
                </li>
                <li class="nav-item dropdown<?php echo ($active_page=="ZAKAT"?" active":""); ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Penerangan<br/><span>Agama Islam</span></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Penyuluhan Agama Islam</a>
                        <a class="dropdown-item" href="#">Dakwah & HBI</a>
                        <a class="dropdown-item" href="#">Lembaga Tilawah & Musabaqah AlQuran</a>
                        <a class="dropdown-item" href="#">Kemitraan Umat Islam</a>
                        <a class="dropdown-item" href="#">Seni, Budaya dan Siaran Keagamaan</a>


                    </div>
                </li>
                <li class="nav-item dropdown<?php echo ($active_page=="WAKAF"?" active":""); ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Zakat & Wakaf<br/><span>Pemberdayaan Zakat & Wakaf</span></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Kelembagaan & Informasi Zakat dan Wakaf </a>
                        <a class="dropdown-item" href="#">Edukasi, Inovasi & Kerjasama Zakat dan Wakaf </a>
                        <a class="dropdown-item" href="#">Akreditasi & Audit Lembaga Zakat</a>
                        <a class="dropdown-item" href="#">Pengamanan Aset Wakaf</a>

                    </div>
                </li>
                <li class="nav-item dropdown<?php echo ($active_page=="MANAJEMEN"?" active":""); ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Manajemen<br/><span>Bimas Islam</span></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Perencanaan</a>
                        <a class="dropdown-item" href="#">Keuangan & Pendapatan Negara Bukan Pajak</a>
                        <a class="dropdown-item" href="#">Organisasi Kepegawaian & Hukum</a>
                        <a class="dropdown-item" href="#">Umum & Barang Milik Negara</a>
                        <a class="dropdown-item" href="#">Data, Sistem Informasi & Hubungan Masyarakat</a>
                    </div>
                </li>
                <li class="nav-item dropdown<?php echo ($active_page=="PUSTAKA"?" active":""); ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Pustaka<br/><span>Islami</span></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Islam (Umum)</a>
                        <a class="dropdown-item" href="#">Al-Quran & Ilmu Terkait</a>
                        <a class="dropdown-item" href="#">Hadis & Ilmu Terkait</a>
                        <a class="dropdown-item" href="#">Aqaid & Ilmu Kalam</a>
                        <a class="dropdown-item" href="#">Fiqh</a>
                        <a class="dropdown-item" href="#">Akhlak & Tasawuf</a>
                        <a class="dropdown-item" href="#">Sosial & Budaya</a>
                        <a class="dropdown-item" href="#">Filsafat & Perkembangannya</a>
                        <a class="dropdown-item" href="#">Aliran & Sekter</a>
                        <a class="dropdown-item" href="#">Sejarah, Islam & Modernisasi</a>

                    </div>
                </li>
                <li class="nav-item<?php echo ($active_page=="KATALOG"?" active":""); ?>">
                    <a class="nav-link" href="#">OPAC</a>
                </li>
            </ul>
        </div>
    </div>

    <main role="main" class="container">