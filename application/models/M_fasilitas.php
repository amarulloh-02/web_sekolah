<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_fasilitas extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('fasilitas');
      $this->db->order_by('nama_fasilitas', 'asc');
      return $this->db->get()->result();
   }
   public function input($data)
   {
      $this->db->insert('fasilitas', $data);
   }

   public function detail($id_fasilitas)
   {
      $this->db->select('*');
      $this->db->from('fasilitas');
      $this->db->where('id_fasilitas', $id_fasilitas);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_fasilitas', $data['id_fasilitas']);
      $this->db->update('fasilitas', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_fasilitas', $data['id_fasilitas']);
      $this->db->delete('fasilitas', $data);
   }
}

/* End of file M_rumahsakit.php */
