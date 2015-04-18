<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Realtime extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['menuactive'] = 'realtime';
		$this->load->view('header');
		$this->load->view('menusidebar', $data);
		$this->load->view('realtime_view');
		$this->load->view('footer');
	}
}

