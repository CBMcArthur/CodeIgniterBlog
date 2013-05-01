<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class blog extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	function index() {
		die("BLOG!");
	}
	
	function posts($post_id) {
		$this->data['sidebar_options']	= $this->functions->get_sidebar_options();
		$this->data['content']			= "blog/display";
		$this->data['title']			= "Blog Posting | Kirkman's Blog";
		$this->data['blog_posting']		= $this->query->get_blog_post($post_id);
		$this->data['comments']			= $this->query->get_blog_comments($post_id);
		
		$this->load->vars($this->data);
		$this->load->view("template");
	}
	
	function comment($post_id) {
		$this->data['sidebar_options']	= $this->functions->get_sidebar_options();
		$this->data['content']			= "blog/comment";
		$this->data['title']			= "Comment on Blog Posting | Kirkman's Blog";
		$this->data['blog_info']		= $this->query->get_blog_brief($post_id);
		
		$this->load->vars($this->data);
		$this->load->view("template");
	}

	function create() {
		if ($this->session->userdata('user_type') != 2) redirect("/");
		
		$this->data['sidebar_options']	= $this->functions->get_sidebar_options();
		$this->data['content']			= "blog/create";
		$this->data['title']			= "Create Blog Posting | Kirkman's Blog";
		
		$this->load->vars($this->data);
		$this->load->view("template");
	}
	
	function save() {
		if ($this->session->userdata('user_type') != 2) redirect("/");
		
		$this->form_validation->set_rules('title', 'blog title', 'required');
		$this->form_validation->set_rules('body', 'blog body', 'required');
		
		if ($this->form_validation->run() === FALSE):
			$this->create();
		else:
			$this->query->save_blog($_POST['title'], $_POST['body']);
			redirect('/');
		endif;
	}
	
	function save_comment() {
		$this->form_validation->set_rules('comment', 'comment', 'required');
		
		if ($this->form_validation->run() === FALSE):
			$this->comment($_POST['blog_id']);
		else:
			$this->query->save_comment($_POST['blog_id'], $_POST['comment']);
			redirect("blog/posts/".$_POST['blog_id']);
		endif;
	}
}
