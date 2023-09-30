<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('M_activity');
        $this->load->model('M_user');
    }
	public function index(){
		$data['kategori'] = $this->M_activity->get_kategori();
		$data['konten'] = $this->M_activity->get_konten(6);
		$data['carousel'] = $this->M_activity->get_carousel();
		$data['konfig'] = $this->M_user->get_konfig();
		$this->template->load('layout/fruitkha/template', 'beranda', 'Beranda | '.$data['konfig']['judul_website'], $data);
	}
	public function artikel($slug){
		$data['kategori'] = $this->M_activity->get_kategori();
		$data['konten'] = $this->M_activity->get_konten_by_slug($slug);
		$data['konfig'] = $this->M_user->get_konfig();
		$this->template->load('layout/fruitkha/template', 'konten', $data['konten']->judul.' | '.$data['konfig']['judul_website'], $data);
	}
	public function kategori($kategori){
		$data['kategori'] = $this->M_activity->get_kategori();
		$data['konten'] = $this->M_activity->get_konten_by_kategori($kategori);
		$data['konfig'] = $this->M_user->get_konfig();
		$this->template->load('layout/fruitkha/template', 'artikel', $kategori.' | '.$data['konfig']['judul_website'], $data);
	}
}
