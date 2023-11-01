<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galery extends CI_Controller {
	public function __construct(){
        parent::__construct();
		if($this->session->userdata('level')==null){ redirect(base_url('err_403')); }
        $this->load->model('M_activity');
		$this->load->library('notif');
    }

	//view
	public function index(){
		$data['galery'] = $this->M_activity->get_galeri();
		$this->template->load('layout/argon/template', 'admin/galery_index', 'Daftar Galeri Foto', $data);
	}

	//backend
	public function hapus_galery($id){
        if($this->M_activity->delete_galeri($id)){
			$this->session->set_flashdata('alert',$this->notif->set('Foto berhasil dihapus!', 'warning'));
			redirect(base_url('admin/galery'));
        }else{
            $this->session->set_flashdata('alert',$this->notif->set('Foto gagal dihapus!', 'danger'));
			redirect(base_url('admin/galery'));
        }
	}
	public function simpan(){
		$judul = $this->input->post('judul');
		$cekjudul = $this->M_activity->cek_judul_foto($judul);
		if($cekjudul){
			$this->session->set_flashdata('alert',$this->notif->set('Judul foto sudah dipakai!', 'warning'));
			redirect(base_url('admin/galery'));
		}
		if($_FILES['foto']['size'] >= 500 * 1024){
			$this->session->set_flashdata('alert',$this->notif->set('Ukuran foto terlalu besar!', 'danger'));
			redirect(base_url('admin/galery'));
		}
		if($this->M_activity->insert_data_galeri()){
			$this->session->set_flashdata('alert',$this->notif->set('Foto berhasil ditambahkan!', 'success'));
			redirect(base_url('admin/galery'));
        } else {
            $this->session->set_flashdata('alert',$this->notif->set('Foto gagal ditambahkan!', 'danger'));
			redirect(base_url('admin/galery'));
        }
	}
}
