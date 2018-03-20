<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('site/site_m');
		$this->load->model('admin/panel_m');
	}

	public function index()
	{
		$config = array(
			'base_url' => base_url() . 'blog/index',
			'total_rows' => $this->site_m->count('blog'),
			'per_page' => config('num_posts'),

			'full_tag_open' => '<ul class="pagination">',
			'full_tag_close' => '</ul>',

			'first_link' => '&laquo;',
			'first_tag_open' => '<li>',
			'first_tag_close' => '</li>',

			'last_link' => '&raquo;',
			'last_tag_open' => '<li>',
			'last_tag_close' => '</li>',

			'next_link' => '&gt;',
			'next_tag_open' => '<li>',
			'next_tag_close' => '</li>',

			'prev_link' => '&lt;',
			'prev_tag_open' => '<li>',
			'prev_tag_close' => '</li>',

			'cur_tag_open' => '<li class="active"><a href="#">',
			'cur_tag_close' => '</a></li>',

			'num_tag_open' => '<li>',
			'num_tag_close' => '</li>',
		);
		$this->pagination->initialize($config); 

		$data['pagination'] = $this->pagination->create_links();

		$this->site_m->limit($config['per_page'],$this->uri->segment(3));

		$data['blog'] = $this->site_m->get('blog', FALSE, FALSE, 'date', 'desc');
		
		$data['loged_in'] = $this->loged_in();
		
		$this->load->view('site/blog', $data);
	}

}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */