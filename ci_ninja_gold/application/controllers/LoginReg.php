<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginReg extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login_reg_index');
	}

	public function process_registration()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("pw", "Password", 'required');
		$this->form_validation->set_rules("pw_confirm", "Password Confirmation", 'required|matches[pw]');
			if($this->form_validation->run() === FALSE)
				{
				     $this->view_data["errors"] = validation_errors();

				}
			else
				{
					 $newUser['name'] = $this->input->post('name');
					 $newUser['email'] = $this->input->post('email');
					 $newUser['password'] = $this->input->post('pw');
					 $this->load->model('User_model');
					 $add_newUser = $this->User_model->add_user($newUser);
				     $this->load->view('registration_success');
				}
	}
	public function process_login()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("pw", "Password", 'required');
		if($this->form_validation->run() === FALSE)
			{
				$this->session->set_userdata("errorsR") = validation_errors();

			}
		else
		{
			$user['email']=$this->input->post('email');
			$user['password']=$this->input->post('pw');
			$this->load->model('User_model');
			$currentUser = $this->User_model->login_user($user);
			$this->session->set_userdata($currentUser);
			$this->load->view('game_view');
		}
	}


}
