<?php
namespace App\Controllers;
class Web extends BaseController {
    public function index() {
        echo "hallo nama saya Code Igniter 4 salam Kenal";
    }

   
    public function komentar() {
        echo "ini adalah fungsi komentar";
    }

    //public function nama($nama) {
        //echo "Haloo nama saya $nama";
    //}

    public function nama($nama,$umur) {
        echo "Haloo nama saya $nama, umur saya $umur";
    }
}