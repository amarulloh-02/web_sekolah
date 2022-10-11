<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
   public function index()
   {
      $this->form_validation->set_rules('username', 'Username', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('password', 'Password', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $username = $this->input->post('username');
         $password = md5($this->input->post('password'));
         $this->user_login->login($username, $password);
      }
      $data = [
         'title' => 'Login',
      ];
      $this->load->view('login', $data);
   }

   public function logout()
   {
      $this->user_login->logout();
   }
}

/* End of file Login.php */
