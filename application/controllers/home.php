<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['menuactive'] = 'historical';
		$this->load->view('header');
		$this->load->view('menusidebar', $data);
		$this->load->view('home_view');
		$this->load->view('footer');
	}
}

