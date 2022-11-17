<?php

class Core
{
    public static function nama_desa()
    {
        return Database::FindAll('aplikasi')->fetch_object()->nama;
    }

    public static function kecamatan()
    {
        return Database::FindAll('aplikasi')->fetch_object()->kecamatan;
    }

    public static function kabupaten()
    {
        return Database::FindAll('aplikasi')->fetch_object()->kabupaten;
    }

    public static function provinsi()
    {
        return Database::FindAll('aplikasi')->fetch_object()->provinsi;
    }

    public static function negara()
    {
        return Database::FindAll('aplikasi')->fetch_object()->negara;
    }

    public static function logo()
    {
        return Database::FindAll('aplikasi')->fetch_object()->logo;
    }
}
