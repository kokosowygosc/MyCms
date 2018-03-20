<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'users_create' => array(
				   	array(
	                     'field'   => 'name', 
	                     'label'   => 'Imię', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'email', 
	                     'label'   => 'email', 
	                     'rules'   => 'required|valid_email|trim|is_unique[users.email]'
	                ),
	               	array(
	                     'field'   => 'password', 
	                     'label'   => 'hasło', 
	                     'rules'   => 'required|matches[passconf]|trim'
	                ),   
	               	array(
	                     'field'   => 'passconf', 
	                     'label'   => 'Potwierdzenie hasła', 
	                     'rules'   => 'required|trim'
                 	),
	),
	'users_edit' => array(
	               	array(
	                     'field'   => 'name', 
	                     'label'   => 'imię', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'email', 
	                     'label'   => 'email', 
	                     'rules'   => 'required|valid_email|callback__unique_email'
	                ),
	               	array(
	                     'field'   => 'password', 
	                     'label'   => 'hasło', 
	                     'rules'   => 'matches[passconf]|trim'
	                ),   
	               	array(
	                     'field'   => 'passconf', 
	                     'label'   => 'potwierdzenie hasła', 
	                     'rules'   => 'trim'
	                ), 
	),
	'login' => array(
	               	array(
	                     'field'   => 'email', 
	                     'label'   => 'email', 
	                     'rules'   => 'required|valid_email'
	                ),
	               	array(
	                     'field'   => 'password', 
	                     'label'   => 'hasło', 
	                     'rules'   => 'trim|required'
	                ),   
	),
	'pages_create' => array(
				   	array(
	                     'field'   => 'title', 
	                     'label'   => 'tytuł', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'alias', 
	                     'label'   => 'alias', 
	                     'rules'   => 'required|trim|is_unique[pages.alias]'
	                ),
	               	array(
	                     'field'   => 'content', 
	                     'label'   => 'treść', 
	                     'rules'   => 'required|trim'
	                ),   
	),
	'pages_edit' => array(
	               	array(
	                     'field'   => 'title', 
	                     'label'   => 'tytuł', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'alias', 
	                     'label'   => 'alias', 
	                     'rules'   => 'required|callback__unique_alias'
	                ),
	               	array(
	                     'field'   => 'content', 
	                     'label'   => 'treść', 
	                     'rules'   => 'required|trim'
	                ),
	),
	'blog_create' => array(
				   	array(
	                     'field'   => 'title', 
	                     'label'   => 'tytuł', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'alias', 
	                     'label'   => 'alias', 
	                     'rules'   => 'required|trim|is_unique[blog.alias]'
	                ),
	                array(
	                     'field'   => 'date', 
	                     'label'   => 'data', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'content', 
	                     'label'   => 'treść', 
	                     'rules'   => 'required|trim'
	                ), 
	               	array(
	                     'field'   => 'front_img', 
	                     'label'   => 'treść', 
	                     'rules'   => 'trim'
	                ), 
	),
	'blog_edit' => array(
	               	array(
	                     'field'   => 'title', 
	                     'label'   => 'tytuł', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'alias', 
	                     'label'   => 'alias', 
	                     'rules'   => 'required|callback__unique_alias'
	                ),
	                array(
	                     'field'   => 'date', 
	                     'label'   => 'data', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'content', 
	                     'label'   => 'treść', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'front_img', 
	                     'label'   => 'treść', 
	                     'rules'   => 'trim'
	                ), 
	),
	'comment_create' => array(
				   	array(
	                     'field'   => 'name', 
	                     'label'   => 'imię', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'email', 
	                     'label'   => 'email', 
	                     'rules'   => 'required|trim|valid_email'
	                ),
	               	array(
	                     'field'   => 'content', 
	                     'label'   => 'treść', 
	                     'rules'   => 'required|trim'
	                ),   
	),
	'comment_edit' => array(
	               	array(
	                     'field'   => 'content', 
	                     'label'   => 'treść', 
	                     'rules'   => 'required|trim'
	                ),
	),
	'config_up' => array(
	               	array(
	                     'field'   => 'site_name', 
	                     'label'   => 'nazwa strony', 
	                     'rules'   => 'required|trim'
	                ),
	                array(
	                     'field'   => 'meta_desc', 
	                     'label'   => 'opis strony', 
	                     'rules'   => 'required|trim'
	                ),
	                array(
	                     'field'   => 'front_theme', 
	                     'label'   => 'szablon strony', 
	                     'rules'   => 'required|trim'
	                ),
	                array(
	                     'field'   => 'back_theme', 
	                     'label'   => 'szablon admina', 
	                     'rules'   => 'required|trim'
	                ),
	                array(
	                     'field'   => 'num_posts', 
	                     'label'   => 'ilość artykułów na stronie', 
	                     'rules'   => 'required|trim|integer'
	                ),
	                array(
	                     'field'   => 'num_gal', 
	                     'label'   => 'ilość kolumn w galerii', 
	                     'rules'   => 'required|trim|integer'
	                ),
	                array(
	                     'field'   => 'text_foot', 
	                     'label'   => 'tekst w stopce', 
	                     'rules'   => 'trim'
	                ),
	                array(
	                     'field'   => 'fb_link', 
	                     'label'   => 'link do facebooka', 
	                     'rules'   => 'trim'
	                ),
	                array(
	                     'field'   => 'tweet_link', 
	                     'label'   => 'link do tweetera', 
	                     'rules'   => 'trim'
	                ),
	                array(
	                     'field'   => 'yt_link', 
	                     'label'   => 'link do konta youtube', 
	                     'rules'   => 'trim'
	                ),
	                array(
	                     'field'   => 'gallery', 
	                     'label'   => 'włącznik galerii', 
	                     'rules'   => 'trim'
	                ),
	),
	'create_user' => array(
				   	array(
	                     'field'   => 'name', 
	                     'label'   => 'imię', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'email', 
	                     'label'   => 'email', 
	                     'rules'   => 'required|valid_email|trim|is_unique[users.email]'
	                ),
	               	array(
	                     'field'   => 'password', 
	                     'label'   => 'hasło', 
	                     'rules'   => 'required|matches[passconf]|trim'
	                ),   
	               	array(
	                     'field'   => 'passconf', 
	                     'label'   => 'potwierdzenie hasła', 
	                     'rules'   => 'required|trim'
                 	),
	               	array(
	                     'field'   => 'conf', 
	                     'label'   => 'potwierdzenie regulaminu', 
	                     'rules'   => 'trim'
                 	),
	),
	'item_create' => array(
				   	array(
	                     'field'   => 'name', 
	                     'label'   => 'imię', 
	                     'rules'   => 'required|trim|is_unique[shop.name]'
	                ),
	               	array(
	                     'field'   => 'price', 
	                     'label'   => 'cena', 
	                     'rules'   => 'required|trim'
	                ),   
	               	array(
	                     'field'   => 'qtys', 
	                     'label'   => 'dostępna ilość', 
	                     'rules'   => 'required|trim'
                 	),
	),
	'item_edit' => array(
				   	array(
	                     'field'   => 'name', 
	                     'label'   => 'imię', 
	                     'rules'   => 'required|trim'
	                ),
	               	array(
	                     'field'   => 'price', 
	                     'label'   => 'cena', 
	                     'rules'   => 'required|trim'
	                ),   
	               	array(
	                     'field'   => 'qtys', 
	                     'label'   => 'dostępna ilość', 
	                     'rules'   => 'required|trim'
                 	),
	),
	'user_edit' => array(
	               	array(
	                     'field'   => 'password', 
	                     'label'   => 'hasło', 
	                     'rules'   => 'matches[passconf]|trim'
	                ),   
	               	array(
	                     'field'   => 'passconf', 
	                     'label'   => 'potwierdzenie hasła', 
	                     'rules'   => 'trim'
	                ), 
	),
);