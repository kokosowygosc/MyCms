<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/panel_m');
		$this->loged_in() == TRUE || redirect('admin/panel/login');
	}

	public function index()
	{
		$data['comments'] = $this->panel_m->get('comments', FALSE, FALSE, 'date', 'desc');
		$this->load->view('admin/comments/index',$data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		$where=array('id' => $id);
		$data['comment'] = $this->panel_m->get('comments', $where, TRUE);


		if(!empty($_POST)) //jeśli formularz zostanie wysłany
			{
					$config = array(
		               'required'=>'Pole %s nie zostało wypełnione',
		            );

				$this->form_validation->set_message($config);
				
					if ($this->form_validation->run('comment_edit') == TRUE)
						{
							//Jeśli validacja zadziałała
							$data = array(
								'content' => $this->input->post('content'),
							);
								
								$where = array('id' => $id);
								$this->panel_m->update('comments',$where, $data);
							
							redirect('admin/comments');
						}
			}	

		$this->load->view('admin/comments/edit', $data);
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$where=array('id' => $id);
		$this->panel_m->delete('comments', $where);
		redirect('admin/comments');
	}
}

/* End of file comments.php */
/* Location: ./application/controllers/comments.php */