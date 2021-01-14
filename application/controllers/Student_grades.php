<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_grades extends CI_Controller {

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
		$this->load->library('Mybreadcrumb');
		$this->load->model('student_model', 'student');
		if (!isset($_SESSION['uid'])) {
			redirect('/gr-login');
		}
	}

	public function index()
	{
        $this->mybreadcrumb->add('Student', base_url('gr-student'));
        $this->mybreadcrumb->add('Grade', base_url('gr-grade-profile'));
        $data = array(
			'page'		    =>	2,
            'breadcrumbs'   =>  $this->mybreadcrumb->render()
		);
		$this->load->view('pages/student_view', $data);
	}
}
