<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->order_by('nama_user', 'asc');
      return $this->db->get()->result();
   }

   public function login($username, $password)
   {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where([
         'username' => $username,
         'password' => $password
      ]);
      return $this->db->get()->row();
   }

   public function input($data)
   {
      $this->db->insert('user', $data);
   }

   public function detail($id_user)
   {
      $this->db->select('*');
      $this->db->from('user');
      $this->db->where('id_user', $id_user);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_user', $data['id_user']);
      $this->db->update('user', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_user', $data['id_user']);
      $this->db->delete('user', $data);
   }
}

/* End of file M_rumahsakit.php */
