<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('site/site_m');
		$data['loged_in'] = $this->loged_in();
		$data['admin'] = $this->admin();
		$data['pages'] = $this->site_m->get('pages', FALSE, FALSE, 'order', 'asc');
		$data['popular_posts'] = $this->site_m->get('blog', FALSE, FALSE, 'views', 'desc', 4);
		$data['last_comments'] = $this->site_m->get('comments', FALSE, FALSE, 'date', 'desc', 4);
		$this->load->vars($data);
	}

	public function index()
	{
		
	}

	public function loged_in()
	{
		return $this->session->userdata('loged_in');
	}

	public function admin()
	{
		return $this->session->userdata('dostep');
	}

	public function edit_access()
	{
		return $this->session->userdata('id');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/controllers/MY_Controller.php */