<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carousel extends CI_Controller {
	public function __construct(){
        parent::__construct();
		if($this->session->userdata('level')==null){ redirect(base_url('err_403')); }
        $this->load->model('M_activity');
		$this->load->library('notif');
    }

	//view
	public function index(){
		$data['carousel'] = $this->M_activity->get_carousel();
		$this->template->load('layout/argon/template', 'admin/carousel_index', 'Menu Carousel', $data);
	}

	//backend
	public function hapus_carousel($id){
        if($this->M_activity->delete_carousel($id)){
			$this->session->set_flashdata('alert',$this->notif->set('Carousel berhasil dihapus!', 'warning'));
        }else{
            $this->session->set_flashdata('alert',$this->notif->set('Carousel gagal dihapus!', 'danger'));
        }
        redirect(base_url('admin/carousel'));
	}
	public function simpan(){
		$judul = $this->input->post('judul');
		$cekjudul = $this->M_activity->cek_carousel($judul);
		if($cekjudul){
			$this->session->set_flashdata('alert',$this->notif->set('Judul foto sudah dipakai!', 'warning'));
            redirect(base_url('admin/carousel'));
		}
		if($_FILES['foto']['size'] >= 500 * 1024){
			$this->session->set_flashdata('alert',$this->notif->set('Ukuran foto terlalu besar!', 'danger'));
		}
		if($this->M_activity->insert_data_carousel()){
			$this->session->set_flashdata('alert',$this->notif->set('Carousel berhasil ditambahkan!', 'success'));
        } else {
            $this->session->set_flashdata('alert',$this->notif->set('Carousel gagal ditambahkan!', 'danger'));
        }
        redirect(base_url('admin/carousel'));
	}
}
