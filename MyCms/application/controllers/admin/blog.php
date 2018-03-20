<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/panel_m');

		$this->loged_in() == TRUE || redirect('admin/panel/login');
	}

	public function index()
	{
		$data['blog'] = $this->panel_m->get('blog', FALSE, FALSE, 'date', 'desc');
		$this->load->view('admin/blog/index',$data);
	}

	//tworzymy metode tworzenia uzytkowników
	public function create()
	{
		if(!empty($_POST)) //jeśli formularz zostanie wysłany
		{
			$config = array(
               'required'=>'Pole %s nie zostało wypełnione',
               'is_unique' => 'Inny artykuł ma już taki alias',
            );

		$this->form_validation->set_message($config);

			if ($this->input->post('alias')=='')
				{
					$_POST['alias'] = alias($this->input->post('title'));
				}

			if ($this->form_validation->run('blog_create') == TRUE)
				{
					//Jeśli validacja zadziałała
					$data = array(
						'title' => $this->input->post('title'),
						'alias' => alias($this->input->post('alias')),
						'date' => $this->input->post('date'),
						'content' => $this->input->post('content'),
						'front_img' => $this->input->post('front_img'),
					);
					
					$this->panel_m->create('blog', $data);
					redirect('admin/blog');
				}
		}

		//widok formularza tworzenia użytkoników
		$this->load->view('admin/blog/create');
	}

	public function edit()
	{
		$data = array('error' => ' ');
		$id = $this->uri->segment(4);
		$where = array('id'=>$id);
		$data['article'] = $this->panel_m->get('blog', $where, TRUE);
		$id = $data['article']->id;

		if(!empty($_POST)) //jeśli formularz zostanie wysłany
			{
					$config = array(
		               'required'=>'Pole %s nie zostało wypełnione',
		            );

				$this->form_validation->set_message($config);
				
					if ($this->input->post('alias')=='')
						{
							$_POST['alias'] = alias($this->input->post('title'));
						}

					if ($this->form_validation->run('blog_edit') == TRUE)
						{
							//Jeśli validacja zadziałała
							$data = array(
								'title' => $this->input->post('title'),
								'alias' => alias($this->input->post('alias')),
								'date' => $this->input->post('date'),
								'content' => $this->input->post('content'),
								'front_img' => $this->input->post('front_img'),
							);
								
								$where = array('id' => $id);
								$this->panel_m->update('blog',$where, $data);
							
							redirect('admin/blog');
						}
			}	
			$this->load->view('admin/blog/edit', $data);
			//widok edycji użytkowników
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$this->panel_m->delete('blog', $where);

		$where = array('article_id' => $id);
		$this->panel_m->delete('comments', $where);

		redirect('admin/blog');
	}

	function _unique_alias()
	{
		$id = $this->uri->segment(4);
		$alias = $this->input->post('alias');

		$where = array('alias' => $alias);
		$this->panel_m->unique($id,$where);

		if($this->panel_m->get('blog'))
		{
			$this->form_validation->set_message('_unique_alias','Alias jest już zajęty');
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */