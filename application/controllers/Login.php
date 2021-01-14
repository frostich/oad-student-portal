<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('login_model', 'login');
	}

	public function index()
	{
        // echo $_SERVER['REQUEST_URI'];
		$data = array(
			'page'		=>	2,
			'semester'	=>	$this->login->get_semester()
		);
		$this->load->view('pages/login_view', $data);
	}

	public function user_login()
	{
		$studid = $this->input->post('idno');
		$password = $this->input->post('upass');
		$semester = $this->input->post('semester');
		$email = $this->input->post('uemail');
		$otp = $this->login->check_otp($studid);
		if (strtoupper($otp[0]->lastname) == $otp[0]->otp) {
			$password = $this->input->post('upass');
		}else{
			$password = md5($this->input->post('upass'));
		}
		
		$data = $this->login->check_user($studid, $password);
		
		if (count($data) > 0) {
			$credentials = array(
				'semester'	    =>	$this->login->get_period($semester)[0]->pname,
				'period'	    =>	$this->login->get_period($semester)[0]->pid,
				'lastname'	    =>	$data[0]->lastname,
				'firstname'	    =>	$data[0]->firstname,
				'course'	    =>	$data[0]->course,
				'section'	    =>	$data[0]->section,
				'studid'	    =>	$data[0]->studid,
				'account_type'	=>	$data[0]->user_type,
				'uid'		    =>	$data[0]->uid
			);
			$this->session->set_userdata($credentials);

			$verification_code = array(
				'user_verification_code'	=> $this->get_random_number(),
				'user_email'				=> $email
			);

			$this->session->set_userdata($verification_code);

			//Check email first if its an official email
			$verify_email = $this->login->check_user($studid, $password);
			if ($verify_email[0]->email == $email) {
				redirect('gr-verification');
			}else{
				$this->session->set_flashdata('invalid_email', 1);
				redirect('gr-login');
			}
		}else{
			$this->session->set_flashdata('error', 1);
			redirect('gr-login');
            // echo json_encode($data);
		}
		// $this->session->set_userdata($newdata);
		// echo $data[0]->otp;
		// echo count($data);
        
	}

	function get_random_number(){
		$today = date('YmdHi');
		$startDate = date('YmdHi', strtotime('-10 days'));
		$range = $today - $startDate;
		$rand1 = rand(0, $range);
		$rand2 = rand(0, 600000);
		return  $value=($rand1+$rand2);
	 }
}
