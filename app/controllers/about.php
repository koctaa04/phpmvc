<?php

class About extends Controller {
    public function index($nama = "entah", $kerja = "manusia", $umur = 32){
        $data['nama'] = $nama; 
        $data['pekerjaan'] = $kerja ;
        $data['umur'] = $umur;
        $data['judul'] = 'About me';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
        // echo "Halo, Nama saya $nama , saya seorang $kerja, saya berumur $umur tahun";
    }
    public function page(){
        $data['judul'] = 'My Page';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
        // echo 'About/page';
    }
}