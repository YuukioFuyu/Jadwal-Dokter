<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video extends RAST_Control {

    private $data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('M_home');
    }

    function index($a = 1) {
        // Jumlah Maksimal Video
        $max = 1;
        $d['next'] = (($a >= 1 && $a < $max) ? ('video/index/' . ($a + 1)) : '');
        $d['vid'] = $a;
        $this->load->view("video", $d);
    }
//     function index() {
//         $isi = array(
// 			'descript' => "Summary Report"
//             , 'add_button' => false
//             , 'back_button' => false
// 		);
// 
//         if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 4) {
//             $isi['jual'] = $this->M_dashboard->getPenjualan();
//         }
//         if ($this->session->userdata('level') == 1) {
//             $isi['transaksi'] = $this->M_dashboard->getTransaksi();
//         }
//         if ($this->session->userdata('level') == 2) {
//             $isi['outlet'] = $this->M_dashboard->getOutlet();
//             $isi['komisi'] = $this->M_dashboard->getKomisi();
//         }
//         if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) {
//             $isi['bagihasil'] = $this->M_dashboard->getBagi();
//         }
// 
// 		$this->set_page('dashboard', 'Dashboard', $isi['descript'], '<li class="active">Dashboard</li>', 'dashboard', $isi);
//     }
// 
//     function set_page($menu, $page, $descript, $breadcrumb, $file, $isi) {
//         $data['menu'] = $menu;
//         $data['page'] = $page;
//         $data['descript'] = $descript;
//         $data['breadcrumb'] = $breadcrumb;
// 
//         $data['content'] = $this->load->view($file, $isi, TRUE);
//         $this->load->view('template/template', $data);
//     }

}
