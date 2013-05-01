<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class functions extends CI_Model {

	function get_sidebar_options() {
		$options = array();
		if ($this->session->userdata('logged_in')):
			$options['Log out'] = base_url().'logout';
			if ($this->session->userdata('user_type') == 2):
				$options['Create Blog Post'] = base_url().'blog/create';
			endif;
		else:
			$options['Log in'] = base_url().'login';
		endif;
		return $options;
	}
}
?>