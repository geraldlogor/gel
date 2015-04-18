<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Extra extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['menuactive'] = 'extra';
		$this->load->view('header');
		$this->load->view('menusidebar', $data);
		$this->load->view('extra_view');
		$this->load->view('footer');
	}
}

