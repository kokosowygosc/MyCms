<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_m extends MY_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function count_views($alias)
	{
		$this->db->where('alias', $alias);
		$this->db->set('views', 'views+1', FALSE);
		$this->db->update('blog');
	}

	public function count($table)
	{
		return $this->db->count_all_results($table);
	}

	public function limit($count, $offset)
	{
		return $this->db->limit($count, $offset);
	}

}

/* End of file site_m.php */
/* Location: ./application/models/site_m.php */