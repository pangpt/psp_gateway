<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
	}

	function login()
	{
		$this->load->view('backend/login');
	}

    function register()
    {
        $this->load->view('backend/register');
    }

    function proses_register()
    {
        $this->load->model('M_auth');


        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|matches[password]|required');

        $this->form_validation->set_message('required', '{field} harus diisi!');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        if($this->form_validation->run() == TRUE) {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' =>password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'status_user' => 1,
                'level' => 1,
            );
            // var_dump($data);
            $this->M_auth->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info">Data berhasil disimpan','</div>');
            redirect('auth/login', 'refresh');

        } else {
            $this->load->view('backend/register');
        }
    }

    function proses_login()
    {
        $this->load->model('M_auth');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == TRUE) {
            $user = $this->M_auth->get_username($this->input->post('username'));
            if(!$user){
                $this->session->set_flashdata('message', '<div class="alert alert-danger">User tidak ditemukan</div>');
                redirect('auth/login', 'refresh');
            } else if($user->status_user == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">User tidak aktif, hubungi admin</div>');
                redirect('auth/login', 'refresh');
            } else if(!password_verify($this->input->post('password'), $user->password)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Password anda salah</div>');
                redirect('auth/login', 'refresh');
            } else {
                $session = array(
                    'id'            => $user->id,
                    'username'      => $user->username,
                    'email'         => $user->email,
                    'level'         => $user->level,                    
                );

                $this->session->set_userdata($session);
                redirect('dashboard');
            }
        } else {
            $data['title'] = 'Login Pages';
            $this->load->view('backend/register', $data);
        }
    }
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */