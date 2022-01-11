<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sites extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Site Aktif';
        $data['content'] = 'sites/index';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function getaktif()
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` WHERE `ltd_order`.`status_verifikasi` = 'Site telah aktif' ORDER BY `ltd_order`.`tanggal_pemesanan` DESC";
        $res = $this->db->query($querysubmenu)->result();
        // var_dump($res);
        // die;
        $no = 1;
        foreach ($res as $row) {
            $data_row[] = array(
                'no'   => $no,
                'id_order'  => $row->id_order,
                'customer'  => $row->customer,
                'site_name' => $row->site_name,
                'address' => $row->address,
                'contractor' => $row->contractor,
                'region' => $row->region,
                'project' => $row->project,
                'site_id' => $row->site_id,
                'tanggal_pemesanan' => date('d-m-Y', $row->tanggal_pemesanan),
                'type_tower' => $row->type_tower,
                'no_phone' => $row->no_phone,
                'email' => $row->email,
                'status' => $row->status_verifikasi
            );
            $no++;
        }
        $data['data'] = $data_row;
        echo (json_encode($data));
    }
}
