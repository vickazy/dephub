<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of template
 *
 * @author Administrator
 */
class Template {
    protected $ci;

    // Constructor
    function __construct() {
        $this->_ci = &get_instance();
    }

    // Default Template
    function display($template, $data = null) {
	if($this->_ci->session->userdata('is_login')){
	    $type = $this->_ci->session->userdata('login_info');
	    if($type == 4)
	    {
		$menu = 'template/menu/administrator';
	    } else if($type == 1)
	    {
		$menu = 'template/menu/perencanaan';
	    } else if($type == 2)
	    {
		$menu = 'template/menu/penyelenggaraan';
	    } else if($type == 3)
	    {
		$menu = 'template/menu/sarpras';
	    }
	} else {
	    $menu = 'template/menu/dashboard';
	}
        $data['_header'] = $this->_ci->load->view('template/header', $data, true);
        $data['_menu'] = $this->_ci->load->view($menu, $data, true);
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $this->_ci->load->view('/template/main.php', $data);
    }

}

/* End of file main.php */
/* Location: ./application/libraries/main.php */