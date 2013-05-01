<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class main extends CI_Controller {

	function index() {
		$this->data['sidebar_options']	= $this->functions->get_sidebar_options();
		$this->data['blog_posts']		= $this->query->get_blog_post_list();
		$this->data['content']			= "main/home";
		$this->data['title']			= "Kirkman's Blog | A Demonstration Project";
		
		$this->load->vars($this->data);
		$this->load->view("template");
	}
	
	function login() {
		if (isset($_POST['login'])):
			if ($login_result = $this->query->authenticate_user($_POST['username'], $_POST['password'])):
				$login_info = array (
					'username' 	=> $_POST['username'],
					'user_id' 	=> $login_result->id,
					'user_type' => $login_result->accountType,
					'logged_in' => TRUE,
				);
				$this->session->set_userdata($login_info);
				$this->index();
				return;
			else:
				$this->data['error'] 	= "The username and/or password provided was incorrect.";
			endif;
		endif;
	
		$this->data['sidebar_options']	= $this->functions->get_sidebar_options();
		$this->data['content']			= "main/login";
		$this->data['title']			= "Log into Kirkman's Blog";
		
		$this->load->vars($this->data);
		$this->load->view("template");
	}
	
	function logout() {
		$this->session->unset_userdata('username');
		$this->session->set_userdata('logged_in', FALSE);
		$this->index();
	}
	
}
