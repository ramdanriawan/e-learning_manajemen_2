<?php
// die(md5('ortu'));
 if (!defined('BASEPATH')) {
     exit('No direct script access allowed');
 }

//  die(MD5('ortu'));
$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'session', 'calendar');
$autoload['helper'] = array('url', 'file', 'form', 'form_bootstrap', 'text', 'date', 'captcha', 'string', 'html', 'my_helper');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('Helper');

/* End of file autoload.php */
/* Location: ./application/config/autoload.php */
