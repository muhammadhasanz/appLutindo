<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Control';
        $data['content'] = 'menu/index';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $data_row = array();
        $res = $this->db->query('SELECT * FROM klk_menu')->result();
        foreach ($res as $row) {
            $data_row[] =
                $row->menu;
        }
        $tags['tags'] = $data_row;
        $data['tags_menu'] = (json_encode($tags));

        $this->load->view('template/index', $data);
    }
    public function submenu()
    {
        $data['title'] = 'Submenu';
        $data['content'] = 'menu/submenu';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $qsubmenu = "SELECT `klk_sub_menu`.*, `klk_menu`.`menu`, `klk_menu`.`id` as `id_menu`
                           FROM `klk_sub_menu` JOIN `klk_menu` 
                             ON `klk_sub_menu`.`menu_id_sub` = `klk_menu`.`id`";
        $data['upsubmenu'] = $this->db->query($qsubmenu)->result_array();
        $data['menu'] = $this->db->get('klk_menu')->result_array();

        $this->load->view('template/index', $data);
    }
    public function dropdown()
    {
        $data['title'] = 'Dropdown';
        $data['content'] = 'menu/dropdown';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $data['dropdown'] = $this->db->get('klk_dropdown')->result_array();
        $data['submenux'] = $this->db->get('klk_sub_menu')->result_array();

        $this->load->view('template/index', $data);
    }
    public function role()
    {
        $data['title'] = 'Role';
        $data['content'] = 'menu/role';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $this->load->view('template/index', $data);
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Pembatasan Hak Akses';
        $data['content'] = 'menu/roleaccess';
        $this->load->model('Login_model', 'login');
        $data['user'] = $this->login->getUserLogin();

        $data['role'] = $this->db->get_where('klk_role', ['id_role' => $role_id])->row_array();

        $data['menu'] = $this->db->get('klk_menu')->result_array();

        $this->load->view('template/index', $data);
    }
    public function changeAccess()
    {
        $role_id = $this->input->post('roleId');
        $menu_id = $this->input->post('menuId');

        $data = [
            'id_role' => $role_id,
            'id_menu' => $menu_id
        ];

        $result = $this->db->get_where('klk_user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('klk_user_access_menu', $data);
        } else {
            $this->db->delete('klk_user_access_menu', $data);
        }
        $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Akses telah diubah!</div>');
    }
    public function getMenu()
    {
        $data = array();
        $data_row = array();
        $res = $this->db->query('SELECT * FROM klk_menu')->result();
        $no = 1;
        foreach ($res as $row) {
            $data_row[] = array(
                'no'   => $no,
                'id'   => $row->id,
                'menu'  => $row->menu,
                'nmenu' => $row->nmenu
            );
            $no++;
        }
        $data['data'] = $data_row;
        echo (json_encode($data));
    }
    public function getSubmenu()
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `klk_sub_menu`.*, `klk_menu`.`menu`
                           FROM `klk_sub_menu` JOIN `klk_menu` 
                             ON `klk_sub_menu`.`menu_id_sub` = `klk_menu`.`id`
                        ORDER BY `klk_sub_menu`.`id` ASC";
        $res = $this->db->query($querysubmenu)->result();
        $no = 1;
        $aktif = array('Tdk aktif', 'Aktif');
        foreach ($res as $row) {
            if ($row->li_class === 'has-child') {
                $li = 'Ya';
            } else {
                $li = 'Tidak';
            }
            $data_row[] = array(
                'no'   => $no,
                'id'   => $row->id,
                'submenu'  => $row->title_sub,
                'menu' => $row->menu,
                'icon' => $row->icon_sub,
                'dropdown' => $li,
                'status' => $row->is_active_sub,
                'base' => base_url()
            );
            $no++;
        }
        $data['data'] = $data_row;
        echo (json_encode($data));
    }
    public function getDropdown()
    {
        $data = array();
        $data_row = array();
        $querysubmenu = "SELECT `klk_dropdown`.*, `klk_sub_menu`.`title_sub`,`klk_sub_menu`.`id`as`id_submenu`
                           FROM `klk_dropdown` JOIN `klk_sub_menu` 
                             ON `klk_dropdown`.`menu_id_drop` = `klk_sub_menu`.`id`";
        $res = $this->db->query($querysubmenu)->result();
        $no = 1;
        foreach ($res as $row) {
            if ($row->is_active_drop == 1) {
                $cek = 'checked';
            } else {
                $cek = '';
            }
            $data_row[] = array(
                'no'   => $no,
                'id'   => $row->id,
                'idsubmenu'   => $row->id_submenu,
                'dropdown'  => $row->title_drop,
                'submenu'  => $row->title_sub,
                'url' => $row->url_drop,
                'status' => $row->is_active_drop,
                'cek' => $cek
            );
            $no++;
        }
        $data['data'] = $data_row;
        echo (json_encode($data));
    }
    public function getRole()
    {
        $data = array();
        $data_row = array();
        $res = $this->db->query('SELECT * FROM klk_role')->result();
        $no = 1;
        foreach ($res as $row) {
            $data_row[] = array(
                'no'   => $no,
                'id'   => $row->id_role,
                'alias'  => $row->alias,
                'role'  => $row->role_name
            );
            $no++;
        }
        $data['data'] = $data_row;
        echo (json_encode($data));
    }
    public function getRoleAccess($id)
    {
        $data = array();
        $data_row = array();
        $res = $this->db->query('SELECT * FROM klk_menu')->result();
        $no = 1;
        foreach ($res as $row) {
            $this->db->where('id_role', $id);
            $this->db->where('id_menu', $row->id);
            $result = $this->db->get('klk_user_access_menu');

            if ($result->num_rows() > 0) {
                $cek = 'checked';
            } else {
                $cek = '';
            }
            $data_row[] = array(
                'no'   => $no,
                'id'   => $row->id,
                'menu'  => $row->menu,
                'id_role' => $id,
                'cek' => $cek
            );
            $no++;
        }
        $data['data'] = $data_row;
        echo (json_encode($data));
    }
    public function tambah($seg)
    {
        if ($seg == 'submenu') {
            $this->db->insert('klk_sub_menu', [
                'menu_id_sub' => $this->input->post('menu'),
                'title_sub' => $this->input->post('submenu'),
                'icon_sub' => $this->input->post('icon'),
                'li_class' => $this->input->post('dropdown'),
                'url_sub' => $this->input->post('url'),
                'is_active_sub' => $this->input->post('status')
            ]);
            $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Submenu telah ditambahkan!</div>');
            redirect('menu/submenu');
        } elseif ($seg == 'dropdown') {
            if ($this->input->post('status') == 1) {
                $status = $this->input->post('status');
            } else {
                $status = 0;
            }
            $this->db->insert('klk_dropdown', [
                'menu_id_drop' => $this->input->post('submenu'),
                'title_drop' => $this->input->post('dropdown'),
                'url_drop' => $this->input->post('url'),
                'is_active_drop' => $status
            ]);
            $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Dropdown telah ditambahkan!</div>');
            redirect('menu/dropdown');
        } elseif ($seg == 'role') {
            $this->db->insert('klk_role', [
                'role_name' => $this->input->post('role'),
                'alias' => $this->input->post('alias')
            ]);
            $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Role telah ditambahkan!</div>');
            redirect('menu/role');
        } else {
            $this->db->insert('klk_menu', [
                'menu' => $this->input->post('menu'),
                'nmenu' => $this->input->post('nmenu')
            ]);
            $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"><button type="button" class="close" data-dismiss="alert">×</button> Menu telah ditambahkan!</div>');
            redirect('menu');
        }
    }
    public function update($seg, $id)
    {
        if ($seg == 'submenu') {
            $menu = $this->input->post('menu');
            $submenu = $this->input->post('submenu');
            $submenu = $this->input->post('submenu');
            $icon = $this->input->post('icon');
            $dropdown = $this->input->post('dropdown');
            $url = $this->input->post('url');
            $status = $this->input->post('status');
            $this->db->set('menu_id_sub', $menu);
            $this->db->set('title_sub', $submenu);
            $this->db->set('icon_sub', $icon);
            $this->db->set('li_class', $dropdown);
            $this->db->set('url_sub', $url);
            $this->db->set('is_active_sub', $status);
            $this->db->set('is_active_sub', $status);
            $this->db->where('id', $id);
            $this->db->update('klk_sub_menu');
            $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"> <button type="button" class="close" data-dismiss="alert">×</button> Submenu  telah diubah!</div>');
            redirect('menu/submenu');
        } elseif ($seg == 'dropdown') {
            $submenu = $this->input->post('submenu');
            $dropdown = $this->input->post('dropdown');
            $url = $this->input->post('url');
            $status = $this->input->post('status');
            $this->db->set('menu_id_drop', $submenu);
            $this->db->set('title_drop', $dropdown);
            $this->db->set('url_drop', $url);
            $this->db->set('is_active_drop', $status);
            $this->db->where('id', $id);
            $this->db->update('klk_dropdown');
            $this->session->set_flashdata('Message', '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert">×</button> Dropwown telah diubah!</div>');
            redirect('menu/dropdown');
        } elseif ($seg == 'role') {
            $role = $this->input->post('role');
            $alias = $this->input->post('alias');
            $this->db->set('role_name', $role);
            $this->db->set('alias', $alias);
            $this->db->where('id_role', $id);
            $this->db->update('klk_role');
            $this->session->set_flashdata('Message', '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert">×</button> Data role telah diubah!</div>');
            redirect('menu/role');
        } else {
            $menu = $this->input->post('menu');
            $nmenu = $this->input->post('nmenu');
            $this->db->set('menu', $menu);
            $this->db->set('nmenu', $nmenu);
            $this->db->where('id', $id);
            $this->db->update('klk_menu');
            $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"> <button type="button" class="close" data-dismiss="alert">×</button> Menu telah diubah!</div>');
            redirect('menu');
        }
    }
    public function delete($seg, $id)
    {
        if ($seg == 'submenu') {
            $menu = $this->db->get_where('klk_sub_menu', ['id' => $id])->row_array();
            $this->load->model('Menu_model', 'menu');
            $this->menu->getDel($menu, 'klk_sub_menu');
            $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"> <button type="button" class="close" data-dismiss="alert">×</button> Submenu  telah dihapus!</div>');
            redirect('menu/submenu');
        } elseif ($seg == 'dropdown') {
            $menu = $this->db->get_where('klk_dropdown', ['id' => $id])->row_array();
            $this->load->model('Menu_model', 'menu');
            $this->menu->getDel($menu, 'klk_dropdown');
            $this->session->set_flashdata('Message', '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert">×</button> Dropdown telah dihapus!</div>');
            redirect('menu/dropdown');
        } elseif ($seg == 'role') {
            $menu = $this->db->get_where('klk_role', ['id_role' => $id])->row_array();
            $this->load->model('Menu_model', 'menu');
            $this->menu->getDel($menu, 'klk_role');
            $this->session->set_flashdata('Message', '<div class="alert alert-success mt-2 alert-dismissible fade show" role="alert"> <button type="button" class="close" data-dismiss="alert">×</button> Role telah dihapus!</div>');
            redirect('menu/role');
        } else {
            $menu = $this->db->get_where('klk_menu', ['id' => $id])->row_array();
            $this->load->model('Menu_model', 'menu');
            $this->menu->getDel($menu, 'klk_menu');
            $this->session->set_flashdata('Message', '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert"> <button type="button" class="close" data-dismiss="alert">×</button> Menu telah dihapus!</div>');
            redirect('menu');
        }
    }
}
