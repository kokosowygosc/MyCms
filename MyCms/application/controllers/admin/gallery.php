<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/panel_m');
		$this->loged_in() == TRUE || redirect('admin/panel/login');
	}

	public function index()
	{
		if($_POST)
		{
			$this->panel_m->upload();
		}

		$data['files'] = $this->panel_m->get_image();

		$this->load->view('admin/gallery', $data);
	}

	public function delete()
	{
		if($_POST)
		{
			$file = $this->input->post('image_name');
			unlink( BASEPATH . "../images/" . $file);
			redirect('admin/gallery');
		}
	}

}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */