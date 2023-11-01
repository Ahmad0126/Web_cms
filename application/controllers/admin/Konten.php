<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konten extends CI_Controller {
	public function __construct(){
        parent::__construct();
		if($this->session->userdata('level')==null){ redirect(base_url('err_403')); }
        $this->load->model('M_activity');
		$this->load->library('notif');
    }

	//view
	public function index(){
		$data['konten'] = $this->M_activity->get_konten();
		$this->template->load('layout/argon/template', 'admin/konten_index', 'Daftar Konten', $data);
	}
	public function tambah(){
		$data['kategori'] = $this->M_activity->get_kategori();
		$this->template->load('layout/argon/template', 'admin/form_konten', 'Tambah konten', $data);
	}
	public function edit($id){
		$data['konten'] = $this->M_activity->get_konten_by_id($id);
		$data['kategori'] = $this->M_activity->get_kategori();
		//var_dump($data); die;
		$this->template->load('layout/argon/template', 'admin/form_konten', 'Edit konten', $data);
	}

	//backend
	public function hapus_konten($id){
        if($this->M_activity->delete_konten($id)){
			$this->session->set_flashdata('alert',$this->notif->set('Konten berhasil dihapus!', 'warning'));
			redirect(base_url('admin/konten'));
        }else{
            $this->session->set_flashdata('alert',$this->notif->set('Konten gagal dihapus!', 'danger'));
			redirect(base_url('admin/konten'));
        }
	}
	public function simpan(){
		$judul = $this->input->post('judul');
		$cekjudul = $this->M_activity->cek_judul($judul);
		if($cekjudul){
			$this->session->set_flashdata('alert',$this->notif->set('Judul konten sudah dipakai!', 'warning'));
			redirect(base_url('admin/konten'));
		}
		if($_FILES['foto']['size'] >= 500 * 1024){
			$this->session->set_flashdata('alert',$this->notif->set('Ukuran foto terlalu besar!', 'danger'));
			redirect(base_url('admin/konten'));
		}
		if($this->M_activity->insert_data_konten()){
			$this->session->set_flashdata('alert',$this->notif->set('Konten berhasil ditambahkan!', 'success'));
			redirect(base_url('admin/konten'));
        } else {
            $this->session->set_flashdata('alert',$this->notif->set('Konten gagal ditambahkan!', 'danger'));
			redirect(base_url('admin/konten'));
        }
	}
	public function update_konten($id){
		if($this->M_activity->update_data_konten($id)){
			$this->session->set_flashdata('alert',$this->notif->set('Konten berhasil diedit!', 'success'));
			redirect(base_url('admin/konten'));
        } else {
            $this->session->set_flashdata('alert',$this->notif->set('Konten gagal diedit!', 'danger'));
			redirect(base_url('admin/konten'));
        }
	}
}
