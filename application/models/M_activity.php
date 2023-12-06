<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_activity extends CI_Model{
    //Konfigurasi
    protected $_table = 'kategori';
    protected $table1 = 'konten';
    protected $table2 = 'user';
    protected $table3 = 'caraousel';
    protected $table4 = 'saran';
    protected $table5 = 'galeri';
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
    protected $rules4 = [
        [
            'field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'
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
    protected $rules5 = [
        [
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'
        ],
        [
            'field' => 'pesan',
            'label' => 'Pesan',
            'rules' => 'required'
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
        ]
    ];
    protected $rules6 = [
        [
            'field' => 'judul',
            'label' => 'Judul',
            'rules' => 'required'
        ],
        [
            'field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'
        ]
    ];
    protected $default_rules;
    protected $update_konten;

    private function validation(){
        $this->form_validation->set_rules($this->default_rules);
        if ($this->form_validation->run()){
            $kategori = [
                'nama_kategori' => $this->input->post('kategori')
            ];
            return $kategori;
        }
        return FALSE;
    }
    private function validation_konten(){
        $this->form_validation->set_rules($this->default_rules);
        $statusfoto = false;
        $namafoto = date('YmdHis').'.jpg';
        if($this->update_konten){
            $statusfoto = true;
            $namafoto = $this->input->post('nama_foto');
        }
        if($_FILES['foto']['name'] != ''){
            $config['upload_path'] = 'assets/upload/konten';
            $config['max_size'] = 500 * 1024;
            $config['overwrite'] = true;
            $config['file_name'] = $namafoto;
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            $statusfoto = $this->upload->do_upload('foto');
        }
        if ($this->form_validation->run() && $statusfoto){
            $konten = [
                'judul' => $this->input->post('judul'),
                'id_kategori' => $this->input->post('kategori'),
                'keterangan' => $this->input->post('keterangan'),
                'slug' => str_replace(' ', '-', $this->input->post('judul'))
            ];
            if($this->update_konten == false){
                $konten += [
                    'username' => $this->session->userdata('username'),
                    'tanggal' => date('Y-m-d'),
                    'foto' => $namafoto
                ];
            }
            return $konten;
        }
        return FALSE;
    }
    private function validation_galeri(){
        $this->form_validation->set_rules($this->default_rules);
        $statusfoto = false;
        $namafoto = date('YmdHis').'.jpg';
        if($_FILES['foto']['name'] != ''){
            $config['upload_path'] = 'assets/upload/galeri';
            $config['max_size'] = 500 * 1024;
            $config['overwrite'] = true;
            $config['file_name'] = $namafoto;
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            $statusfoto = $this->upload->do_upload('foto');
        }
        if ($this->form_validation->run() && $statusfoto){
            $galeri = [
                'judul' => $this->input->post('judul'),
                'tanggal' => $this->input->post('tanggal'),
                'foto' => $namafoto
            ];
            return $galeri;
        }
        return FALSE;
    }
    private function validation_saran(){
        $this->form_validation->set_rules($this->default_rules);
        if ($this->form_validation->run()){
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'pesan' => $this->input->post('pesan'),
                'tanggal' => date('Y-m-d')
            ];
            return $data;
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
        $konten = $this->db->get_where($this->table1, array('id_kategori' => $id))->result();
        foreach($konten as $fer){
            $this->delete_konten($fer->id_konten);
        }
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
    public function include_kategori($id, $status){
        return $this->update_kategori(array('sidebar' => $status), $id);
    }

    //Bagian konten
    //Read
    public function get_konten($limit = null, $start = 0){
        $this->db->from($this->table1);
        $this->db->join($this->_table, $this->_table.'.id_kategori = '.$this->table1.'.id_kategori');
        $this->db->join($this->table2, $this->table2.'.username = '.$this->table1.'.username');
        if($limit != null){
            $this->db->limit($limit, $start);
        }
        $this->db->order_by('id_konten', 'DESC');
        return $this->db->get()->result();
    }
    public function get_konten_by_slug($slug){
        $this->db->from($this->table1);
        $this->db->join($this->_table, $this->_table.'.id_kategori = '.$this->table1.'.id_kategori');
        $this->db->join($this->table2, $this->table2.'.username = '.$this->table1.'.username');
        $this->db->where('slug', $slug);
        return $this->db->get()->row();
    }
    public function get_konten_by_kategori($kategori, $limit, $start = null){
        $this->db->from($this->table1);
        $this->db->join($this->_table, $this->_table.'.id_kategori = '.$this->table1.'.id_kategori');
        $this->db->join($this->table2, $this->table2.'.username = '.$this->table1.'.username');
        $this->db->where('nama_kategori', $kategori);
        $this->db->limit($limit, $start);
        $this->db->order_by('id_konten', 'DESC');
        return $this->db->get()->result();
    }
    public function get_konten_by_keyword($keyword, $limit, $start){
        $this->db->from($this->table1);
        $this->db->join($this->_table, $this->_table.'.id_kategori = '.$this->table1.'.id_kategori');
        $this->db->join($this->table2, $this->table2.'.username = '.$this->table1.'.username');
        $this->db->like('judul', $keyword);
        $this->db->or_like('keterangan', $keyword);
        $this->db->limit($limit, $start);
        $this->db->order_by('id_konten', 'DESC');
        return $this->db->get()->result();
    }
    public function get_sidebar(){
        $kategori = $this->db->get_where($this->_table, array('sidebar' => 'on'))->result();
        $data = array();
        $no = 0;
        foreach($kategori as $fer){
            $data += array($no++ => array('kategori' => $fer->nama_kategori, 'data' => $this->get_konten_by_kategori($fer->nama_kategori, 5)));
        }
        return $data;
    }
    public function get_konten_by_id($id){
        return $this->db->get_where($this->table1, array('id_konten' => $id))->row_array();
    }
    public function get_jml_konten_per_kategori(){
        $data = array();
        $no = 0;
        $kategori = $this->get_kategori();
        foreach($kategori as $fer){
            $jml = $this->get_konten_by_kategori($fer->nama_kategori, null);
            $data += [
                $no++ => ['nama_kategori' => $fer->nama_kategori, 'jumlah' => count($jml)]
            ];
        }
        return $data;
    }
    public function get_jml_konten_by_bulan($bulan){
        $this->db->like('tanggal', $bulan);
        return $this->db->get($this->table1)->num_rows();
    }
    public function get_report_konten($tahun){
        $data = array();
        $no = 0;
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for($i = 0; $i < count($bulan); $i++){
            $data += [
                $i => [
                    'bulan' => $bulan[$i],
                    'jml' => $this->get_jml_konten_by_bulan($tahun.'-'.($i >= 9 ? $i+1 : '0'.$i+1))
                ]
            ];
        }
        return $data;
    }
    public function cek_upload_range(){
        $data = array();
        $this->db->select('tanggal');
        $this->db->order_by('tanggal', 'ASC');
        $awal = $this->db->get($this->table1)->row_array();
        $this->db->select('tanggal');
        $this->db->order_by('tanggal', 'ASC');
        $akhir = $this->db->get($this->table1)->last_row('array');
        if($awal || $akhir == null){
            $awal['tanggal'] = date('Y');
            $akhir['tanggal'] = date('Y');
        }
        $first = intval(substr($awal['tanggal'], 0, 4));
        $last = intval(substr($akhir['tanggal'], 0, 4));
        for($i = $first; $i <= $last; $i++){
            array_push($data, $i);
        }
        return $data;
    }
    public function cek_judul($judul){
        return $this->db->where('judul', $judul)->count_all_results($this->table1);
    }
    public function cek_rows($tabel){
        return $this->db->get($tabel)->num_rows();
    }
    public function cek_rows_by_kategori($kategori){
        $this->db->from($this->table1);
        $this->db->join($this->_table, $this->_table.'.id_kategori = '.$this->table1.'.id_kategori');
        $this->db->where('nama_kategori', $kategori);
        return $this->db->get()->num_rows();
    }
    public function cek_rows_by_keyword($keyword){
        $this->db->from($this->table1);
        $this->db->join($this->_table, $this->_table.'.id_kategori = '.$this->table1.'.id_kategori');
        $this->db->like('judul', $keyword);
        $this->db->or_like('keterangan', $keyword);
        return $this->db->get()->num_rows();
    }
    //Create
    private function insert_konten($data){
        $this->db->insert($this->table1, $data);
        return TRUE;
    }
    public function insert_data_konten(){
        $this->update_konten = false;
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
        $konten = $this->get_konten_by_id($id);
        $name = $konten['foto'];
        unlink('assets/upload/konten/'.$name);
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
        $this->update_konten = true;
        $this->default_rules = $this->rules4;
        $validation_konten = $this->validation_konten();
        if ($validation_konten){
            return $this->update_konten($validation_konten, $id);
        } else {
            return FALSE;
        }
    }

    //Bagian carousel
    //Read
    public function get_carousel(){
        return $this->db->get($this->table3)->result();
    }
    public function cek_carousel($judul){
        return $this->db->where('judul', $judul)->count_all_results($this->table3);
    }
    //Create
    private function insert_carousel($data){
        $this->db->insert($this->table3, $data);
        return TRUE;
    }
    public function insert_data_carousel(){
        $namafoto = date('YmdHis').'.jpg';
        $config['upload_path'] = 'assets/upload/carousel';
        $config['max_size'] = 500 * 1024;
        $config['file_name'] = $namafoto;
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $validation_carousel = $this->upload->do_upload('foto');
        $data = [
            'judul' => $this->input->post('judul'),
            'foto' => $namafoto
        ];
        if ($validation_carousel && $_FILES['foto']['size'] <= 500 * 1024){
            return $this->insert_carousel($data);
        } else {
            return FALSE;
        }
    }
    //Delete
    public function delete_carousel($foto){
        unlink('assets/upload/carousel/'.$foto);
        $this->db->delete($this->table3, array('foto' => $foto));
        return TRUE;
    }

    //Bagian saran
    //Read
    public function get_saran(){
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get($this->table4)->result();
    }
    public function get_saran_by_id($id){
        return $this->db->get_where($this->table4, array('id_saran' => $id))->row_array();
    }
    //Create
    public function insert_data_saran(){
        $this->default_rules = $this->rules5;
        $validation_saran = $this->validation_saran();
        if ($validation_saran){
            return $this->insert_saran($validation_saran);
        } else {
            return FALSE;
        }
    }
    private function insert_saran($data){
        $this->db->insert($this->table4, $data);
        return TRUE;
    }
    //Delete
    public function delete_saran($id){
        $this->db->delete($this->table4, array('id_saran' => $id));
        return TRUE;
    }
    public function delete_all_saran(){
        $saran = $this->get_saran();
        foreach ($saran as $fer) {
            $this->db->delete($this->table4, array('id_saran' => $fer->id_saran));
        }
        return TRUE;
    }

    //Bagian galeri
    //Read
    public function get_galeri($limit = null, $indeks = null){
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($limit, $indeks);
        return $this->db->get($this->table5)->result();
    }
    public function get_galeri_by_id($id){
        return $this->db->get_where($this->table5, array('id_galeri' => $id))->row_array();
    }
    public function cek_judul_foto($judul){
        return $this->db->where('judul', $judul)->count_all_results($this->table5);
    }
    //Create
    public function insert_data_galeri(){
        $this->default_rules = $this->rules6;
        $validation_galeri = $this->validation_galeri();
        if ($validation_galeri && $_FILES['foto']['size'] <= 500 * 1024){
            return $this->insert_galeri($validation_galeri);
        } else {
            return FALSE;
        }
    }
    private function insert_galeri($data){
        $this->db->insert($this->table5, $data);
        return TRUE;
    }
    //Delete
    public function delete_galeri($id){
        $galeri = $this->get_galeri_by_id($id);
        $name = $galeri['foto'];
        unlink('assets/upload/galeri/'.$name);
        $this->db->delete($this->table5, array('id_galeri' => $id));
        return TRUE;
    }
}