<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Projects extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Project Progress';
        $data['content'] = 'admin/project-progress';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function new()
    {
        $data['title'] = 'Projects';
        $data['content'] = 'admin/projects';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function pengkoneksian()
    {
        $data['title'] = 'Proses Kemajuan';
        $data['content'] = 'manager/terverifikasi';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        // var_dump($this->uri->segment(2) == 'pembangunan');
        // die;

        $this->load->view('template/index', $data);
    }
    public function aktif()
    {
        $data['title'] = 'Proses Kemajuan';
        $data['content'] = 'manager/aktif';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        // var_dump($this->uri->segment(2) == 'pembangunan');
        // die;

        $this->load->view('template/index', $data);
    }
    public function adddelivery()
    {
        $data['title'] = 'Tambah Jadwal';
        $data['content'] = 'manager/tambah_jadwal';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $data['type_bmw'] = $this->db->get_where('klk_type', ['name_merk' => 'BMW'])->result_array();
        $data['type_benelli'] = $this->db->get_where('klk_type', ['name_merk' => 'BENELLI'])->result_array();

        $this->load->view('template/index', $data);
    }
    public function edit_jadwal($id)
    {
        $data['title'] = 'Edit Jadwal';
        $data['content'] = 'manager/edit_jadwal';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $data['jadwal'] = $this->db->get_where('ltd_order', ['id_delivery' => $id])->row_array();
        $data['type_bmw'] = $this->db->get_where('klk_type', ['name_merk' => 'BMW'])->result_array();
        $data['type_benelli'] = $this->db->get_where('klk_type', ['name_merk' => 'BENELLI'])->result_array();

        $this->load->view('template/index', $data);
    }
    public function update_jadwal($id)
    {
        $name_customer = $this->input->post('name_customer');
        $no_spk = $this->input->post('no_spk');
        $address = $this->input->post('address');
        $no_phone = $this->input->post('no_phone');
        $type = $this->input->post('type');
        $color = $this->input->post('color');
        $chassis_number = $this->input->post('chassis_number');
        $machine_number = $this->input->post('machine_number');
        $date_delivery = $this->input->post('date_delivery') . ' ' . $this->input->post('time') . ':00';
        $time = $this->input->post('time');
        $total_payment = $this->input->post('total_payment');
        $location = $this->input->post('location');
        $sales = $this->input->post('sales');
        $info = $this->input->post('info');
        $location_delivery = $this->input->post('location_delivery');

        $this->db->set('name_customer', $name_customer);
        $this->db->set('address', $address);
        $this->db->set('no_phone', $no_phone);
        $this->db->set('type', $type);
        $this->db->set('color', $color);
        $this->db->set('chassis_number', $chassis_number);
        $this->db->set('date_delivery', $date_delivery);
        $this->db->set('time', $time);
        $this->db->set('location', $location);
        $this->db->set('sales', $sales);
        $this->db->set('info', $info);
        $this->db->set('location_delivery', $location_delivery);
        $this->db->where('id_delivery', $id);
        $this->db->update('ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Pembaruan data telah disimpan!</div>');
        redirect('manager/edit_jadwal/' . $id);
    }
    public function verifikasi_pembangunan($id)
    {
        $this->db->set('status_verifikasi', 'Pembangunan selesai');
        $this->db->where('id_order', $id);
        $this->db->update('ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Site telah terbangun!</div>');
        redirect('manager');
    }
    public function verifikasi_pengkoneksian($id)
    {
        $this->db->set('status_verifikasi', 'Pengkoneksian');
        $this->db->where('id_order', $id);
        $this->db->update('ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Site dalam pengkoneksian!</div>');
        redirect('manager/pembangunan');
    }
    public function verifikasi_pengaktifan($id)
    {
        $this->db->set('status_verifikasi', 'Site telah aktif');
        $this->db->where('id_order', $id);
        $this->db->update('ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Site telah diaktifkan!</div>');
        redirect('manager/pengkoneksian');
    }
    public function getbranchdata()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $username = 'lutungan_indoutama@yahoo.com';
        $password = 'IBS2020';
        $url = 'https://tbm3.ibstower.com/login';
        $cookie = 'cookie.txt';
        $url2 = 'https://tbm3.ibstower.com/vendor/project/list_project/3135';
        $url3 = 'https://tbm3.ibstower.com/vendor/project/project_list/on_process/3135/ALL';

        $postdata = 'identity=' . $username . '&password=' . $password;

        $data_row = [];

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
            $result = json_decode(curl_exec($ch))->data;
            // if (!$result = $this->cache->get('result')) {
            // $result = json_decode(curl_exec($ch))->data;
            // $this->cache->save('result', $result, 60 * 60);
            // }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url3);
            curl_setopt($ch, CURLOPT_POST, 0);
            $result_url3 = json_decode(curl_exec($ch))->data;
            // if (!$result_url3 = $this->cache->get('result_url3')) {
            //     $result_url3 = json_decode(curl_exec($ch))->data;
            //     $this->cache->save('result_url3', $result_url3, 60 * 60);
            // }

            curl_close($ch);

            $filtered_result = array_filter($result_url3, function ($item) {
                return in_array($item->assignment_type, ['CME']);
            });

            foreach ($filtered_result as $row) {
                // $filtered = array_search($row->site_id_ibs, array_column($result_url3, 'site_id_ibs'));
                $filtered = $this->array_recursive_search_key_map($row->site_id_ibs, $result);
                $data_row[] = [
                    'id' => $row->id,
                    'wbs_id' => $row->wbs_id,
                    'iro_number' => $row->iro_number,
                    'site_id_ibs' => $row->site_id_ibs,
                    'site_name' => $row->site_name,
                    'sitac_start_date' => $row->sitac_start_date,
                    'work_status' => floor((time() - strtotime($row->sitac_start_date)) / 86400) >= 45 ? 'DONE' : 'RUNNING',
                    'site_type' => ($filtered->site_type ?? "Null") == "GF" ? "Greenfield" : "Rooftop"
                ];
            }
            // ?? null == 'GF' ? 'Greenfield' : 'Rooftop'
            $data['message'] = 'Berhasil Mendapatkan API';
            $data['data'] = $data_row;
            echo (json_encode($data));
        }
    }
    public function getnewsite()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $username = 'lutungan_indoutama@yahoo.com';
        $password = 'IBS2020';
        $url = 'https://tbm3.ibstower.com/login';
        $cookie = 'cookie.txt';
        $url2 = 'https://tbm3.ibstower.com/vendor/project/project_list/ready/3135/SITAC';

        $postdata = 'identity=' . $username . '&password=' . $password;

        $data_row = [];

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
            if (!$result = $this->cache->get('newsite')) {
                $result = json_decode(curl_exec($ch))->data;
                $this->cache->save('newsite', $result, 60 * 60);
            }

            curl_close($ch);

            foreach ($result as $row) {
                $data_row[] = [
                    'id' => $row->id,
                    'wbs_id' => $row->wbs_id,
                    'site_id_ibs' => $row->site_id_ibs,
                    'site_name' => $row->site_name,
                    'assignment_type' => $row->assignment_type,
                    'work_status' => $row->work_status,
                    'nama' => $row->nama
                ];
            }

            $data['message'] = 'Berhasil Mendapatkan API';
            $data['data'] = $data_row;
            echo (json_encode($data));
        }
    }
    public function array_recursive_search_key_map($needle, $haystack)
    {
        foreach ($haystack as $first_level_key => $value) {
            if ($needle === $value->site_id_ibs) {
                return $value;
            }
        }
        return false;
    }
    public function getdatasite()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $username = 'lutungan_indoutama@yahoo.com';
        $password = 'IBS2020';
        $url = 'https://tbm3.ibstower.com/login';
        $cookie = 'cookie.txt';
        $url2 = 'https://tbm3.ibstower.com/vendor/project/details/' . $this->input->post('id') . '/3135';
        $url3 = 'https://tbm3.ibstower.com/vendor/bill/index/' . $this->input->post('id');


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
            $result = curl_exec($ch);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url3);
            curl_setopt($ch, CURLOPT_POST, 0);
            // $result = json_decode(curl_exec($ch))->data;
            $result1 = curl_exec($ch);

            curl_close($ch);
            preg_match_all('/<td>(.*?)<\/td>/i', trim($result), $matches);
            preg_match('/<a href="(.*?)" target="_blank" class="btn btn-sm btn-icon btn-light">/i', $result1, $matches2);
            // var_dump($result1);
            // var_dump($matches2);
            // var_dump($matches);
            // var_dump($this->input->post('id'));
            // die;

            $data['message'] = 'Berhasil Mendapatkan API';
            $data['data'] = $matches[1] ?? NULL;
            $data['biaya'] = $matches2[1] ?? NULL;
            $site_id = $this->input->post('site_id');
            $data['check_site'] = $this->db->get_where('check_site', ['site_id' => $site_id])->result();
            // var_dump($data);
            // die;
            echo (json_encode($data));
        }
    }
    public function checksite()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

        $upload_image = $_FILES['dokumentasi']['name'] ?? false;
        $file_dokumentasi = '';
        // echo json_encode($upload_image);
        // echo json_encode($this->input->post());
        // die;
        if ($upload_image) {
            $config['upload_path'] = './assets/images/dokumentasi/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '10240';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('dokumentasi')) {
                $file_dokumentasi = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }
        // die;

        $site_id = $this->input->post('site_id');
        $tahap_id = $this->input->post('tahap_id');
        $site_type = $this->input->post('site_type');
        $status = $this->input->post('status');
        $catatan = $this->input->post('catatan');
        // var_dump($this->cache->get('result_url3'));
        // die;
        $filtered_assignment_type = array_filter($this->cache->get('result_url3'), function ($item) {
            return in_array($item->assignment_type, ['CME']);
        });
        $filtered_site_id_ibs = array_filter($filtered_assignment_type, function ($item) use ($site_id) {
            return in_array($item->site_id_ibs, [$site_id]);
        });
        $check_site = $this->db->get_where('check_site', ['site_id' => $site_id, 'tahap_id' => $tahap_id])->result_array();
        foreach ($filtered_site_id_ibs as $filtered) {
            $sitac_start_date = $filtered->sitac_start_date;
        }
        $data_site = [
            'site_id' => $site_id,
            'site_type' => $site_type,
            'status' => $status,
            'file_dokumentasi' => $file_dokumentasi == '' ? NULL : $file_dokumentasi,
            'catatan' => $catatan == '' ? NULL : $catatan
        ];
        // return $status;

        if (count($check_site) > 0) {
            $data_site['updated_at'] = date('Y-m-d H:i:s', time());
            if ($status == 1) {
                $this->db->where(['site_id' => $site_id, 'tahap_id' => $tahap_id])->update('check_site', $data_site);
            } else {
                $this->db->where(['site_id' => $site_id, 'tahap_id >=' => $tahap_id])->update('check_site', $data_site);
            }
        } else {
            $data_site['tahap_id'] = $tahap_id;
            $data_site['created_at'] = date('Y-m-d H:i:s', strtotime($sitac_start_date) + (86400 * 44));
            $data_site['updated_at'] = date('Y-m-d H:i:s', time());
            $this->db->insert('check_site', $data_site);
        }

        $data['check_site'] = $this->db->get_where('check_site', ['site_id' => $site_id])->result();
        $data['status'] = $status;

        echo (json_encode($data));
    }
    // public function getbranchdata()
    // {
    //     $data = array();
    //     $data_row = array();
    //     $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` WHERE `ltd_order`.`status_verifikasi` = 'Permintaan telah diverifikasi' ORDER BY `ltd_order`.`tanggal_pemesanan` DESC";
    //     $res = $this->db->query($querysubmenu)->result();
    //     // var_dump($res);
    //     // die;
    //     $no = 1;
    //     foreach ($res as $row) {
    //         $data_row[] = array(
    //             'no'   => $no,
    //             'id_order'  => $row->id_order,
    //             'customer'  => $row->customer,
    //             'site_name' => $row->site_name,
    //             'address' => $row->address,
    //             'contractor' => $row->contractor,
    //             'region' => $row->region,
    //             'project' => $row->project,
    //             'site_id' => $row->site_id,
    //             'tanggal_pemesanan' => date('d-m-Y', $row->tanggal_pemesanan),
    //             'type_tower' => $row->type_tower,
    //             'no_phone' => $row->no_phone,
    //             'email' => $row->email,
    //             'status' => $row->status_verifikasi
    //         );
    //         $no++;
    //     }
    //     $data['data'] = $data_row;
    //     echo (json_encode($data));
    // }
}
