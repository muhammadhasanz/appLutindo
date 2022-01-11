<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Tambah Type';
        $data['content'] = 'type/index';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function tambah_type()
    {
        $this->db->insert('klk_type', [
            'name_type' => $this->input->post('name_type'),
            'name_merk' => $this->input->post('name_merk')
        ]);
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Type telah ditambahkan!</div>');
        redirect('type');
    }
    public function update_type($id)
    {
        $name_type = $this->input->post('name_type');
        $name_merk = $this->input->post('name_merk');
        $this->db->set('name_type', $name_type);
        $this->db->set('name_merk', $name_merk);
        $this->db->where('id_type', $id);
        $this->db->update('klk_type');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"> <button type="button" class="close" data-dismiss="alert">×</button> Type telah diubah!</div>');
        redirect('type');
    }
    public function delete_type($id)
    {
        $type = $this->db->get_where('klk_type', ['id_type' => $id])->row_array();
        $this->load->model('Menu_model', 'type');
        $this->type->getDel($type, 'klk_type');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"> <button type="button" class="close" data-dismiss="alert">×</button> Type telah dihapus!</div>');
        redirect('type');
    }
    public function getType()
    {
        $data = array();
        $data_row = array();
        $res = $this->db->query('SELECT * FROM klk_type')->result();
        $no = 1;
        foreach ($res as $row) {
            $data_row[] = array(
                'no'   => $no,
                'id_type'   => $row->id_type,
                'name_type'  => $row->name_type,
                'name_merk'  => $row->name_merk
            );
            $no++;
        }
        $data['data'] = $data_row;
        echo (json_encode($data));
    }
}
