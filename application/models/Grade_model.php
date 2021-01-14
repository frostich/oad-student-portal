<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade_model extends CI_Model {

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

	public function check_otp()
	{
		$uid = $_SESSION['uid'];
		$query = $this->db->query("SELECT * FROM tbl_users WHERE uid = '$uid'");

		return $query->result();
	}

	public function update($table, $data, $where)
	{
		return $this->db->update($table, $data, $where);
	}

	public function get_grades($pid, $studid)
	{
		$query = $this->db->query("SELECT tbl_grades.*, tbl_course.course, tbl_course.section FROM tbl_grades INNER JOIN tbl_course ON tbl_grades.studid = tbl_course.studid WHERE tbl_grades.pid = '$pid' AND tbl_grades.studid = '$studid'");

		return $query->result();
	}
}
