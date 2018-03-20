<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/panel_m');
    $this->load->model('site/site_m');
    $this->loged_in() == TRUE || redirect('admin/panel/login');
  }

  public function index()
  {
   $config = array(
      'base_url' => base_url() . 'admin/shop/index',
      'total_rows' => $this->site_m->count('shop'),
      'per_page' => 2,
      'uri_segment' => 4,

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

    $this->site_m->limit($config['per_page'],$this->uri->segment(4));

    $data['item'] = $this->site_m->get('shop', FALSE, FALSE, 'id', 'asc');

    if($_POST)
    {
      $id = $this->uri->segment(4);
      $where = array('id'=>$id);
      $data = $this->site_m->get('shop', $where, TRUE);
      $this->panel_m->shop_upload($data);
      redirect('admin/shop');
    }
    $data['images'] = $this->panel_m->get_image_shop();
    $this->load->view('admin/shop/shop', $data);
  }

  public function add_item()
  {
  if(!empty($_POST)) //jeśli formularz zostanie wysłany
      {
        $config = array(
               'required'=>'Pole %s nie zostało wypełnione',
               'is_unique'=>'Przedmiot z jaką nazwą już istnieje'
            );

        $this->form_validation->set_message($config);

        if ($this->form_validation->run('item_create') == TRUE)
          { 
            $color=$this->input->post('colors');
            $size=$this->input->post('size');
            $options = array('color'=> $color,'size'=>  $size,);
            $tablica = json_encode($options);

            $data = array(
              'name'    => $this->input->post('name'),
              'price'   =>  $this->input->post('price'),
              'qtys'    => $this->input->post('qtys'),
              'options' => $tablica,
            );
            $way=$this->panel_m->clearDiacritics($this->input->post('name'));
            $way= BASEPATH. "../images/shop/".$way;
            $this->db->insert('shop', $data);
            mkdir ($way, 0777);
            
            redirect('admin/shop/shop');
          }
      }
    //widok formularza tworzenia użytkoników
    $this->load->view('admin/shop/add_item');
  } 

  public function edit()
  {
    $id = $this->uri->segment(4);

    $where = array('id'=>$id);
    $data['shop'] = $this->panel_m->get('shop', $where, TRUE);
    $id = $data['shop']->id;

      if(!empty($_POST)) //jeśli formularz zostanie wysłany
        {
          $config = array(
             'required'=>'Pole %s nie zostało wypełnione',
             'is_unique'=>'Przedmiot z jaką nazwą już istnieje',
          );

          $this->form_validation->set_message($config);
          if ($this->form_validation->run('item_edit') == TRUE)
            { 
              $color=$this->input->post('colors');
              $size=$this->input->post('size');
              $options = array('color'=> $color,'size'=>  $size,);
              $tablica = json_encode($options);

              $data = array(
                'name'    => $this->input->post('name'),
                'price'   =>  $this->input->post('price'),
                'qtys'    => $this->input->post('qtys'),
                'options' => $tablica,
              );
                $old=$this->panel_m->clearDiacritics($this->input->post('name_old'));
                $old = BASEPATH. "../images/shop/" . $old;
                $new=$this->panel_m->clearDiacritics($this->input->post('name'));
                $new = BASEPATH. "../images/shop/" . $new;
                
                rename($old, $new);

                $where = array('id' => $id);
                $this->panel_m->update('shop',$where, $data);
                  
                redirect('admin/shop/shop');
            }
      } 
      $this->load->view('admin/shop/edit', $data);
      //widok edycji przedmiotu
  }

  public function delete()
  {
    $id = $this->uri->segment(4);
    $where = array('id' => $id);
    $data = $this->panel_m->get('shop', $where, TRUE);
    $names=$this->panel_m->clearDiacritics($data->name);
    $dir= BASEPATH. "../images/shop/".$names;
    $this->panel_m->DeleteDir($dir);
    $this->panel_m->delete('shop', $where);
    redirect('admin/shop/shop');
  }

  public function delete_img()
  {
    
    if($_POST)
    {
      $image=$this->input->post('image_name');
      $place=$this->input->post('place_name');
      $names=$this->panel_m->clearDiacritics($place);
      unlink( BASEPATH . "../images/shop/". $names. "/" . $image);
      redirect('admin/shop/shop');
    }
  }
} 


/* End of file shop.php */
/* Location: ./application/controllers/shop.php */