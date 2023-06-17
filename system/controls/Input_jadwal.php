<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Input_jadwal extends RAST_Control {

    private $data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('M_home');
    }

    function index() {
        $isi = array(
			'descript' => "Input Jadwal Dokter"
			, 'dataTable' => $this->M_home->get_list_all()
			, 'poli' => $this->M_home->get_list_poli()
			, 'dokter' => $this->M_home->get_list_dokter()
            , 'add_button' => true
            , 'back_button' => false
		);

		$this->set_page('input_jadwal', 'Input Jadwal', $isi['descript'], '<li class="active">Input Jadwal</li>', 'input_jadwal', $isi);
    }

    function form() {
    	$this->output->set_content_type('application/json');

    	$id = $_POST['id'];
        echo json_encode($this->M_home->get_isi($id));
    }

    function process() {
        $post = $_POST;
        if ($this->M_home->process($post)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['member_id'] == '') ? 'Penambahan' : 'Perubahan') . ' jadwal, SUKSES!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('Input_jadwal');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['member_id'] == '') ? 'Penambahan' : 'Perubahan') . ' jadwal, GAGAL! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('Input_jadwal');
        }
    }

    function delete($a) {
        if ($this->M_home->delete($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! Jadwal telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('Input_jadwal');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! Jadwal tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('Input_jadwal');
        }
    }

    function set_page($menu, $page, $descript, $breadcrumb, $file, $isi) {
        $data['menu'] = $menu;
        $data['page'] = $page;
        $data['descript'] = $descript;
        $data['breadcrumb'] = $breadcrumb;

        $data['content'] = $this->load->view($file, $isi, TRUE);
        $this->load->view('template/template', $data);
    }

}
