<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'User';
        $data['content'] = 'admin/index';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        if ($this->session->userdata('role_id') == 5) {
            $data['branch'] = $this->db->get('klk_user')->result_array();
        } else {
            $data['branch'] = $this->db->get_where('klk_user', ['role_id' => 2])->result_array();
        }
        // var_dump($data);
        // die;

        $this->load->view('template/index', $data);
    }
    public function logistic_staff()
    {
        $data['title'] = 'Logistic Staff';
        $data['content'] = 'admin/logistic_staff';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function detail_branch($id)
    {
        $data['title'] = 'Detail User';
        $data['content'] = 'admin/detail_branch';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $query = "SELECT `klk_delivery`.*, `klk_user`.`name`
                    FROM `klk_delivery` JOIN `klk_user`
                      ON `klk_delivery`.`id_branch` = `klk_user`.`id_user`
                   WHERE `klk_delivery`.`id_branch` = $id
                ";
        $data['data_branch'] = $this->db->query($query)->row_array();

        $this->load->view('template/index', $data);
    }
    public function edit_user($id)
    {
        $data['title'] = 'Edit User';
        $data['content'] = 'admin/edit_user';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $data['branch'] = $this->db->get_where('klk_user', ['id_user' => $id])->row_array();

        $this->load->view('template/index', $data);
    }
    public function update_user($id)
    {
        $username = $this->input->post('username');
        $name = $this->input->post('nama_pengguna');
        $email = $this->input->post('email');
        $no_telpon = $this->input->post('no_telpon');
        $alamat = $this->input->post('alamat');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

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
        $this->db->set('password', $password);
        $this->db->where('id_user', $id);
        $this->db->update('klk_user');
        $this->session->set_flashdata('Message', '<div class="alert alert-success mb-2" role="alert">Pembaruan data telah disimpan!</div>');
        redirect('admin/edit_user/' . $id);
    }
    public function addBranch()
    {
        $data['title'] = 'Tambah User';
        $data['content'] = 'admin/tambah_branch';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function tambah_branch()
    {
        $klk_user = $this->db->query("SELECT id_user FROM klk_user ORDER BY id_user DESC limit 1");
        $jumlah_user = $klk_user->num_rows();
        foreach ($klk_user->result() as $user) {
            $no_urut = $user->id_user;
        }
        if ($jumlah_user <> 0) {
            $kode = intval($no_urut) + 1;
        } else {
            $kode = 1;
        }
        $id_user = str_pad($kode, 6, "0", STR_PAD_LEFT);

        $upload_image = $_FILES['img-br']['name'];
        // var_dump($upload_image);
        // die;
        if ($upload_image) {
            $config['upload_path'] = './assets/images/avatars/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '10240';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img-br')) {

                $new_img = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->insert('klk_user', [
            'id_user' => $id_user,
            'name' => $this->input->post('nama_pengguna'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'image' => $new_img,
            'no_phone' => $this->input->post('no_telpon'),
            'address' => $this->input->post('alamat'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
        ]);
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> User baru telah ditambahkan!</div>');
        redirect('admin/addbranch');
    }
    public function detail_user($id)
    {
        $data['title'] = 'Edit Branch';
        $data['content'] = 'admin/detail_user';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $query = "SELECT `klk_user`.*, `klk_role`.`alias`
                    FROM `klk_user` JOIN `klk_role`
                      ON `klk_role`.`id_role` = `klk_user`.`role_id`
                   WHERE `klk_user`.`id_user` = $id
                ";
        $data['branch'] = $this->db->query($query)->row_array();

        $this->load->view('template/index', $data);
    }
    public function deluser($id)
    {
        $branch = $this->db->get_where('klk_user', ['id_user' => $id])->row_array();
        $this->load->model('Menu_model', 'branch');
        $this->branch->getDel($branch, 'klk_user');
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> User telah dihapus!</div>');
        redirect('admin');
    }
    public function getsplogistic()
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `klk_delivery`.* FROM `klk_delivery` ORDER BY `klk_delivery`.`date_delivery` DESC";
        $res = $this->db->query($querysubmenu)->result();
        $no = 1;
        foreach ($res as $row) {
            $data_row[] = array(
                'no'   => $no,
                'name_customer'  => $row->name_customer,
                'address' => $row->address,
                'type' => $row->type,
                'color' => $row->color,
                'chassis_number' => $row->chassis_number,
                'date_delivery' => date('d-m-Y', strtotime($row->date_delivery)),
                'time' => $row->time,
                'sales' => $row->sales,
                'info' => $row->info
            );
            $no++;
        }
        $data['data'] = $data_row;
        echo (json_encode($data));
    }
    public function getspbranch($id)
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `klk_delivery`.* FROM `klk_delivery` WHERE `klk_delivery`.`id_branch` = $id ORDER BY `klk_delivery`.`date_delivery` DESC";
        $res = $this->db->query($querysubmenu)->result();
        $no = 1;
        foreach ($res as $row) {
            $data_row[] = array(
                'no'   => $no,
                'name_customer'  => $row->name_customer,
                'no_spk' => $row->no_spk,
                'address' => $row->address,
                'type' => $row->type,
                'color' => $row->color,
                'chassis_number' => $row->chassis_number,
                'machine_number' => $row->machine_number,
                'date_delivery' => date('d-m-Y', strtotime($row->date_delivery)),
                'time' => $row->time,
                'total_payment' => 'Rp. ' . number_format($row->total_payment, 2, ",", "."),
                'sales' => $row->sales,
                'info' => $row->info
            );
            $no++;
        }
        $data['data'] = $data_row;
        echo (json_encode($data));
    }
    public function cetak()
    {
        require_once FCPATH . '/vendor/autoload.php';

        $awal = $this->input->post('tahun') . '-' . $this->input->post('bulan') . '-01';
        $akhir = $this->input->post('tahun') . '-' . $this->input->post('bulan') . '-31';
        $hasBulan = $this->input->post('bulan') !== '';
        $hasTahun = $this->input->post('Tahun') !== '';

        // if ($hasBulan && $hasTahun) {
        // } else if ($hasBulan) {
        //     self . table . search(tahun + ' ' + value) . draw();
        // } else if (hasBulan) {
        //     self . table . search(bulan + ' ' + value) . draw();
        // } else {
        //     self . table . search(value) . draw();
        // }

        $querysubmenu = "SELECT `klk_delivery`.* FROM `klk_delivery` 
                              WHERE `klk_delivery`.`date_delivery` 
                            BETWEEN '$awal' AND '$akhir'
                           ORDER BY `klk_delivery`.`date_delivery` DESC";
        $res = $this->db->query($querysubmenu)->result_array();
        // var_dump($res);
        // die;

        $mpdf = new \Mpdf\Mpdf();

        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Data Pengantaran</title>
        </head>
        <body>
            <h1>Data pada </h1>
            <table border="1" cellspacing="0" cellpadding="6">
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>No/SPK</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>type</th>
                    <th>Warna</th>
                    <th>No Rangka</th>
                    <th>No Mesin</th>
                    <th>Tanggal Pengantaran</th>
                    <th>Jam</th>
                    <th>Total Pembayaran</th>
                    <th>Lokasi Jemputan Unit</th>
                    <th>Sales</th>
                    <th>Ket</th>
                    <th>Status</th>
                </tr>';

        $i = 1;
        foreach ($res as $row) {
            $html .= '<tr>
                    <td>' . $i++ . '</td>
                    <td>' . $row['name_customer'] . '</td>
                    <td>' . $row['no_spk'] . '</td>
                    <td>' . $row['address'] . '</td>
                    <td>' . $row['no_phone'] . '</td>
                    <td>' . $row['type'] . '</td>
                    <td>' . $row['color'] . '</td>
                    <td>' . $row['chassis_number'] . '</td>
                    <td>' . $row['machine_number'] . '</td>
                    <td>' . $row['date_delivery'] . '</td>
                    <td>' . $row['time'] . '</td>
                    <td>' . 'Rp. ' . number_format($row['total_payment'], 2, ",", ".") . '</td>
                    <td>' . $row['location'] . '</td>
                    <td>' . $row['sales'] . '</td>
                    <td>' . $row['info'] . '</td>
                    <td>' . $row['status'] . '</td>
                </tr>';
        }

        $html .= '</table>          
        </body>
        </html>';

        $mpdf->WriteHTML($html);
        $mpdf->Output();
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
