<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getUserLogin()
    {
        $user = $this->session->userdata('id_user');
        $query = "SELECT `klk_user`.*, `klk_role`.`alias`
                    FROM `klk_user` JOIN `klk_role`
                      ON `klk_role`.`id_role` = `klk_user`.`role_id`
                   WHERE `klk_user`.`id_user` = $user
                ";
        return $this->db->query($query)->row_array();
    }
}
