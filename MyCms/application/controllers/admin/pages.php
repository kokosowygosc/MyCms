<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/panel_m');
		$this->loged_in() == TRUE || redirect('admin/panel/login');
	}

	public function index()
	{
		$data['pages'] = $this->panel_m->get('pages', FALSE, FALSE, 'order', 'asc');
		$this->load->view('admin/pages/index',$data);
	}

	//tworzymy metode tworzenia uzytkowników
	public function create()
	{
		if(!empty($_POST)) //jeśli formularz zostanie wysłany
		{
			$config = array(
               'required'=>'Pole %s nie zostało wypełnione',
               'is_unique' => 'Inna strona ma już taki alias',
            );

		$this->form_validation->set_message($config);

			if ($this->input->post('alias')=='')
				{
					$_POST['alias'] = alias($this->input->post('title'));
				}

			if ($this->form_validation->run('pages_create') == TRUE)
				{
					//Jeśli validacja zadziałała
					$data = array(
						'title' => $this->input->post('title'),
						'alias' => alias($this->input->post('alias')),
						'content' => $this->input->post('content'),
					);
					
					$this->panel_m->create('pages', $data);
					redirect('admin/pages');
				}
		}

		//widok formularza tworzenia użytkoników
		$this->load->view('admin/pages/create');
	}

	public function edit()
	{
		$id = $this->uri->segment(4);

		$where = array('id'=>$id);
		$data['page'] = $this->panel_m->get('pages', $where, TRUE);
		$id = $data['page']->id;


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

					if ($this->form_validation->run('pages_edit') == TRUE)
						{
							//Jeśli validacja zadziałała
							$data = array(
								'title' => $this->input->post('title'),
								'alias' => alias($this->input->post('alias')),
								'content' => $this->input->post('content'),
							);
								
								$where = array('id' => $id);
								$this->panel_m->update('pages',$where, $data);
							
							redirect('admin/pages');
						}
			}	
			$this->load->view('admin/pages/edit', $data);
			//widok edycji użytkowników
	}

	public function ajax()
	{
		$items = $this->input->post('items');
		foreach ($items as $order => $id) 
		{
			$where = array('id' => $id);
			$data = array('order' => $order);
			$this->panel_m->update('pages', $where, $data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$this->panel_m->delete('pages', $where);

		redirect('admin/pages');
	}

	function _unique_alias()
	{
		$id = $this->uri->segment(4);
		$alias = $this->input->post('alias');

		$where = array('alias' => $alias);
		$this->panel_m->unique($id,$where);

		if($this->panel_m->get('pages'))
		{
			$this->form_validation->set_message('_unique_alias','Alias jest już zajęty');
			return FALSE;
		}
		return TRUE;
	}

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */