<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('site/site_m');
		$this->load->model('admin/panel_m');
		$this->loged_in() == TRUE || redirect('blog/index');
	}

	public function index()
	{
		$email=$this->session->all_userdata();

		$email=$email['email'];
		$where = array('email' => $email);
		$data['user'] = $this->site_m->get('users', $where, TRUE);

		$id = $data['user']->id;



		if($_POST) //jeśli formularz zostanie wysłany
		{
			$config = array(
               'matches'=>'Hasła nie są identyczne',
            );
			$this->form_validation->set_message($config);
			
			if ($this->input->post('password')=='')
			{
				$data['password'] = $data['user']->password;
			}

			if ($this->form_validation->run('user_edit') == TRUE)
			{
				//Jeśli validacja zadziałała
				$data = array(
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
					$where1 = array('id' => $id);
					$this->panel_m->update('users',$where1, $data);
					redirect('user/index');
			}
		}
		$this->load->view('site/user', $data);
	}

}

/* End of file  */
/* Location: ./application/controllers/ */