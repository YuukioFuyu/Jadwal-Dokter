<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Poli extends RAST_Control {

    private $data = array();

    function __construct() {
        parent::__construct();

        $this->load->model('M_home');
    }

    function index() {
        $isi = array(
			'descript' => "Daftar Poli"
			, 'dataTable' => $this->M_home->get_list_poli()
            , 'add_button' => true
            , 'back_button' => false
		);

		$this->set_page('poli', 'Poli', $isi['descript'], '<li class="active">Daftar Poli</li>', 'poli', $isi);
    }

    function form() {
    	$this->output->set_content_type('application/json');

    	$id = $_POST['id'];
        echo json_encode($this->M_home->get_isi_poli($id));
    }

    function process() {
        $post = $_POST;
        if ($this->M_home->process_poli($post)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' poli, SUKSES!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('Poli');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! ' . (($post['id'] == '') ? 'Penambahan' : 'Perubahan') . ' poli, GAGAL! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('Poli');
        }
    }

    function delete($a) {
        if ($this->M_home->delete_poli($a)) {
            $this->session->set_userdata('pesan_sistem', 'Selamat! Poli telah dihapus!');
            $this->session->set_userdata('tipe_pesan', 'Sukses');
            redirect('Poli');
        } else {
            $this->session->set_userdata('pesan_sistem', 'Maaf! Poli tidak terhapus! Silahkan periksa dan coba kembali');
            $this->session->set_userdata('tipe_pesan', 'Gagal');
            redirect('Poli');
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
