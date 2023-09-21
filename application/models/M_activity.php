<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_activity extends CI_Model{
    //Konfigurasi
    protected $_table = 'kategori';
    protected $table1 = 'konten';
    protected $rules1 = [
        [
            'field' => 'kategori',
            'label' => 'Nama Kategori',
            'rules' => 'required|is_unique[kategori.nama_kategori]'
        ]
    ];
    protected $rules2 = [
        [
            'field' => 'kategori',
            'label' => 'Nama Kategori',
            'rules' => 'required'
        ]
    ];
    protected $rules3 = [
        [
            'field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required|is_unique[konten.judul]'
        ],
        [
            'field' => 'keterangan',
            'label' => 'Isi konten',
            'rules' => 'required'
        ],
        [
            'field' => 'kategori',
            'label' => 'Kategori',
            'rules' => 'required'
        ]
    ];
    protected $default_rules;

    private function validation(){
        $this->form_validation->set_rules($this->default_rules);
        if ($this->form_validation->run() == TRUE){
            $kategori = [
                'nama_kategori' => $this->input->post('kategori')
            ];
            return $kategori;
        }
        return FALSE;
    }
    private function validation_konten(){
        $this->form_validation->set_rules($this->default_rules);
        //upload foto
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path'] = 'assets/upload/konten';
        $config['max_size'] = 500 * 1024;
        $config['file_name'] = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == TRUE && $this->upload->do_upload('foto')){
            $konten = [
                'judul' => $this->input->post('judul'),
                'id_kategori' => $this->input->post('kategori'),
                'keterangan' => $this->input->post('keterangan'),
                'username' => $this->session->userdata('username'),
                'tanggal' => date('Y-m-d'),
                'slug' => str_replace(' ', '-', $this->input->post('judul')),
                'foto' => $namafoto
            ];
            return $konten;
        }
        return FALSE;
    }

    //Bagian kategori
    //Read
    public function get_kategori(){
        $this->db->order_by('nama_kategori', 'ASC');
        return $this->db->get($this->_table)->result();
    }
    public function get_kategori_by_id($id){
        return $this->db->get_where($this->_table, array('id_kategori' => $id))->row_array();
    }
    public function cek_kategori($kategori){
        return $this->db->where('nama_kategori', $kategori)->count_all_results($this->_table);
    }
    //Create
    private function insert_kategori($data){
        $this->db->insert($this->_table, $data);
        return TRUE;
    }
    public function insert_data_kategori(){
        $this->default_rules = $this->rules1;
        $validation_kategori = $this->validation();
        if ($validation_kategori){
            return $this->insert_kategori($validation_kategori);
        } else {
            return FALSE;
        }
    }
    //Delete
    public function delete($id){
        $this->db->delete($this->table1, array('id_kategori' => $id));
        return TRUE;
    }
    //Update
    private function update_kategori($data, $id){
        $this->db->where('id_kategori',$id);
        $this->db->update($this->_table, $data);
        return TRUE;
    }
    public function update_data_kategori($id){
        $this->default_rules = $this->rules2;
        $validation_kategori = $this->validation();
        if ($validation_kategori){
            return $this->update_kategori($validation_kategori, $id);
        } else {
            return FALSE;
        }
    }

    //Bagian konten
    //Read
    public function get_konten(){
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get($this->table1)->result();
    }
    public function get_konten_by_id($id){
        return $this->db->get_where($this->table1, array('id_konten' => $id))->row_array();
    }
    public function cek_judul($judul){
        return $this->db->where('judul', $judul)->count_all_results($this->table1);
    }
    //Create
    private function insert_konten($data){
        $this->db->insert($this->table1, $data);
        return TRUE;
    }
    public function insert_data_konten(){
        $this->default_rules = $this->rules3;
        $validation_konten = $this->validation_konten();
        if ($validation_konten && $_FILES['foto']['size'] <= 500 * 1024){
            return $this->insert_konten($validation_konten);
        } else {
            return FALSE;
        }
    }
    //Delete
    public function delete_konten($id){
        $this->db->delete($this->table1, array('id_konten' => $id));
        return TRUE;
    }
    //Update
    private function update_konten($data, $id){
        $this->db->where('id_konten',$id);
        $this->db->update($this->table1, $data);
        return TRUE;
    }
    public function update_data_konten($id){
        $this->default_rules = $this->rules2;
        $validation_konten = $this->validation();
        if ($validation_konten){
            return $this->update_konten($validation_konten, $id);
        } else {
            return FALSE;
        }
    }
}