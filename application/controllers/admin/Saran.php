<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran extends CI_Controller {
	public function __construct(){
        parent::__construct();
		if($this->session->userdata('level')==null){ redirect(base_url('err_403')); }
        $this->load->model('M_activity');
		$this->load->library('notif');
    }

	//view
	public function index(){
		$data['saran'] = $this->M_activity->get_saran();
		$this->template->load('layout/argon/template', 'admin/saran_index', 'Masukan Pengunjung', $data);
	}
	public function lihat($id){
		$data['saran'] = $this->M_activity->get_saran_by_id($id);
		$this->template->load('layout/argon/template', 'admin/saran', 'Saran dari '.$data['saran']['nama'], $data);
	}

	//backend
	public function hapus_saran($id = null){
		if($id != null){
			if($this->M_activity->delete_saran($id)){
                $this->session->set_flashdata('alert',$this->notif->set('Saran berhasil dihapus!', 'success'));
                redirect(base_url('admin/saran'));
            } else {
                $this->session->set_flashdata('alert',$this->notif->set('Saran gagal dihapus!', 'danger'));
                redirect(base_url('admin/saran'));
            }
        } else {
            if($this->M_activity->delete_all_saran()){
                $this->session->set_flashdata('alert',$this->notif->set('Saran berhasil dihapus!', 'success'));
                redirect(base_url('admin/saran'));
            } else {
                $this->session->set_flashdata('alert',$this->notif->set('Saran gagal dihapus!', 'danger'));
                redirect(base_url('admin/saran'));
            }
        }
	}
}
