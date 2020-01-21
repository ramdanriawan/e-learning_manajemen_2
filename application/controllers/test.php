<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

date_default_timezone_set('Asia/Jakarta');

class test extends CI_Controller
{
    public function index()
    {
        $data['siswas'] = $this->db->get('m_siswa')->result();
        $data['gurus'] = $this->db->get('m_guru')->result();
        $data['mapels'] = $this->db->get('m_mapel')->result();
        $data['soals'] = $this->db->get('m_soal')->result();
        $data['p'] = "v_main";

        $this->Helper->view('test', $data);
    }
}
