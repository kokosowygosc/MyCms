<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/panel_m');

		$this->loged_in() == TRUE || redirect('admin/panel/login');
	}

	public function index()
	{
		$data['users'] = $this->panel_m->get('users');
		$this->load->view('admin/users/index',$data);
	}

	//tworzymy metode tworzenia uzytkowników
	public function create()
	{
		if(!empty($_POST)) //jeśli formularz zostanie wysłany
		{
			$config = array(
               'required'=>'Pole %s nie zostało wypełnione',
               'valid_email'=>'Wpisałeś niepoprawny email',
               'matches'=>'Hasła nie są identyczne',
               'is_unique' => 'Użytkonik z takim adresem email już istnieje',
            );

		$this->form_validation->set_message($config);

			if ($this->form_validation->run('users_create') == TRUE)
				{
					//Jeśli validacja zadziałała
					$data = array(
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'),
						'dostep' => 'user',
						'conf' => TRUE,
					);
					$data['password'] = pass_salt($data['password']);
					
					$this->panel_m->create('users', $data);
					redirect('admin/users');
				}
		}
		//widok formularza tworzenia użytkoników
		$this->load->view('admin/users/create');
	}

	public function edit()
	{
		$id = $this->uri->segment(4);

		$where = array('id'=>$id);
		//blokada edycji 
		$this->edit_access() != $id || redirect('admin/users');
		$id != '1' || redirect('admin/users');
		//
		$data['user'] = $this->panel_m->get('users', $where, TRUE);
		$id = $data['user']->id;


		if(!empty($_POST)) //jeśli formularz zostanie wysłany
			{
					$config = array(
		               'required'=>'Pole %s nie zostało wypełnione',
		               'valid_email'=>'Wpisałeś niepoprawny email',
		               'matches'=>'Hasła nie są identyczne',
		            );

				$this->form_validation->set_message($config);
				
					if ($this->input->post('password')=='')
						{
							$data['password'] = $data['user']->password;
						}

					if ($this->form_validation->run('users_edit') == TRUE)
						{
							//Jeśli validacja zadziałała
							$data = array(
								'name' => $this->input->post('name'),
								'email' => $this->input->post('email'),
								'dostep' => $this->input->post('dostep'),
								'conf' => TRUE,
								'names' => $this->input->post('names'),
								'names1' => $this->input->post('names1'),
								'place' => $this->input->post('place'),
								'number' => $this->input->post('number'),
								'code' => $this->input->post('code'),
								'post' => $this->input->post('post'),
								'phone' => $this->input->post('phone'),
								'extra' => $this->input->post('extra'),
							);
							if($this->input->post('password')!='')
							{
								$data['password'] = $this->input->post('password');
								$data['password'] = pass_salt($data['password']);
							}

								$where = array('id' => $id);
								$this->panel_m->update('users',$where, $data);
							
							redirect('admin/users');
						}
			}	
			$this->load->view('admin/users/edit', $data);
			//widok edycji użytkowników
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		//blokada usuwania
		$this->edit_access() != $id || redirect('admin/users');
		$id != '1' || redirect('admin/users');
		//
		$this->panel_m->delete('users', $where);

		redirect('admin/users');
	}

	function _unique_email()
	{
		$id = $this->uri->segment(4);
		$email = $this->input->post('email');

		$where = array('email' => $email);
		$this->panel_m->unique($id,$where);

		if($this->panel_m->get('users'))
		{
			$this->form_validation->set_message('_unique_email','Inny użytkownik ma już taki adres email');
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */