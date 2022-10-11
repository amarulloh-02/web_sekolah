<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelajaran extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('pelajaran');
      $this->db->order_by('nama_pelajaran', 'asc');
      return $this->db->get()->result();
   }
   public function input($data)
   {
      $this->db->insert('pelajaran', $data);
   }

   public function detail($id_pelajaran)
   {
      $this->db->select('*');
      $this->db->from('pelajaran');
      $this->db->where('id_pelajaran', $id_pelajaran);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_pelajaran', $data['id_pelajaran']);
      $this->db->update('pelajaran', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_pelajaran', $data['id_pelajaran']);
      $this->db->delete('pelajaran', $data);
   }
}

/* End of file M_rumahsakit.php */
