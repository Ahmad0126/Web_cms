<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index(){
        $this->template->load('layout/template1', 'login', 'Login');
	}

	public function log_in(){
		$this->load->model('M_user');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
		$cek = $this->M_user->getwu_user($user);
        if($cek){
            if(md5($pass) == $cek['password']){
                $this->session->set_userdata('level', $cek['level']);
                $this->session->set_userdata('id', $cek['id_user']);
                $this->session->set_userdata('nama', $cek['nama']);
                $this->session->set_userdata('username', $cek['username']);
                redirect(base_url('admin/home'));
            }else{
                $this->session->set_flashdata('username_val', $user);
                $this->session->set_flashdata('password', 'Password Salah!');
                redirect(base_url('auth'));
            }
        }else{
            $this->session->set_flashdata('username_val', $user);
                $this->session->set_flashdata('username', 'Username tidak terdaftar!');
            redirect(base_url('auth'));
        }
	}
	public function log_out(){
        $user = array('level', 'id', 'nama');
        $this->session->unset_userdata($user);
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
	public function err(){
		$this->template->load('layout/template1', 'errors/html/err_404', 'Halaman tidak ditemukan');
	}
}
