<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('level')==null){ redirect(base_url('err')); }
		$this->load->model('M_user');
        $this->load->library('notif');
	}
	public function index(){
        $this->template->load('layout/argon/template', 'admin/dashboard', 'Dashboard | Admin');
	}
	public function profil(){
        $data['user'] = $this->M_user->get_user_by_id($this->session->userdata('id'));
        $this->template->load('layout/argon/template', 'admin/profil', 'Profil', $data);
    }

    public function update_user($id){
        $data = array();
        if($_FILES['profil']['name'] != ''){
            if($_FILES['profil']['size'] >= 500 * 1024){
                $this->session->set_flashdata('alert', $this->notif->set('Ukuran foto terlalu besar!', 'danger'));
                redirect(base_url('admin/home/profil'));
            }
            $namafoto = date('YmdHis').'.jpg';
            $config['upload_path'] = 'assets/upload/profil';
            $config['max_size'] = 500 * 1024;
            $config['overwrite'] = true;
            $config['file_name'] = $namafoto;
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('profil')){
                $this->session->set_flashdata('alert', $this->notif->set('Foto profil gagal diganti!', 'danger'));
                redirect(base_url('admin/home/profil'));
            }
            $data += array('profil' => $namafoto);
        }
        $data += array('nama' => $this->input->post('nama'));
        $this->M_user->update_user_data($data, $id);
        $this->session->set_userdata('nama', $this->input->post('nama'));
        $this->session->set_flashdata('alert', $this->notif->set('Profil berhasil diubah!', 'success'));
        redirect(base_url('admin/home/profil'));
    }
    public function update_pass($id){
        $pass = $this->input->post('password');
        $pl = $this->input->post('pl');
        $pk = $this->input->post('pk');
		$cek = $this->M_user->getwu_user($this->session->userdata('username'));
        if($cek){
            if(md5($pl) == $cek['password']){
                if($pass == $pk){
                    $this->M_user->update_user_data(array('password' => md5($pass)), $id);
                    $this->session->set_flashdata('alert', $this->notif->set('Password berhasil diubah!', 'success'));
                    redirect(base_url('admin/home/profil'));
                }else{
                    $this->session->set_flashdata('pl_val', $pl);
                    $this->session->set_flashdata('pp_val', $pass);
                    $this->session->set_flashdata('pk_val', $pk);
                    $this->session->set_flashdata('konf', 'Password Tidak Sama!');
                    $this->session->set_flashdata('alert', $this->notif->set('Konfirmasi Password Baru Kembali!', 'danger'));
                    redirect(base_url('admin/home/profil'));
                }
            }else{
                $this->session->set_flashdata('pl_val', $pl);
                $this->session->set_flashdata('pp_val', $pass);
                $this->session->set_flashdata('pk_val', $pk);
                $this->session->set_flashdata('password', 'Password Salah!');
                $this->session->set_flashdata('alert', $this->notif->set('Password Lama Salah!', 'danger'));
                redirect(base_url('admin/home/profil'));
            }
        }
    }
}
