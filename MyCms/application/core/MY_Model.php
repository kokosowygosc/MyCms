<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function create($table, $data)
	{
		$this->db->insert($table,$data);	
	}

	public function get($table, $where = FALSE, $single = FALSE, $order = FALSE, $sort = FALSE, $limit = FALSE)
	{
		if($where == TRUE)
		{
			$this->db->where($where); 
		}

		if($order == TRUE)
		{
			$this->db->order_by($order, $sort); 
		}

		if($limit == TRUE)
		{
			$this->db->limit($limit,0); 
		}

		$query = $this->db->get($table);

		if($single == TRUE)
		{
			return $query->row();
		}

		return $query->result();
	}

	public function update($table, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function update_batch($table, $data, $col)
	{
		$this->db->update_batch($table, $data, $col);
	}

	public function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function unique($id,$where)
	{
		$this->db->where($where);

		!$id || $this->db->where('id !=',$id);
	}
}

/* End of file MY_model */
/* Location: ./application/controllers/MY_Model */