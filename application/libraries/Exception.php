<?php
	if (!defined('BASEPATH')) exit('No direct script access allowed');
	require_once APPPATH . "/third_party/PHPMailer/src/Exception.php";
	class Exception extends Exceptions {
	    public function __construct() {
	        parent::__construct();
	    }
	}