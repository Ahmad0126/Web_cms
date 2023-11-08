<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	protected $data_per_page = 6;
	public function __construct(){
        parent::__construct();
        $this->load->model('M_activity');
        $this->load->model('M_user');
    }
	private function get_basic_data(){
		$data['kategori'] = $this->M_activity->get_kategori();
		$data['konfig'] = $this->M_user->get_konfig();
		$data['recent_post'] = $this->M_activity->get_konten(5);
		$data['sidebar_kategori'] = $this->M_activity->get_sidebar();
		return $data;
	}
	private function init_pagination($link, $rows){
		$this->load->library('pagination');
		
		$config['base_url'] = $link;
		$config['total_rows'] = $rows;
		$config['per_page'] = $this->data_per_page;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_link'] = '< Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next >';
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
			if($data['konten'] != null){
				$this->template->load('layout/fruitkha/template', 'konten', $data['konten']->judul.' | '.$data['konfig']['judul_website'], $data);
			}else{
				redirect(base_url('err'));
			}
		}else{
			$rows = $this->M_activity->cek_rows('konten');
			$this->init_pagination(base_url('home/artikel'), $rows);
			$data['konten'] = $this->M_activity->get_konten($this->data_per_page, $this->uri->segment(3));
			$this->template->load('layout/fruitkha/template', 'artikel', 'Artikel Lainnya | '.$data['konfig']['judul_website'], $data);
		}
	}
	public function kategori($kategori){
		$data = $this->get_basic_data();
		$rows = $this->M_activity->cek_rows_by_kategori($kategori);
		$this->init_pagination(base_url('home/kategori/'.$kategori), $rows);
		$data['konten'] = $this->M_activity->get_konten_by_kategori($kategori, $this->data_per_page, $this->uri->segment(4));
		$this->template->load('layout/fruitkha/template', 'artikel', $kategori.' | '.$data['konfig']['judul_website'], $data);
	}
	public function cari(){
		$keyword = $this->input->get('key');
		$data = $this->get_basic_data();
		$this->init_pagination(base_url('home/artikel'), 'konten');
		$data['konten'] = $this->M_activity->get_konten_by_keyword($keyword, $this->data_per_page, $this->uri->segment(3));
		$this->template->load('layout/fruitkha/template', 'artikel', 'cari: '.$keyword.' | '.$data['konfig']['judul_website'], $data);
	}
	public function galeri(){
		$data = $this->get_basic_data();
		$rows = $this->M_activity->cek_rows('galeri');
		$this->init_pagination(base_url('home/galeri'), $rows);
		$data['galeri'] = $this->M_activity->get_galeri($this->data_per_page, $this->uri->segment(3));
		$this->template->load('layout/fruitkha/template', 'galeri', 'Galeri | '.$data['konfig']['judul_website'], $data);
	}
	public function saran(){
		$data = $this->get_basic_data();
		$this->template->load('layout/fruitkha/template', 'saran', 'Kontak dan saran', $data);
	}
	public function kirim(){
		$this->load->library('notif');
		if($this->M_activity->insert_data_saran()){
			$this->session->set_flashdata('alert', $this->notif->set('Pesan anda berhasil dikirim!', 'success'));
		}else{
			$this->session->set_flashdata('alert', $this->notif->set('Pesan anda gagal dikirim!', 'danger'));
		}
		redirect(base_url('home/saran'));
	}
}
