<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('site/site_m');
		$this->load->model('admin/panel_m');
	}

	public function index()
	{	
		$config = array(
	      'base_url' => base_url() . 'shop/index',
	      'total_rows' => $this->site_m->count('shop'),
	      'per_page' => 3,
	      'uri_segment' => 3,

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

	      'cur_tag_open' => '<li class="active"><a href="">',
	      'cur_tag_close' => '</a></li>',

	      'num_tag_open' => '<li>',
	      'num_tag_close' => '</li>',
	    );
	    $this->pagination->initialize($config); 

	    $data['pagination'] = $this->pagination->create_links();
	    $this->site_m->limit($config['per_page'],$this->uri->segment(3));

		$data['item'] = $this->site_m->get('shop');
		$data['images'] = $this->panel_m->get_image_shop();
		$this->load->view('site/shop', $data);
	}

	public function add()
	{
		$id=$this->input->post('id');
		$where = array('id' => $id);
		$data['item'] = $this->site_m->get('shop', $where, TRUE);
		$qty=$this->input->post('qty');
		$color=$this->input->post('color');
	    $size=$this->input->post('size');
	    $options = array('color'=> $color,'size'=>  $size,);

	    $size=sizeof($this->cart->contents());
	    if($size>5)
	    {
	    	redirect('shop');
	    }

		if ($qty<=$data['item']->qtys)
		{
			$cart = array(
			               'qty' => $qty,
			               'name' => $data['item']->name,
			               'price' => $data['item']->price,
			               'id' => $data['item']->id,
			               'options' => $options,
			            );
			$this->cart->insert($cart);
		}
		redirect('shop');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */