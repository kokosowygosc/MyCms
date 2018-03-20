<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/panel_m');
	}

	public function index()
	{
		$data['files'] = $this->panel_m->get_image();

		$where = array('id' => '11' );
		$query = $this->panel_m->get('config', $where, TRUE);
		if (@$query->value =='NIE')
		{
			redirect('');
		}

		$this->load->view('site/gallery', $data);
	}

}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */