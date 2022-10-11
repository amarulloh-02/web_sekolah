<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_saran extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('saran');
      $this->db->order_by('tgl_saran', 'asc');
      return $this->db->get()->result();
   }
   public function input($data)
   {
      $this->db->insert('saran', $data);
   }

   public function detail($id_saran)
   {
      $this->db->select('*');
      $this->db->from('saran');
      $this->db->where('id_saran', $id_saran);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_saran', $data['id_saran']);
      $this->db->update('saran', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_saran', $data['id_saran']);
      $this->db->delete('saran', $data);
   }
}

/* End of file M_rumahsakit.php */
