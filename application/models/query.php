<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class query extends CI_Model {

	function authenticate_user($username, $password) {
		return $this->db->query("SELECT id, accountType FROM users WHERE username = ".$this->db->escape($username)." AND password = ".$this->db->escape($password)."")->row();
	}
	
	function get_blog_post_list() {
		return $this->db->query("SELECT id, title FROM blogEntries")->result();
	}
	
	function get_blog_post($post_id) {
		return $this->db->query("
			SELECT b.id, b.title, b.body, u.username
			FROM blogEntries b
			LEFT JOIN users u ON u.id = b.author
			WHERE b.id = $post_id
		")->row();
	}
	
	function get_blog_brief($post_id) {
		return $this->db->query("
			SELECT b.id, b.title
			FROM blogEntries b
			WHERE b.id = $post_id
		")->row();
	}
	
	function get_blog_comments($post_id) {
		return $this->db->query("
			SELECT c.id, c.comment, u.username
			FROM comments c
			LEFT JOIN users u ON u.id = c.commenter
			WHERE blogId = $post_id
		")->result();	
	}
	
	function save_blog($title, $body) {
		$blog_post = array (
			'title' => $title,
			'body' 	=> $body,
			'author'=> $this->session->userdata('user_id')
		);
		$this->db->insert('blogEntries', $blog_post);
	}
	
	function save_comment($blog_id, $comment) {
		$comment = array (
			'blogId' 	=> $blog_id,
			'comment'	=> $comment,
			'commenter'	=> $this->session->userdata('user_id')
		);
		$this->db->insert('comments', $comment);
	}
}
?>