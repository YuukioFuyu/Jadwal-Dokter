<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dokter extends RAST_Control {

    private $data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('M_home');
    }

    function index() {
        $isi = array(
			'descript' => "Daftar Dokter"
			, 'dataTable' => $this->M_home->get_list_dokter()
            , 'add_button' => true
            , 'back_button' => false
		);

		$this->set_page('dokter', 'Dokter', $isi['descript'], '<li class="active">Daftar Dokter</li>', 'dokter', $isi);
    }

    function form() {
    	$this->output->set_content_type('application/json');

    	$id = $_POST['id'];
        echo json_encode($this->M_home->get_isi_dokter($id));
    }

    function process() {
        $post = $_POST;
        if ($this->M_home->process_dokter($post)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' dokter, SUKSES!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('Dokter');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' dokter, GAGAL! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('Dokter');
        }
    }

    function delete($a) {
        if ($this->M_home->delete_dokter($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! Dokter telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('Dokter');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! Dokter tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('Dokter');
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
