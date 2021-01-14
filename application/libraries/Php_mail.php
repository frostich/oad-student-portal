<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	require_once APPPATH . "/third_party/PHPMailer/src/PHPMailer.php";
	class Php_mail extends PHPMailer {
	    public function __construct() {
	        parent::__construct();
	    }
	}