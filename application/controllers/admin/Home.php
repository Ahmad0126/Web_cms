<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('level')==null){ redirect(base_url('err_403')); }
		$this->load->model('M_user');
        $this->load->library('notif');
	}
	public function index(){
        $this->load->model('M_activity');
        if($this->session->flashdata('tahun') == null){ $this->session->set_flashdata('tahun', date('Y')); }
        $data = [
            'jml_konten' => $this->M_activity->cek_rows('konten'),
            'jml_saran' => $this->M_activity->cek_rows('saran'),
            'jml_user' => $this->M_activity->cek_rows('user'),
            'jml_foto' => $this->M_activity->cek_rows('galeri'),
            'konten_per_kategori' => $this->M_activity->get_jml_konten_per_kategori(),
            'konten_tahunan' => $this->M_activity->get_report_konten($this->session->flashdata('tahun')),
            'tahun' => $this->M_activity->cek_upload_range()
        ];
        $this->template->load('layout/argon/template', 'admin/dashboard', 'Dashboard | Admin', $data);
	}
	public function profil(){
        $data = [
            'user' => $this->M_user->get_user_by_id($this->session->userdata('id')),
            'jml_konten' => $this->M_user->get_jml_konten_per_user($this->session->userdata('username')),
            'jml_login' => $this->M_user->count_user_login(),
            'jml_logout' => $this->M_user->count_user_logout()
        ];
        $this->template->load('layout/argon/template', 'admin/profil', 'Profil', $data);
    }

    public function set_tahun(){
        $tahun = $this->input->post('tahun');
        $this->session->set_flashdata('tahun', $tahun);
        redirect(base_url('admin/home'));
    }
    public function update_user($id){
        $data = array();
        if($_FILES['profil']['name'] != ''){
            if($_FILES['profil']['size'] >= 500 * 1024){
                $this->session->set_flashdata('alert', $this->notif->set('Ukuran foto terlalu besar!', 'danger'));
                redirect(base_url('admin/home/profil'));
            }
            $namafoto = $this->session->userdata('username').'.jpg';
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
            $this->session->set_userdata('profil', $namafoto);
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
