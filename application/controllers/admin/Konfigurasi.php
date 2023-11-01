<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {
	public function __construct(){
        parent::__construct();
		if($this->session->userdata('level')!='admin'){ redirect(base_url('err_403')); }
        $this->load->model('M_user');
		$this->load->library('notif');
    }

	//view
	public function index(){
		$data['konfig'] = $this->M_user->get_konfig();
		$this->template->load('layout/argon/template', 'admin/konfig_index', 'Menu Konfigurasi', $data);
	}

	//backend
	public function update(){
		if($this->M_user->update()){
			$this->session->set_flashdata('alert',$this->notif->set('Konfigurasi berhasil diedit!', 'success'));
			redirect(base_url('admin/konfigurasi'));
        } else {
            $this->session->set_flashdata('alert',$this->notif->set('Konfigurasi gagal diedit!', 'danger'));
			redirect(base_url('admin/konfigurasi'));
        }
	}
}
