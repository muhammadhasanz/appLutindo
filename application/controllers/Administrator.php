<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Ujung_Pandang');
    }
    public function index()
    {
        $data['title'] = 'Request';
        $data['content'] = 'request/index';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function log()
    {
        $data['title'] = 'Report Pengantaran';
        $data['content'] = 'ls/log';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $hariini = time();
        $hariinii = date('Y-m-d', time());
        $kemarin = date('Y-m-d', mktime(0, 0, 0, date("m",  $hariini), date("d",  $hariini) - 1, date("Y",  $hariini)));
        $lalu = date('Y-m-d', mktime(0, 0, 0, date("m",  $hariini), date("d",  $hariini) - 2, date("Y",  $hariini)));

        $query_hariini = "SELECT `klk_log`.* FROM `klk_log` WHERE `klk_log`.`tanggal` BETWEEN '$hariinii 00:00:00' AND '$hariinii 23:59:59' ORDER BY `klk_log`.`tanggal` DESC";
        $data['data_hariini'] = $this->db->query($query_hariini)->result_array();

        $query_kemarin = "SELECT `klk_log`.* FROM `klk_log` WHERE `klk_log`.`tanggal` BETWEEN '$kemarin 00:00:00' AND '$kemarin 23:59:59' ORDER BY `klk_log`.`tanggal` DESC";
        $data['data_kemarin'] = $this->db->query($query_kemarin)->result_array();

        $query_lalu = "SELECT `klk_log`.* FROM `klk_log` WHERE `klk_log`.`tanggal` BETWEEN '$lalu 00:00:00' AND '$lalu 23:59:59' ORDER BY `klk_log`.`tanggal` DESC";
        $data['data_lalu'] = $this->db->query($query_lalu)->result_array();

        $data['lalu'] = mktime(0, 0, 0, date("m",  $hariini), date("d",  $hariini) - 2, date("Y",  $hariini));

        $this->load->view('template/index', $data);
    }
    public function telah_diverifikasi()
    {
        $data['title'] = 'Request';
        $data['content'] = 'request/telah_diverifikasi';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function lengkap()
    {
        $data['title'] = 'Request Lengkap';
        $data['content'] = 'request/lengkap';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function verifikasi_request($id)
    {
        $this->db->set('status_verifikasi', 'Permintaan telah diverifikasi');
        $this->db->where('id_order', $id);
        $this->db->update('ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Permintaan telah diverifikasi!</div>');
        redirect('administrator');
    }
    public function batalkan_verifikasi($id)
    {
        $this->db->set('status', 'Dibatalkan');
        $this->db->where('id_order', $id);
        $this->db->update('ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Jadwal telah dibatalkan!</div>');
        redirect('administrator/telah_diverifikasi');
    }
    public function edit_request($id)
    {
        $data['title'] = 'Edit Request';
        $data['content'] = 'request/edit_request';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $data['request'] = $this->db->get_where('ltd_order', ['id_order' => $id])->row_array();

        $this->load->view('template/index', $data);
    }
    public function hapus_request($id)
    {
        $order = $this->db->get_where('ltd_order', ['id_order' => $id])->row_array();
        $this->load->model('Menu_model', 'order');
        $this->order->getDel($order, 'ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Permintaan telah dihapus!</div>');
        redirect('administrator');
    }
    public function hapus_requestl($id)
    {
        $order = $this->db->get_where('ltd_order', ['id_order' => $id])->row_array();
        $this->load->model('Menu_model', 'order');
        $this->order->getDel($order, 'ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Permintaan telah dihapus!</div>');
        redirect('administrator/lengkap');
    }
    public function update_request($id)
    {
        $customer = $this->input->post('customer');
        $site_name = $this->input->post('site_name');
        $address = $this->input->post('address');
        $no_phone = $this->input->post('no_phone');
        $type_tower = $this->input->post('type_tower');
        $contractor = $this->input->post('contractor');
        $region = $this->input->post('region');
        $project = $this->input->post('project');
        $site_id = $this->input->post('site_id');
        $status_verifikasi = $this->input->post('status_verifikasi');
        $email = $this->input->post('email');

        $this->db->set('customer', $customer);
        $this->db->set('site_name', $site_name);
        $this->db->set('address', $address);
        $this->db->set('no_phone', $no_phone);
        $this->db->set('type_tower', $type_tower);
        $this->db->set('contractor', $contractor);
        $this->db->set('region', $region);
        $this->db->set('project', $project);
        $this->db->set('site_id', $site_id);
        $this->db->set('status_verifikasi', $status_verifikasi);
        $this->db->set('email', $email);
        $this->db->where('id_order', $id);
        $this->db->update('ltd_order');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Pembaruan request telah disimpan!</div>');
        redirect('administrator/edit_request/' . $id);
    }
    public function getrequest()
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` WHERE `ltd_order`.`status_verifikasi` = 'Belum diverifikasi' OR `ltd_order`.`status_verifikasi` = 'Dibatalkan' ORDER BY `ltd_order`.`tanggal_pemesanan` DESC";
        $res = $this->db->query($querysubmenu)->result();
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
    public function getrequestlengkap()
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` ORDER BY `ltd_order`.`tanggal_pemesanan` DESC";
        $res = $this->db->query($querysubmenu)->result();
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
    public function gettelver()
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `ltd_order`.* FROM `ltd_order` WHERE `ltd_order`.`status_verifikasi` = 'Permintaan telah diverifikasi' ORDER BY `ltd_order`.`tanggal_pemesanan` DESC";
        $res = $this->db->query($querysubmenu)->result();
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
    public function getreportpengantaran()
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `klk_delivery`.* FROM `klk_delivery` WHERE `klk_delivery`.`status_verifikasi` = 'Telah diterima' ORDER BY `klk_delivery`.`date_delivery` DESC";
        $res = $this->db->query($querysubmenu)->result();
        $no = 1;
        foreach ($res as $row) {
            $data_row[] = array(
                'no'   => $no,
                'id_delivery'  => $row->id_delivery,
                'name_customer'  => $row->name_customer,
                'address' => $row->address,
                'type' => $row->type,
                'color' => $row->color,
                'chassis_number' => $row->chassis_number,
                'date_delivery' => date('d-m-Y', strtotime($row->date_delivery)),
                'time' => $row->time,
                'location' => $row->location,
                'sales' => $row->sales,
                'info' => $row->info,
                'status' => $row->status_verifikasi
            );
            $no++;
        }
        $data['data'] = $data_row;
        echo (json_encode($data));
    }
    public function getlog()
    {
        $start = $this->input->post('start');
        $limit = $this->input->post('limit');
        $hariini = time();
        $hariinii = date('Y-m-d', time());
        $lalu = date('Y-m-d', mktime(0, 0, 0, date("m",  $hariini), date("d",  $hariini) - 2, date("Y",  $hariini)));
        $querysubmenu = "SELECT `klk_log`.* FROM `klk_log` WHERE `klk_log`.`tanggal` NOT BETWEEN '$lalu 00:00:00' AND '$hariinii 23:59:59' ORDER BY `klk_log`.`id_log` DESC LIMIT $start, $limit";
        $res = $this->db->query($querysubmenu)->result();
        // var_dump($res);
        // die;
        foreach ($res as $row) {
            echo "<li class=\"timeline-item\">
            <div class=\"timeline-figure\">
              <span class=\"tile tile-circle tile-sm\"><i class=\"fa" . $row->icon_log . " fa-lg\"></i></span>
            </div>
            <div class=\"timeline-body\">
              <div class=\"media\">
                <div class=\"media-body\">
                  <h6 class=\"timeline-heading\">
                    " . $row->name_branch . "
                  </h6>
                  <p class=\"mb-0\">
                  " . $row->tindakan . " </p>
                  <p class=\"timeline-date d-sm-none\"> " . date('d m Y', strtotime($row->tanggal)) . " </p>
                </div>
                <div class=\"d-none d-sm-block\">
                  <span class=\"timeline-date\">" . date('l, d M Y', strtotime($row->tanggal)) . "</span>
                </div>
              </div>
            </div>
          </li>";
        }
    }
    public function excel()
    {
        $awal = $this->input->post('tahun') . '-' . $this->input->post('bulan') . '-01';
        $akhir = $this->input->post('tahun') . '-' . $this->input->post('bulan') . '-31';
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $querysubmenu = "SELECT `klk_delivery`.* FROM `klk_delivery` 
                              WHERE `klk_delivery`.`date_delivery` 
                            BETWEEN '$awal' AND '$akhir'
                                AND `klk_delivery`.`status_verifikasi` = 'Telah diterima'
                           ORDER BY `klk_delivery`.`date_delivery` DESC";
        $res = $this->db->query($querysubmenu)->result_array();

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
        $excel->getActiveSheet()->setCellValue('M3', 'Status');

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
            $excel->getActiveSheet()->setCellValue('M' . $b, $row['status']);

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
