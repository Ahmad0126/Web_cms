<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('level')==null){ redirect(base_url('err')); }
	}
	public function index(){
        $this->template->load('layout/argon/template', 'admin/dashboard', 'Dashboard | Admin');
	}
}
