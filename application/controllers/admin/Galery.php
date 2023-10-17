<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();
		if($this->session->userdata('level')==null){ redirect(base_url('err')); }
        $this->load->model('M_activity');
		$this->load->library('notif');
    }

	//view
	public function index(){
		$data['galery'] = $this->M_activity->get_galery();
		$this->template->load('layout/argon/template', 'admin/galery_index', 'Daftar Konten', $data);
	}

	//backend
	public function hapus_galery($id){
        if($this->M_activity->delete_galery($id)){
			$this->session->set_flashdata('alert',$this->notif->set('Konten berhasil dihapus!', 'warning'));
			redirect(base_url('admin/galery'));
        }else{
            $this->session->set_flashdata('alert',$this->notif->set('Konten gagal dihapus!', 'danger'));
			redirect(base_url('admin/galery'));
        }
	}
	public function simpan(){
		$judul = $this->input->post('judul');
		$cekjudul = $this->M_activity->cek_judul($judul);
		if($cekjudul){
			$this->session->set_flashdata('alert',$this->notif->set('Judul galery sudah dipakai!', 'warning'));
			redirect(base_url('admin/galery'));
		}
		if($_FILES['foto']['size'] >= 500 * 1024){
			$this->session->set_flashdata('alert',$this->notif->set('Ukuran foto terlalu besar!', 'danger'));
			redirect(base_url('admin/galery'));
		}
		if($this->M_activity->insert_data_galery()){
			$this->session->set_flashdata('alert',$this->notif->set('Konten berhasil ditambahkan!', 'success'));
			redirect(base_url('admin/galery'));
        } else {
            $this->session->set_flashdata('alert',$this->notif->set('Konten gagal ditambahkan!', 'danger'));
			redirect(base_url('admin/galery'));
        }
	}
}
