<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/panel_m');
	}

	public function index()
	{
		$this->loged_in() == TRUE || redirect('admin/panel/login');
		$this->admin() != 'user' || redirect('');
		$data['loged_in'] = $this->loged_in();



		if(!empty($_POST)) //jeśli formularz zostanie wysłany
		{
			$config = array(
               'required'=>'Pole %s nie zostało wypełnione',
               'integer' => 'Pole %s musi być liczbą',
            );

		$this->form_validation->set_message($config);

			if ($this->form_validation->run('config_up') == TRUE)
				{
					//Jeśli validacja zadziałała
					$data = array(
						array(
							'option' => 'site_name',
							'value' => $this->input->post('site_name'),
						),
						array(
							'option' => 'meta_desc',
							'value' => $this->input->post('meta_desc'),
						),
						array(
							'option' => 'front_theme',
							'value' => $this->input->post('front_theme'),
						),
						array(
							'option' => 'back_theme',
							'value' => $this->input->post('back_theme'),
						),
						array(
							'option' => 'num_posts',
							'value' => $this->input->post('num_posts'),
						),
						array(
							'option' => 'num_gal',
							'value' => $this->input->post('num_gal'),
						),
						array(
							'option' => 'text_foot',
							'value' => $this->input->post('text_foot'),
						),
						array(
							'option' => 'fb_link',
							'value' => $this->input->post('fb_link'),
						),
						array(
							'option' => 'tweet_link',
							'value' => $this->input->post('tweet_link'),
						),
						array(
							'option' => 'yt_link',
							'value' => $this->input->post('yt_link'),
						),
						array(
							'option' => 'gallery',
							'value' => $this->input->post('gallery'),
						),
					);
					
					$this->panel_m->update_batch('config', $data, 'option');
					redirect('admin/panel');
				}
		}	
				$this->load->view('admin/panel/index', $data);
	}

	public function login()
	{
		$this->loged_in() == FALSE || redirect('admin/panel');
		if($_POST)
		{
			$config = array(
		               'required'=>'Pole %s nie zostało wypełnione',
		               'valid_email'=>'Wpisałeś niepoprawny email',
		    );	
		    $this->form_validation->set_message($config);

			if ($this->form_validation->run('login') == TRUE)
				{
					//Jeśli validacja zadziałała
					$data = array(
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'),
					);
					$data['password'] = pass_salt($data['password']);
					$user = $this->panel_m->get('users',$data, TRUE);
					//sprawdzenie czy użytkownik istnieje w bazie
					if(!empty($user))
					{
						$data = array(
									'id' => $user->id,
									'name' => $user->name,
									'email' => $user->email,
									'dostep' => $user->dostep,
									'loged_in' => TRUE,
						);

						$this->session->set_userdata($data);
						redirect('admin/panel');
					}
					else
					{
						echo 'Brak zgodności email - hasło';
					}

					
				}
		}

		$this->load->view('admin/panel/login');
	}
}

/* End of file panel.php */
/* Location: ./application/controllers/panel.php */