<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/panel_m');
	}

	public function index()
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
		$checked = (isset($_POST['conf']))?true:false;
			if($checked == true) 
			{
				if ($this->form_validation->run('create_user') == TRUE)
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
						$data1['success'] = "Konto zostało założone, możesz się zalogować";
					}
			}
			else
			{
				$data1['fail'] = "Nie potwierdziłeś regulaminu";
			}
		}
		//widok formularza tworzenia użytkoników
		if(!empty($data1)){
		$this->load->view('site/reg', $data1);}
		else{
		$this->load->view('site/reg');}
	}
}

/* End of file reg.php */
/* Location: ./application/controllers/reg.php */