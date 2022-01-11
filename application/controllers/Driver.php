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

        $data['title'] = 'Verifikasi Pengantaran';
        $data['content'] = 'driver/verifikasi';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $sekarang = date('Y-m-d', time());
        $query = "SELECT `klk_delivery`.*
                    FROM `klk_delivery`
                   WHERE `klk_delivery`.`status` = 'Proses pengantaran'
                     AND `klk_delivery`.`date_delivery` BETWEEN '$sekarang 00:00:00' AND '$sekarang 23:59:59'
                     OR `klk_delivery`.`status` = 'Telah diterima' AND `klk_delivery`.`date_delivery` BETWEEN '$sekarang 00:00:00' AND '$sekarang 23:59:59'
                ";
        $data['delivery'] = $this->db->query($query)->result_array();
        // var_dump($data['delivery']);
        // die;
        $this->load->view('template/index', $data);
    }
    public function verifikasi_Pengantaran($id)
    {
        $this->db->set('status', 'Telah diterima');
        $this->db->where('id_delivery', $id);
        $this->db->update('klk_delivery');
        $this->session->set_flashdata('Message', '<div class="alert alert-success mb-2" role="alert">Pengantaran telah diverifikasi!</div>');
        redirect('driver');
    }
    public function batalkan_Pengantaran($id)
    {
        $this->db->set('status', 'Proses pengantaran');
        $this->db->where('id_delivery', $id);
        $this->db->update('klk_delivery');
        $this->session->set_flashdata('Message', '<div class="alert alert-success mb-2" role="alert">Verifikasi telah dibatalkan!</div>');
        redirect('driver');
    }
    public function excel()
    {
        $bulan = date('m', time());
        $tahun = date('Y', time());
        $status = $this->input->post('status');
        $sekarang = date('Y-m-d', time());

        if ($status == 'Telah diterima') {
            $querysubmenu = "SELECT `klk_delivery`.* FROM `klk_delivery` 
                                  WHERE `klk_delivery`.`date_delivery` BETWEEN '$sekarang 00:00:00' AND '$sekarang 23:59:59'
                                    AND `klk_delivery`.`status` = 'Telah diterima'
                               ORDER BY `klk_delivery`.`date_delivery` DESC";
            $res = $this->db->query($querysubmenu)->result_array();
        } elseif ($status == 'Proses pengantaran') {
            $querysubmenu = "SELECT `klk_delivery`.* FROM `klk_delivery` 
                                  WHERE `klk_delivery`.`date_delivery` BETWEEN '$sekarang 00:00:00' AND '$sekarang 23:59:59'
                                    AND `klk_delivery`.`status` = 'Proses pengantaran'
                               ORDER BY `klk_delivery`.`date_delivery` DESC";
            $res = $this->db->query($querysubmenu)->result_array();
        } else {
            $querysubmenu = "SELECT `klk_delivery`.* FROM `klk_delivery` 
                                  WHERE `klk_delivery`.`status` = 'Proses pengantaran'
                     AND `klk_delivery`.`date_delivery` BETWEEN '$sekarang 00:00:00' AND '$sekarang 23:59:59'
                     OR `klk_delivery`.`status` = 'Telah diterima' AND `klk_delivery`.`date_delivery` BETWEEN '$sekarang 00:00:00' AND '$sekarang 23:59:59'";
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
        $excel->getActiveSheet()->setCellValue('C3', 'No/SPK');
        $excel->getActiveSheet()->setCellValue('D3', 'Alamat');
        $excel->getActiveSheet()->setCellValue('E3', 'No Hp');
        $excel->getActiveSheet()->setCellValue('F3', 'Type');
        $excel->getActiveSheet()->setCellValue('G3', 'Warna');
        $excel->getActiveSheet()->setCellValue('H3', 'No Rangka');
        $excel->getActiveSheet()->setCellValue('I3', 'No Mesin');
        $excel->getActiveSheet()->setCellValue('J3', 'Tanggal Pengantaran');
        $excel->getActiveSheet()->setCellValue('K3', 'Jam');
        $excel->getActiveSheet()->setCellValue('L3', 'Total Pembayaran');
        $excel->getActiveSheet()->setCellValue('M3', 'Lokasi Jemputan Unit');
        $excel->getActiveSheet()->setCellValue('N3', 'Sales');
        $excel->getActiveSheet()->setCellValue('O3', 'Ket');
        $excel->getActiveSheet()->setCellValue('P3', 'Status branch');
        $excel->getActiveSheet()->setCellValue('Q3', 'Status');

        $i = 1;
        $b = 4;
        foreach ($res as $row) {
            $excel->getActiveSheet()->setCellValue('A' . $b, $i++);
            $excel->getActiveSheet()->setCellValue('B' . $b, $row['name_customer']);
            $excel->getActiveSheet()->setCellValue('C' . $b, $row['no_spk']);
            $excel->getActiveSheet()->setCellValue('D' . $b, $row['address']);
            $excel->getActiveSheet()->setCellValue('E' . $b, $row['no_phone']);
            $excel->getActiveSheet()->setCellValue('F' . $b, $row['type']);
            $excel->getActiveSheet()->setCellValue('G' . $b, $row['color']);
            $excel->getActiveSheet()->setCellValue('H' . $b, $row['chassis_number']);
            $excel->getActiveSheet()->setCellValue('I' . $b, $row['machine_number']);
            $excel->getActiveSheet()->setCellValue('J' . $b, date('d-m-Y', strtotime($row['date_delivery'])));
            $excel->getActiveSheet()->setCellValue('K' . $b, $row['time']);
            $excel->getActiveSheet()->setCellValue('L' . $b, 'Rp. ' . number_format($row['total_payment'], 2, ",", "."));
            $excel->getActiveSheet()->setCellValue('M' . $b, $row['location']);
            $excel->getActiveSheet()->setCellValue('N' . $b, $row['sales']);
            $excel->getActiveSheet()->setCellValue('O' . $b, $row['info']);
            $excel->getActiveSheet()->setCellValue('P' . $b, $row['status_branch']);
            $excel->getActiveSheet()->setCellValue('Q' . $b, $row['status']);

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
