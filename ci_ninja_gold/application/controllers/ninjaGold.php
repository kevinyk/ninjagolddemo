<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ninjaGold extends CI_Controller {

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
		$this->load->view('users_index');
	}
	public function process_money()
	{
		// $this->load->model('User_model');
		if($this->session->userdata('gold')==null)
		{
			$this->session->set_userdata('gold', 0);
		}
		if($this->session->userdata('activity_log')==null)
		{
			$this->session->set_userdata('activity_log', array());
		}
		$currentLocation = $this->input->post('location');
		$currentGold = $this->session->userdata('gold');
		if($currentLocation=='farm')
		{
			$gainedGold = rand(10,20);
		}
		if($currentLocation=='cave')
		{
			$gainedGold = rand(5,10);
		}
		if($currentLocation=='house')
		{
			$gainedGold = rand(2,5);
		}
		if($currentLocation=='casino')
		{
			$gainedGold = rand(-50,50);
		}
		$currentGold+=$gainedGold;
		$activityLog=$this->session->userdata('activity_log');
		array_unshift($activityLog,'<p>You went to the '.$currentLocation.' and got '.$gainedGold.' gold.'.date(" j F Y h:i:s A").')</p>' );
		$this->session->set_userdata('activity_log', $activityLog);
		$this->session->set_userdata('gold', $currentGold);
		// $currentGold = $this->session->userdata('gold');
		// $this->User_model->update_user($newGold);
		$this->load->view('game_view');
	}
}
