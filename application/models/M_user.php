<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{
    //Konfigurasi
    protected $_table = 'user';
    protected $table1 = 'konfigurasi';
    protected $table2 = 'log';
    protected $rules1 = [
        [
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|is_unique[user.username]'
        ], 
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        ], 
        [
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'
        ],
        [
            'field' => 'level',
            'label' => 'Level',
            'rules' => 'required|in_list[admin,kontributor]'
        ]
    ];
    protected $rules2 = [
        [
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'
        ],
        [
            'field' => 'level',
            'label' => 'Level',
            'rules' => 'required|in_list[admin,kontributor]'
        ]
    ];
    protected $default_rules;
    protected $update;

    private function validation(){
        $this->form_validation->set_rules($this->default_rules);
        if ($this->form_validation->run() == TRUE){
            if($this->update){
                $user = [
                    'nama' => $this->input->post('nama'),
                    'level' => $this->input->post('level')
                ];
            }else{
                $user = [
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'nama' => $this->input->post('nama'),
                    'level' => $this->input->post('level')
                ];
            }
            return $user;
        }
        return FALSE;
    }
    //Read
    public function get_user(){
        $this->db->order_by('nama', 'ASC');
        return $this->db->get($this->_table)->result();
    }
    public function get_user_by_id($id){
        return $this->db->get_where($this->_table, array('id_user' => $id))->row_array();
    }
    public function getwu_user($user){
        return $this->db->get_where($this->_table, array('username' => $user))->row_array();
    }
    public function cek_user($username){
        return $this->db->where('username', $username)->count_all_results('user');
    }
    //Create
    private function insert_user($data){
        $this->db->insert($this->_table, $data);
        return TRUE;
    }
    public function insert_data_user(){
        $this->default_rules = $this->rules1;
        $this->update = false;
        $validation_user = $this->validation();
        if ($validation_user){
            return $this->insert_user($validation_user);
        } else {
            return FALSE;
        }
    }
    //Update
    private function update_user($data, $id){
        $this->db->where('id_user',$id);
        $this->db->update($this->_table, $data);
        return TRUE;
    }
    public function update_user_data($data, $id){
        $this->db->where('id_user',$id);
        $this->db->update($this->_table, $data);
        return TRUE;
    }
    public function update_data_user($id){
        $this->default_rules = $this->rules2;
        $this->update = true;
        $validation_user = $this->validation();
        if ($validation_user){
            return $this->update_user($validation_user, $id);
        } else {
            return FALSE;
        }
    }
    public function set_login($user){
        date_default_timezone_set("Asia/Bangkok");
        $this->db->where('username',$user);
        $this->db->update($this->_table, array('last_login' => date('Y-m-d H:i:s')));
    }
    //Delete
    public function delete($id){
        $this->db->delete($this->_table, array('id_user' => $id));
        return TRUE;
    }

    //Bagian konfigurasi
    public function get_konfig(){
        return $this->db->get($this->table1)->row_array();
    }
    //Update
    public function update(){
        $data = [
            'judul_website' => $this->input->post('judul_website'),
            'profil_website' => $this->input->post('profil_website'),
            'instagram' => $this->input->post('instagram'),
            'facebook' => $this->input->post('facebook'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'no_wa' => $this->input->post('no_wa'),
            'github' => $this->input->post('github')
        ];
        $this->db->where('id_konfigurasi',1);
        return $this->db->update($this->table1, $data);
    }
    
    //Bagian Logs
    //Read
    public function get_user_logs(){
        $this->db->select('*');
        $this->db->from($this->table2);
        $this->db->join($this->_table, 'user.id_user = log.id_user');
        $this->db->order_by('waktu', 'DESC');
        return $this->db->get()->result();
    }
    public function count_user_login(){
        $where = [
            'id_user' => $this->session->userdata('id'),
            'aktivitas' => 'Log in'
        ];
        $this->db->where($where);
        return $this->db->get($this->table2)->num_rows();
    }
    public function count_user_logout(){
        $where = [
            'id_user' => $this->session->userdata('id'),
            'aktivitas' => 'Log out'
        ];
        $this->db->where($where);
        return $this->db->get($this->table2)->num_rows();
    }
    //Create
    public function create_log($aktivitas){
        date_default_timezone_set('Asia/bangkok');
        $data = [
            'waktu' => date('Y-m-d H:i:s'),
            'id_user' => $this->session->userdata('id'),
            'aktivitas' => $aktivitas
        ];
        return $this->db->insert($this->table2, $data);
    }

    //konten
    public function get_jml_konten_per_user($username){
        $this->db->select('*');
        $this->db->from('konten');
        $this->db->where('username', $username);
        return $this->db->get()->num_rows();
    }
}