<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
public function index()
{
	if ($this->session->userdata('username')) {
		redirect('dashboard');
	}

	$this->form_validation->set_rules('username', 'Username', 'trim|required');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');

	if ($this->form_validation->run() == FALSE) {

		$this->load->view('auth/masuk');
	} else {
		$this->_masuk();
	}
}
	private function _masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('klk_user', ['username' => $username])->row_array();
		//var_dump($user);
		//die;
		if ($user) {

			if ($user['is_active'] == 1) {

				if (password_verify($password, $user['password'])) {
					$data = [
						'username' => $user['username'],
						'id_user' => $user['id_user'],
						'role_id' => $user['role_id']
					];
					// var_dump($data);
					// die;
					$this->session->set_userdata($data);
					redirect('dashboard/');
				} else {
					$this->session->set_flashdata('Message', '<div class="alert alert-danger" role="alert">Username atau password tidak valid!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('Message', '<div class="alert alert-danger" role="alert">Akun anda telah diberhentikan!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('Message', '<div class="alert alert-danger" role="alert">Username atau password tidak valid!</div>');
			redirect('auth');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('Message', '<div class="alert alert-danger" role="alert">Anda telah logout!</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
