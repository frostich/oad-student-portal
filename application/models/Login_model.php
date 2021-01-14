<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

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
		$this->load->database();
	}

	public function get_semester()
	{
		$query = $this->db->query("SELECT * FROM tbl_period WHERE pstatus = 1 ORDER BY pnum,pname ASC");
		
		return $query->result();
	}

	public function check_otp($uname)
	{
		$query = $this->db->query("SELECT * FROM tbl_users WHERE studid = '$uname'");

		return $query->result();
	}

	public function check_user($uname, $upass)
	{
		$query = $this->db->query("SELECT tbl_users.*, tbl_course.course, tbl_course.section FROM tbl_users LEFT JOIN tbl_course ON tbl_users.studid = tbl_course.studid WHERE tbl_users.studid = '$uname' AND tbl_users.password = '$upass'");

		return $query->result();
	}

	public function get_period($pid)
	{
		$query = $this->db->query("SELECT pid, pname FROM tbl_period WHERE pid = '$pid'");
		
		return $query->result();
	}
}
