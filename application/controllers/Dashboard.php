<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['content'] = 'dashboard/index';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $sedang = $this->db->get_where('ltd_order', [
            'status_verifikasi' => 'Permintaan telah diverifikasi'
        ]);
        $data['hsedang'] = $sedang->num_rows();
        $telah = $this->db->get_where('ltd_order', [
            'status_verifikasi' => 'Site telah aktif'
        ]);
        $data['htelah'] = $telah->num_rows();
        $belum = $this->db->get_where('ltd_order', ['status_verifikasi' => 'Belum diverifikasi']);
        $blm = $this->db->get_where('ltd_order', ['status_verifikasi' => 'Dibatalkan']);
        $data['hbelum'] = $blm->num_rows() + $belum->num_rows();
        $total = $this->db->get('ltd_order');
        $data['htotal'] = $total->num_rows();
        // var_dump($data['htotal']);
        // die;

        $this->load->view('template/index', $data);
    }
    public function profile()
    {
        $data['title'] = 'Profile';
        $data['profAktif'] = 'active';
        $data['content'] = 'dashboard/profile';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function edit_profile()
    {
        $data['title'] = 'Profile';
        $data['profAktif'] = 'active';
        $data['content'] = 'dashboard/edit_profile';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();


        $this->load->view('template/index', $data);
    }
    public function update_user($id)
    {
        $username = $this->input->post('username');
        $name = $this->input->post('nama_pengguna');
        $email = $this->input->post('email');
        $no_telpon = $this->input->post('no_telpon');
        $alamat = $this->input->post('alamat');
        if ($this->input->post('password')) {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        $data['branch'] = $this->db->get_where('klk_user', ['id_user' => $id])->row_array();

        $upload_image = $_FILES['img-br']['name'];

        if ($upload_image) {
            $config['upload_path'] = './assets/images/avatars/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '10240';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img-br')) {
                $old_img = $data['branch']['image'];
                if ($old_img != 'default.jpg') {
                    unlink(FCPATH . '/assets/images/avatars/' . $old_img);
                }

                $new_img = $this->upload->data('file_name');
                $this->db->set('image', $new_img);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('username', $username);
        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('no_phone', $no_telpon);
        $this->db->set('address', $alamat);
        if ($this->input->post('password')) {
            $this->db->set('password', $password);
        }
        $this->db->where('id_user', $id);
        $this->db->update('klk_user');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Pembaruan data telah disimpan!</div>');
        redirect('dashboard/edit_profile/' . $id);
    }
    public function activities()
    {
        $data['title'] = 'Aktifitas';
        $data['content'] = 'management/activities';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();


        $this->load->view('template/index', $data);
    }
    public function settings($detail)
    {
        if ($detail == 'profile') {
            $data['title'] = 'Profile';
            $data['content'] = 'management/overview';
            $this->load->model('Login_model', 'login');
            $data['user'] = $this->login->getUserLogin();

            $this->load->view('template/index', $data);
        } elseif ($detail == 'account') {
            $data['title'] = 'Account';
            $data['content'] = 'management/account';
            $this->load->model('Login_model', 'login');
            $data['user'] = $this->login->getUserLogin();

            $this->load->view('template/index', $data);
        } else {
            $data['title'] = 'Notification';
            $data['content'] = 'management/notif';
            $this->load->model('Login_model', 'login');
            $data['user'] = $this->login->getUserLogin();

            $this->load->view('template/index', $data);
        }
    }
}
