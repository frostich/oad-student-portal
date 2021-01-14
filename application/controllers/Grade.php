<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends CI_Controller {

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
		$this->load->model('grade_model', 'grade');
		if (!isset($_SESSION['uid'])) {
			redirect('/gr-login');
		}
	}

	public function index()
	{
		$data = array(
			'page'		=>	1,
			'otp'		=>	$this->grade->check_otp(),
			'grades'	=>	$this->grade->get_grades($_SESSION['period'], $_SESSION['studid'])
		);
		$this->load->view('pages/grade_view', $data);
	}

	public function change_password()
	{
		$new_pass = md5($this->input->post('new_password'));
		$data = array(
			'password'	=>	$new_pass,
			'otp'		=>	''
		);
		$sql = $this->grade->update('tbl_users', $data, array('uid' => $_SESSION['uid']));
		if ($sql > 0) {
			session_destroy();
			redirect('gr-login');
		}
	}
}
