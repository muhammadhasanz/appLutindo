<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Proses Kemajuan';
        $data['content'] = 'manager/jadwal';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function pembangunan()
    {
        $data['title'] = 'Proses Kemajuan';
        $data['content'] = 'manager/terverifikasi';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        // var_dump($this->uri->segment(2) == 'pembangunan');
        // die;

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
    public function batalkan_jadwal($id)
    {
        $this->db->set('status_branch', 'Dibatalkan');
        $this->db->set('alasan', $this->input->post('alasan'));
        $this->db->where('id_delivery', $id);
        $this->db->update('ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Jadwal telah dibatalkan!</div>');
        redirect('branch');
    }
    public function hapus_jadwal($id)
    {
        $branch = $this->db->get_where('ltd_order', ['id_delivery' => $id])->row_array();
        $this->load->model('Menu_model', 'branch');
        $this->branch->getDel($branch, 'ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Jadwal telah dihapus!</div>');
        redirect('branch');
    }
    public function tambah_jadwal()
    {
        $this->db->insert('ltd_order', [
            'id_branch'  => $this->session->userdata('id_user'),
            'name_customer'  => $this->input->post('name_customer'),
            'address' => $this->input->post('address'),
            'no_phone' => $this->input->post('no_phone'),
            'type' => $this->input->post('type'),
            'color' => $this->input->post('color'),
            'chassis_number' => $this->input->post('chassis_number'),
            'date_delivery' => $this->input->post('date_delivery') . ' ' . $this->input->post('time') . ':00',
            'time' => $this->input->post('time'),
            'location' => $this->input->post('location'),
            'sales' => $this->input->post('sales'),
            'info' => $this->input->post('info'),
            'location_delivery' => $this->input->post('location_delivery'),
            'status_branch' => 'Belum dikirim',
            'status' => 'Belum diverifikasi'
        ]);
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Jadwal baru telah ditambahkan!</div>');
        redirect('manager/adddelivery');
    }
    public function getbranchdata()
    {
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $username = 'lutungan_indoutama@yahoo.com';
        $password = 'IBS2020';
        $url = 'https://tbm3.ibstower.com/login';
        $cookie = 'cookie.txt';
        $url2 = 'https://tbm3.ibstower.com/vendor/project/project_list/on_process/3135/ALL';

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
            if (!$result = $this->cache->get('result')) {
                $result = json_decode(curl_exec($ch))->data;
                $this->cache->save('result', $result, 60 * 60);
            }
            // $result = $this->cache->save('foo', json_decode(curl_exec($ch))->data, 60 * 60);

            curl_close($ch);

            $filtered = array_filter($result, function ($item) {
                return in_array($item->assignment_type, ['CME']);
            });

            foreach ($filtered as $row) {
                $data_row[] = [
                    'id' => $row->id,
                    'wbs_id' => $row->wbs_id,
                    'iro_number' => $row->iro_number,
                    'site_id_ibs' => $row->site_id_ibs,
                    'site_name' => $row->site_name,
                    'sitac_start_date' => $row->sitac_start_date,
                    'work_status' => floor((time() - strtotime($row->sitac_start_date)) / 86400) >= 45 ? 'DONE' : 'RUNNING',
                    'nama' => $row->nama
                ];
            }

            $data['message'] = 'Berhasil Mendapatkan API';
            $data['data'] = $data_row;
            echo (json_encode($data));
        }
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
    public function getbranchterverif()
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` WHERE `ltd_order`.`status_verifikasi` = 'Pembangunan selesai' ORDER BY `ltd_order`.`tanggal_pemesanan` DESC";
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
    public function getpengkoneksian()
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` WHERE `ltd_order`.`status_verifikasi` = 'Pengkoneksian' ORDER BY `ltd_order`.`tanggal_pemesanan` DESC";
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
    public function excel()
    {
        $awal = $this->input->post('tahun') . '-' . $this->input->post('bulan') . '-01 00:00:00';
        $akhir = $this->input->post('tahun') . '-' . $this->input->post('bulan') . '-31 23:59:59';
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $status = $this->input->post('status');
        $id_branch = $this->session->userdata('id_user');

        if ($status == 'Belum dikirim') {
            $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` 
                                  WHERE `ltd_order`.`date_delivery` 
                                BETWEEN '$awal' AND '$akhir'
                                    AND `ltd_order`.`status_branch` = 'Belum dikirim' 
                                    AND `ltd_order`.`id_branch` = '$id_branch'
                               ORDER BY `ltd_order`.`date_delivery` DESC";
            $res = $this->db->query($querysubmenu)->result_array();
        } elseif ($status == 'Terkirim') {
            $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` 
                                  WHERE `ltd_order`.`date_delivery` 
                                BETWEEN '$awal' AND '$akhir'
                                    AND `ltd_order`.`status_branch` = 'Terkirim' 
                                    AND `ltd_order`.`id_branch` = '$id_branch'
                               ORDER BY `ltd_order`.`date_delivery` DESC";
            $res = $this->db->query($querysubmenu)->result_array();
        } elseif ($status == 'Terverifikasi') {
            $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` 
                                  WHERE `ltd_order`.`date_delivery` 
                                BETWEEN '$awal' AND '$akhir'
                                    AND `ltd_order`.`status_branch` = 'Terkirim' 
                                    AND `ltd_order`.`status` = 'Proses pengantaran' 
                                    AND `ltd_order`.`id_branch` = '$id_branch'
                               ORDER BY `ltd_order`.`date_delivery` DESC";
            $res = $this->db->query($querysubmenu)->result_array();
        } else {
            $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` 
                                  WHERE `ltd_order`.`date_delivery` 
                                BETWEEN '$awal' AND '$akhir'
                                    AND `ltd_order`.`id_branch` = '$id_branch'
                               ORDER BY `ltd_order`.`date_delivery` DESC";
            $res = $this->db->query($querysubmenu)->result_array();
        }

        require FCPATH . '/vendor/PHPExcel-1.8/Classes/PHPExcel.php';
        require FCPATH . '/vendor/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php';

        $excel = new PHPExcel();

        $excel->getProperties()->setCreator("Kalla Kars");
        $excel->getProperties()->setLastModifiedBy("Kalla Kars");
        $excel->getProperties()->setTitle("Data Pengantaran");
        $excel->getProperties()->setSubject("");
        $excel->getProperties()->setDescription("");

        $excel->setActiveSheetIndex(0);

        $excel->getActiveSheet()->setCellValue('I1', 'Data pengantaran pada ' . $bulan . ' ' . $tahun);
        $excel->getActiveSheet()->setCellValue('A3', 'No');
        $excel->getActiveSheet()->setCellValue('B3', 'Nama Customer');
        $excel->getActiveSheet()->setCellValue('C3', 'Alamat');
        $excel->getActiveSheet()->setCellValue('D3', 'No Hp');
        $excel->getActiveSheet()->setCellValue('E3', 'Type');
        $excel->getActiveSheet()->setCellValue('F3', 'Warna');
        $excel->getActiveSheet()->setCellValue('G3', 'No Rangka');
        $excel->getActiveSheet()->setCellValue('H3', 'Tanggal Pengantaran');
        $excel->getActiveSheet()->setCellValue('I3', 'Jam');
        $excel->getActiveSheet()->setCellValue('J3', 'Lokasi Jemputan Unit');
        $excel->getActiveSheet()->setCellValue('K3', 'Sales');
        $excel->getActiveSheet()->setCellValue('L3', 'Ket');
        $excel->getActiveSheet()->setCellValue('M3', 'Status branch');
        $excel->getActiveSheet()->setCellValue('N3', 'Status');

        $i = 1;
        $b = 4;
        foreach ($res as $row) {
            $excel->getActiveSheet()->setCellValue('A' . $b, $i++);
            $excel->getActiveSheet()->setCellValue('B' . $b, $row['name_customer']);
            $excel->getActiveSheet()->setCellValue('C' . $b, $row['address']);
            $excel->getActiveSheet()->setCellValue('D' . $b, $row['no_phone']);
            $excel->getActiveSheet()->setCellValue('E' . $b, $row['type']);
            $excel->getActiveSheet()->setCellValue('F' . $b, $row['color']);
            $excel->getActiveSheet()->setCellValue('G' . $b, $row['chassis_number']);
            $excel->getActiveSheet()->setCellValue('H' . $b, date('d-m-Y', strtotime($row['date_delivery'])));
            $excel->getActiveSheet()->setCellValue('I' . $b, $row['time']);
            $excel->getActiveSheet()->setCellValue('J' . $b, $row['location']);
            $excel->getActiveSheet()->setCellValue('K' . $b, $row['sales']);
            $excel->getActiveSheet()->setCellValue('L' . $b, $row['info']);
            $excel->getActiveSheet()->setCellValue('M' . $b, $row['status_branch']);
            $excel->getActiveSheet()->setCellValue('N' . $b, $row['status']);

            $b++;
        }

        $filename = 'Data-Pengantaran-' . $bulan . '-' . $tahun . '.xlsx';

        $excel->getProperties()->setTitle("Data Pengantaran");

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}
