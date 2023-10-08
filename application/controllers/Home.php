<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	protected $data_per_page = 9;
	public function __construct(){
        parent::__construct();
        $this->load->model('M_activity');
        $this->load->model('M_user');
    }
	private function get_basic_data(){
		$data['kategori'] = $this->M_activity->get_kategori();
		$data['konfig'] = $this->M_user->get_konfig();
		$data['recent_post'] = $this->M_activity->get_konten(5);
		return $data;
	}
	private function init_pagination(){
		$this->load->library('pagination');

		$config['base_url'] = base_url('home/artikel');
		$config['total_rows'] = $this->M_activity->cek_rows();
		$config['per_page'] = $this->data_per_page;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
	}
	public function index(){
		$data = $this->get_basic_data();
		$data['konten'] = $this->M_activity->get_konten(6);
		$data['carousel'] = $this->M_activity->get_carousel();
		$this->template->load('layout/fruitkha/template', 'beranda', 'Beranda | '.$data['konfig']['judul_website'], $data);
	}
	public function artikel($slug = null){
		$data = $this->get_basic_data();
		
		if($slug != null && !intval($slug)){
			$data['konten'] = $this->M_activity->get_konten_by_slug($slug);
			$this->template->load('layout/fruitkha/template', 'konten', $data['konten']->judul.' | '.$data['konfig']['judul_website'], $data);
		}else{
			$this->init_pagination();
			$data['konten'] = $this->M_activity->get_konten($this->data_per_page, $this->uri->segment(3));
			$this->template->load('layout/fruitkha/template', 'artikel', 'Artikel Lainnya | '.$data['konfig']['judul_website'], $data);
		}
	}
	public function kategori($kategori){
		$data = $this->get_basic_data();
		$this->init_pagination();
		$data['konten'] = $this->M_activity->get_konten_by_kategori($kategori, $this->data_per_page, $this->uri->segment(3));
		$this->template->load('layout/fruitkha/template', 'artikel', $kategori.' | '.$data['konfig']['judul_website'], $data);
	}
	public function cari(){
		$keyword = $this->input->get('key');
		$data = $this->get_basic_data();
		$this->init_pagination();
		$data['konten'] = $this->M_activity->get_konten_by_keyword($keyword, $this->data_per_page, $this->uri->segment(3));
		$this->template->load('layout/fruitkha/template', 'artikel', 'cari: '.$keyword.' | '.$data['konfig']['judul_website'], $data);
	}
}
