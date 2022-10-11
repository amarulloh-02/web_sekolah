<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
   protected $ci;

   public function __construct()
   {
      $this->ci = &get_instance();
      $this->ci->load->model('m_user');
   }

   public function login($username, $password)
   {
      $cek = $this->ci->m_user->login($username, $password);
      if ($cek) {
         $id_user = $cek->id_user;
         $username = $cek->username;
         $nama_user = $cek->nama_user;
         $akses = $cek->akses;
         $this->ci->session->set_userdata('id_user', $id_user);
         $this->ci->session->set_userdata('username', $username);
         $this->ci->session->set_userdata('nama_user', $nama_user);
         $this->ci->session->set_userdata('akses', $akses);
         redirect('admin/dashboard');
      } else {
         $this->ci->session->set_flashdata('gagal', 'Username atau Password anda salah');
         redirect('login');
      }
   }

   public function cek_login()
   {
      if ($this->ci->session->userdata('username') == "") {
         $this->ci->session->set_flashdata('gagal', 'Anda belum login. Silahkan login terlebih dahulu');
         redirect('login');
      }
   }

   public function logout()
   {
      $this->ci->session->unset_userdata('username');
      $this->ci->session->unset_userdata('password');
      $this->ci->session->set_flashdata('sukses', 'Logout berhasil');
      redirect('login');
   }
}
 
 /* End of file User_login.php */
