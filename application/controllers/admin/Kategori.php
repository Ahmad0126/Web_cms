<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct(){
        parent::__construct();
		if($this->session->userdata('level')==null){ redirect(base_url('err')); }
        $this->load->model('M_activity');
		$this->load->library('notif');
    }

	//view
	public function index(){
		$data['kategori'] = $this->M_activity->get_kategori();
		$this->template->load('layout/argon/template', 'admin/kategori_index', 'Daftar kategori', $data);
	}
	public function tambah(){
		$this->template->load('layout/argon/template', 'admin/form_kategori', 'Tambah kategori');
	}
	public function edit($id){
		$data['kategori'] = $this->M_activity->get_kategori_by_id($id);
		$this->template->load('layout/argon/template', 'admin/form_kategori', 'Edit kategori', $data);
	}

	//backend
	public function hapus_kategori($id){
        if($this->M_activity->delete($id)){
			$this->session->set_flashdata('alert',$this->notif->set('Kategori berhasil dihapus!', 'warning'));
			redirect(base_url('admin/kategori'));
        }else{
            $this->session->set_flashdata('alert',$this->notif->set('Kategori gagal dihapus!', 'danger'));
			redirect(base_url('admin/kategori'));
        }
	}
	public function simpan(){
		$kategori = $this->input->post('kategori');
		$cekkategori = $this->M_activity->cek_kategori($kategori);
		if($cekkategori){
			$this->session->set_flashdata('alert',$this->notif->set('Kategori sudah dipakai!', 'warning'));
			redirect(base_url('admin/kategori'));
		}
		if($this->M_activity->insert_data_kategori()){
			$this->session->set_flashdata('alert',$this->notif->set('Kategori berhasil ditambahkan!', 'success'));
			redirect(base_url('admin/kategori'));
        } else {
            $this->session->set_flashdata('alert',$this->notif->set('Kategori gagal ditambahkan!', 'danger'));
			redirect(base_url('admin/kategori'));
        }
	}
	public function update_kategori($id){
		if($this->M_activity->update_data_kategori($id)){
			$this->session->set_flashdata('alert',$this->notif->set('Kategori berhasil diedit!', 'success'));
			redirect(base_url('admin/kategori'));
        } else {
            $this->session->set_flashdata('alert',$this->notif->set('Kategori gagal diedit!', 'danger'));
			redirect(base_url('admin/kategori'));
        }
	}
	public function include($id){
		if($this->input->post('id') != null){
			$status = 'on';
			$this->session->set_flashdata('alert',$this->notif->set('Kategori ditampilkan!', 'success'));
		}else{
			$status = 'off';
			$this->session->set_flashdata('alert',$this->notif->set('Kategori tidak ditampilkan!', 'warning'));
		}
		$this->M_activity->include_kategori($id, $status);
		redirect(base_url('admin/kategori'));
	}
}
