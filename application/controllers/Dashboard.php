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

        $data['hsedang'] = 0;
        $data['htelah'] = 0;
        $data['htotal'] = 0;

        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $username = 'lutungan_indoutama@yahoo.com';
        $password = 'IBS2020';
        $url = 'https://tbm3.ibstower.com/login';
        $cookie = 'cookie.txt';
        $url2 = 'https://tbm3.ibstower.com/vendor/project/list_project/3135';
        $url3 = 'https://tbm3.ibstower.com/vendor/project/project_list/on_process/3135/ALL';

        $postdata = 'identity=' . $username . '&password=' . $password;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); // <-- add this line
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        $data['status_login'] = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
            $data['message'] = 'Gagal login';
            // return (json_encode($data));
        } else {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url2);
            curl_setopt($ch, CURLOPT_POST, 0);
            // $result = json_decode(curl_exec($ch))->data;
            if (!$result = $this->cache->get('result_dash')) {
                $result = json_decode(curl_exec($ch))->data;
                $this->cache->save('result', $result, 60 * 60);
            }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url3);
            curl_setopt($ch, CURLOPT_POST, 0);
            // $result_url3 = json_decode(curl_exec($ch))->data;
            if (!$result_url3 = $this->cache->get('result_url3_dash')) {
                $result_url3 = json_decode(curl_exec($ch))->data;
                $this->cache->save('result_url3', $result_url3, 60 * 60);
            }

            curl_close($ch);

            $filtered_result = array_filter($result_url3, function ($item) {
                return in_array($item->assignment_type, ['CME']);
            });

            foreach ($filtered_result as $row) {
                floor((time() - strtotime($row->sitac_start_date)) / 86400) >= 45 ? $data['htelah']++ : $data['hsedang']++;
                $data['htotal']++;
            }
        }

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
