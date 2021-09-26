<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function print_array($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function toText($data)
{
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: ');
    header("Content-Type: text/plain;charset=utf-8");


    return json_encode($data);

}

function toJson($data) {
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: ');
    header("Content-Type: application/json;charset=utf-8");

    echo json_encode($data);
}

function toExcel($htmldata, $filename = "") {
    if(empty($filename)) {
        $filename = "Export_".date("Ymd");
    }
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=".$filename.".xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    echo $htmldata;
}

function toWord($htmldata, $filename = "") {
    if(empty($filename)) {
        $filename = "Export_".date("Ymd");
    }
    header("Content-Type: application/msword");
    header("Content-Disposition: attachment; filename=".$filename.".doc");  
    header("Pragma: no-cache"); 
    header("Expires: 0");

    echo $htmldata;
}

function dateToDb($datestr) {
    $dates = explode(" ", $datestr);
    $dateonlys = explode("/", $dates[0]);
    $dateconv = $dateonlys[2] . "-" . $dateonlys[1] . "-" . $dateonlys[0];
    if(count($dates) > 1) {
        $dateconv .= " " . $dates[1];
    }

    return $dateconv;
}

function dateFromDb($datestr, $withTime = FALSE) {
    $dateconv = "";
    if($datestr!="") {
        $dates = explode(" ", $datestr);
        $dateonlys = explode("-", $dates[0]);
        $dateconv = $dateonlys[2] . "/" . $dateonlys[1] . "/" . $dateonlys[0];
        if(count($dates) > 1 AND $withTime) {
            $dateconv .= " " . $dates[1];
        }
    }

    return $dateconv;
}

function dateFromDbWithName($datestr, $withTime = FALSE, $sortMonth = FALSE, $langID = TRUE) {
    $dateconv = "";
    if($datestr!="") {
        $dates = explode(" ", $datestr);
        $dateonlys = explode("-", $dates[0]);
        $dateconv = $dateonlys[1] . "/" . $dateonlys[2] . "/" . $dateonlys[0];
        if($dateonlys[2]!="") {
            $months = getMonthNames($sortMonth);
            if($langID) {
                $months = getMonthInd($sortMonth);
            }
            $dateconv = $dateonlys[2] . " " . $months[intval($dateonlys[1])] . " " . $dateonlys[0];
        }
        if(count($dates) > 1 AND $withTime) {
            $dateconv .= " " . $dates[1];
        }
    }

    return $dateconv;
}

function getMonthNames($shortname = false) {
    $months = array(
        "", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    );

    if($shortname) {
        $dtMonths = $months;
        $months = array();
        foreach($dtMonths as $m) {
            $months[] = substr($m, 0, 3);
        }
    }

    return $months;
}

function dateForDisplay($datestr, $withTime = FALSE) {
    $months = array(
        "", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
    );
    $dateconv = "";
    if($datestr!="") {
        $dates = explode(" ", $datestr);
        $dateonlys = explode("-", $dates[0]);
        $dateconv = $dateonlys[2] . " " . $months[$dateonlys[1]] . " " . $dateonlys[0];
        if(count($dates) > 1 AND $withTime) {
            $dateconv .= " " . $dates[1];
        }
    }

    return $dateconv;
}

function getMonthInd($shortname = false) {
    $months = array(
        "", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    );

    if($shortname) {
        $dtMonths = $months;
        $months = array();
        foreach($dtMonths as $m) {
            $months[] = substr($m, 0, 3);
        }
    }

    return $months;
}

function getIpClient() {
    $ipaddress = '';
    // if (getenv('HTTP_CLIENT_IP'))
    //     $ipaddress = getenv('HTTP_CLIENT_IP');
    // else if(getenv('HTTP_X_FORWARDED_FOR'))
    //     $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    // else if(getenv('HTTP_X_FORWARDED'))
    //     $ipaddress = getenv('HTTP_X_FORWARDED');
    // else if(getenv('HTTP_FORWARDED_FOR'))
    //     $ipaddress = getenv('HTTP_FORWARDED_FOR');
    // else if(getenv('HTTP_FORWARDED'))
    //     $ipaddress = getenv('HTTP_FORWARDED');
    // else if(getenv('REMOTE_ADDR'))
    //     $ipaddress = getenv('REMOTE_ADDR');
    // else
    //     $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

function getIpServer() {
    $ipaddress = '';
    // if ($_SERVER['HTTP_CLIENT_IP'])
    //     $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    // else if($_SERVER['HTTP_X_FORWARDED_FOR'])
    //     $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    // else if($_SERVER['HTTP_X_FORWARDED'])
    //     $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    // else if($_SERVER['HTTP_FORWARDED_FOR'])
    //     $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    // else if($_SERVER['HTTP_FORWARDED'])
    //     $ipaddress = $_SERVER['HTTP_FORWARDED'];
    // else if($_SERVER['REMOTE_ADDR'])
    //     $ipaddress = $_SERVER['REMOTE_ADDR'];
    // else
    //     $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

function terbilang($x) {
    $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
    if ($x < 12)
        return " " . $angka[$x];
    elseif ($x < 20)
        return terbilang($x - 10) . " belas";
    elseif ($x < 100)
        return terbilang($x / 10) . " puluh" . terbilang($x % 10);
    elseif ($x < 200)
        return " seratus" . terbilang($x - 100);
    elseif ($x < 1000)
        return terbilang($x / 100) . " ratus" . terbilang($x % 100);
    elseif ($x < 2000)
        return " seribu" . terbilang($x - 1000);
    elseif ($x < 1000000)
        return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
    elseif ($x < 1000000000)
        return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
    elseif ($x < 1000000000000)
        return terbilang($x / 1000000000) . " milyar" . terbilang($x % 1000000000);
    else
        return terbilang($x / 1000000000000) . " trilyun" . terbilang($x % 1000000000000);
}

function getendpoint() {
    $ci = &get_instance();
    $ci->config->load("ax_api", TRUE);
    $api_config = $ci->config->item("ax_api");
    $endpoint_url = $api_config["endpoint_url"];

    return $endpoint_url;
}

function resultSuccess($data, $totalCount) {
    $result = array(
        "data" => $data,
        "success" => true,
        "totalCount" => $totalCount,
        "message" => ""
        );
    return $result;
}

function resultError($data, $message) {
    $result = array(
        "data" => $data,
        "success" => false,
        "totalCount" => 0,
        "message" => $message
        );
    return $result;
}

function imgToBase64($imglocation) {
    $type = pathinfo($imglocation, PATHINFO_EXTENSION);
    $data = file_get_contents($imglocation);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

    return $base64;
}

function TanggalIndo($date){
    //$BulanIndo = array(01=>"Januari",02=>"Februari",03=>"Maret",04=>"April",05=>"Mei",06=>"Juni",07=>"Juli", 08=>"Agustus",09=>"September",10=>"Oktober",11=> "November",12=> "Desember");
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $result = $tgl . "-" . $bulan . "-". $tahun;
    return($result);
}

function TanggalIndoDDMMYYYY($date){
    //$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);

    $result = $tgl . "-" . $bulan ."-". $tahun;
    return($result);
}

function TanggalYYYYMMDD($date){
    //$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    $tahun = substr($date, 6, 4);
    $bulan = substr($date, 3, 2);
    $tgl   = substr($date, 0, 2);

    $result = $tahun . "-" . $bulan ."-". $tgl;
    return($result);
}
