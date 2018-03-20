<?php 
function pass_salt($string)
{
	return hash('sha512',$string . config_item('encryption_key'));
}

function alias($string)
{
	$string = convert_accented_characters($string);
	$string = url_title($string, '-', TRUE);
	return $string;
}

function exept($string, $q)
{
	$pattern = '#<[^>]+>#';
	$string = preg_replace($pattern, ' ', $string);
	$string = word_limiter($string, $q);
	return $string;
}

function config($where)
{
	$CI =& get_instance();
	$CI->load->model('site/site_m');
	$where = array('option' => $where);
	$query = $CI->site_m->get('config', $where, TRUE);
	$query = $query->value;
	return $query;
}

