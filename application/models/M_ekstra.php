<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ekstra extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('ekstra');
      $this->db->order_by('nama_ekstra', 'asc');
      return $this->db->get()->result();
   }
   public function input($data)
   {
      $this->db->insert('ekstra', $data);
   }

   public function detail($id_ekstra)
   {
      $this->db->select('*');
      $this->db->from('ekstra');
      $this->db->where('id_ekstra', $id_ekstra);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_ekstra', $data['id_ekstra']);
      $this->db->update('ekstra', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_ekstra', $data['id_ekstra']);
      $this->db->delete('ekstra', $data);
   }
}

/* End of file M_rumahsakit.php */
