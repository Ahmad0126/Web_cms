<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_activity extends CI_Model{
    //Konfigurasi
    protected $_table = 'kategori';
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
        $this->db->delete($this->_table, array('id_kategori' => $id));
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
}