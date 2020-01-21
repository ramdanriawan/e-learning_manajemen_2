<?php
 if (!defined('BASEPATH')) {
     exit('No direct script access allowed');
 }

$route['default_controller'] = 'adm';
$route['404_override'] = '';
$route['adm/materi/detail/(:num)'] = "adm/m_materi_detail/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
