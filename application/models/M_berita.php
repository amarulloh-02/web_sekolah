<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_berita extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('berita');
      $this->db->join('user', 'user.id_user = berita.id_user', 'left');
      $this->db->order_by('judul_berita', 'asc');
      return $this->db->get()->result();
   }
   public function input($data)
   {
      $this->db->insert('berita', $data);
   }

   public function detail($id_berita)
   {
      $this->db->select('*');
      $this->db->from('berita');
      $this->db->where('id_berita', $id_berita);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_berita', $data['id_berita']);
      $this->db->update('berita', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_berita', $data['id_berita']);
      $this->db->delete('berita', $data);
   }
}

/* End of file M_rumahsakit.php */
