<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu1`.*, `user_menu2`. `menu`
                FROM `user_sub_menu1` JOIN `user_menu2`
                ON `user_sub_menu1`.`menu_id1` = `user_menu2`.`id`
                ";
        return $this->db->query($query)->result_array();
    }
    public function getSubMenu2()
    {
        $query2 = "SELECT `user_sub_menu2`.*, `user_sub_menu1`. `title1`
                FROM `user_sub_menu2` JOIN `user_sub_menu1`
                ON `user_sub_menu2`.`menu_id2` = `user_sub_menu1`.`id`
                ";
        return $this->db->query($query2)->result_array();
    }
    public function getDel($menu, $table)
    {
        $this->db->where($menu);
        $this->db->delete($table);
    }

    public function getUpdate($menu, $table)
    {
    }
}
