<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('site/site_m');
	}

	public function displayarticle($alias)
	{
		$this->site_m->count_views($alias);

		$where = array('alias' => $alias);
		$data['article'] = $this->site_m->get('blog', $where, TRUE);

		$where = array('article_id' => $data['article']->id);
		$data['comments'] = $this->site_m->get('comments', $where);

		if(!empty($_POST))
		{
			$this->_add_comment($alias);
		}

		$this->load->view('site/article', $data);
	}

	function _add_comment($alias)
	{
		$config = array(
           'required'=>'Pole %s nie zostało wypełnione',
           'valid_email'=>'Email nie został poprawnie wypełniony',
        );

		$this->form_validation->set_message($config);

			if ($this->form_validation->run('comment_create') == TRUE)
				{
				//Jeśli validacja zadziałała
					$data = array(
						'article_id' => $this->input->post('article_id'),
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'date' => $this->input->post('date'),
						'content' => $this->input->post('content'),
					);
				$this->site_m->create('comments',$data);
				redirect('article/' . $alias);
				}
	}

}

/* End of file article.php */
/* Location: ./application/controllers/article.php */