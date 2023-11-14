<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('M_user');
    }
	public function index(){
        $data['konfig'] = $this->M_user->get_konfig();
        $this->template->load('layout/argon/template1', 'login', 'Login', $data);
	}

	public function log_in(){
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
		$cek = $this->M_user->getwu_user($user);
        if($cek){
            if(md5($pass) == $cek['password']){
                $this->session->set_userdata('level', $cek['level']);
                $this->session->set_userdata('id', $cek['id_user']);
                $this->session->set_userdata('nama', $cek['nama']);
                $this->session->set_userdata('username', $cek['username']);
                $this->session->set_userdata('profil', $cek['profil']);
                $this->M_user->create_log('Log in');
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
        $this->M_user->create_log('Log out');
        $user = array('level', 'id', 'nama');
        $this->session->unset_userdata($user);
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
	public function err(){
        $data['konfig'] = $this->M_user->get_konfig();
        $this->load->view('errors/html/err_404', $data);
	}
	public function err_403(){
        $data['konfig'] = $this->M_user->get_konfig();
        $this->load->view('errors/html/error_403', $data);
	}
}
