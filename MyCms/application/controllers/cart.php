<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('site/site_m');
		$this->load->model('admin/panel_m');
	}

	public function index()
	{	
		$data['item'] = $this->site_m->get('shop');

		$email=$this->session->all_userdata();

		@$email=$email['email'];
		$where = array('email' => $email);
		$data['user'] = $this->site_m->get('users', $where, TRUE);

		$this->load->view('site/cart', $data);
	}

	public function update()
	{
		$i = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$data['item'] = $this->site_m->get('shop', $where, TRUE);
		$tab = $this->input->post($i);
		if($data['item']->qtys>=$tab['qty'])
		{
			$data = array(
	               'rowid' => $tab['rowid'],
	               'qty'   => $tab['qty'],
	            );
			$this->cart->update($data);
		}
		redirect('cart');
	}

	public function done()
	{
		$items=$this->cart->contents();
		foreach ($items as $item) {
			$name=$item['name'];
			$qty=$item['qty'];
			$where = array('name' => $name);
			$data['it'] = $this->site_m->get('shop', $where, TRUE);
			$qtys=$data['it']->qtys;
			$ilosc=$qtys-$qty;
			var_dump($ilosc);
			$data = array(
				array(
					'name' => $name,
					'qtys' => $ilosc,
				),
			);
			$this->panel_m->update_batch('shop', $data, 'name');
		}
		$this->cart->destroy();
		redirect('cart');
	}

	public function delete()
	{
		$rowid = $this->uri->segment(3);
		$data = array(
			'rowid' => $rowid,
			'qty' => 0,
			);
		$this->cart->update($data);
		redirect('cart');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */