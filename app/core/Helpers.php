<?php

class Helpers
{
    public static function datetime($key = null)
    {
        $kata_kunci = $key;
        $key = strtolower($key);
        date_default_timezone_set('Asia/Jayapura');
        $hari = date('D');
        $nama_hari = [
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        ];

        $bulan = date('m');
        $nama_bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'Aprul',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        if ($key == 'detik') {
            return date('s');
        } elseif ($key == 'menit') {
            return date('i');
        } elseif ($key == 'jam') {
            return date('H');
        } elseif ($key == 'hari') {
            return $nama_hari[$hari];
        } elseif ($key == 'harike') {
            return date('d');
        } elseif ($key == 'bulan') {
            return $nama_bulan[$bulan];
        } elseif ($key == 'bulanke') {
            return date('m');
        } elseif ($key == 'tanggal') {
            return date('d');
        } elseif ($key == 'tahun') {
            return date('Y');
        } elseif ($key == 'semua') {
            return $nama_hari[$hari] . ', ' . date('d ') . $nama_bulan[$bulan] . date(' Y, H:i:s');
        } else {
            return date($kata_kunci);
        }
    }

    public static function nav_on($key1, $ke2, $val)
    {
        if ($key1 == $ke2) {
            return $val;
        }
    }
}
