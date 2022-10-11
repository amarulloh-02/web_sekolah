<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_galeri extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('galeri');
      $this->db->order_by('nama_galeri', 'asc');
      return $this->db->get()->result();
   }
   public function input($data)
   {
      $this->db->insert('galeri', $data);
   }

   public function detail($id_galeri)
   {
      $this->db->select('*');
      $this->db->from('galeri');
      $this->db->where('id_galeri', $id_galeri);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_galeri', $data['id_galeri']);
      $this->db->update('galeri', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_galeri', $data['id_galeri']);
      $this->db->delete('galeri', $data);
   }
}

/* End of file M_rumahsakit.php */
