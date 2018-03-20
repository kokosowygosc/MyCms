<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel_m extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		$this->gallery_path = BASEPATH . "../images/";
		$this->shop_path = BASEPATH . "../images/shop/";
		$this->gallery_path_url = base_url() . '/images/';
	}
	//operacje na galerii
	public function upload()
	{
		$config = array(
			'upload_path' => $this->gallery_path,
			'allowed_types' => 'gif|jpg|jpeg|png',
			'max_size' => '4096',
			);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo $this->upload->display_errors();
		}
		else
		{
			$data = $this->upload->data();

			//stworzenie miniaturki
			$config = array(
				'source_image' => $data['full_path'],
				'new_image'	=> $this->gallery_path . "thumbs",
				'maintain_ratio' => TRUE,
				'width' => 1200,
				'height'	=> 640,
			);

			$this->image_lib->initialize($config);
			$this->image_lib->resize();
		}
	}

	public function shop_upload($data)
	{
		$names=$this->panel_m->clearDiacritics($data->name);
		$config = array(
			'upload_path' => $this->shop_path.$names,
			'allowed_types' => 'gif|jpg|jpeg|png',
			'max_size' => '8192',
			);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			echo $this->upload->display_errors();
		}
	}

	public function get_image()
	{
		$files = scandir($this->gallery_path);
		$diff1 = array('.', '..', 'icons' );
		$diff2 = array('.', '..', 'shop' );
		$files = array_diff($files, $diff1);
		$files = array_diff($files, $diff2);
		return $files;
	}

	public function DeleteDir($dir)
	{
	  $fd = opendir($dir);
	  if(!$fd) return false;
	  while (($file = readdir($fd))!== false)
	  {
	      if($file =="." || $file== "..") continue;
	      if(is_dir($dir."/".$file))
	      {
	            DeleteDir($dir."/".$file);
	      }
	      else
	      {
	          unlink("$dir/$file");
	      }
	  }
	  closedir($fd);
	  rmdir($dir);
	}

	public function get_image_shop()
	{
		$files = scandir($this->shop_path);
		$diff1 = array('.', '..');
		$files = array_diff($files, $diff1);
		$i=0;
		foreach ($files as $file) {
			$images = 	scandir($this->shop_path.$file);
			$diff1 = array('.', '..');
			$images = array_diff($images, $diff1);
			$img[$file]= $images;
			$i++;
		}
	return @$img;
	}

	public function clearDiacritics($sText)
	{
		$aReplacePL = array(
			'ą' => 'a', 'ę' => 'e', 'ś' => 's', 'Ś' => 'S', 'ć' => 'c',
			'ó' => 'o', 'ń' => 'n', 'ż' => 'z', 'ź' => 'z', 'ł' => 'l'
			);
 
		return str_replace(array_keys($aReplacePL), array_values($aReplacePL), $sText);
	}
}

/* End of file users_m.php */
/* Location: ./application/models/users_m.php */