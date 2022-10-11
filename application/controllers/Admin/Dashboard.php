<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   public function index()
   {
      $this->user_login->cek_login();
      $data['kegiatan'] = $this->db->get('kegiatan')->num_rows();
      $data['guru'] = $this->db->get('guru')->num_rows();
      $data['fasilitas'] = $this->db->get('fasilitas')->num_rows();
      $data['berita'] = $this->db->get('berita')->num_rows();
      $this->load->view('admin/dashboard', $data);
   }
}
