<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jabatan extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('jabatan');
      $this->db->order_by('nama_jabatan', 'asc');
      return $this->db->get()->result();
   }
   public function input($data)
   {
      $this->db->insert('jabatan', $data);
   }

   public function detail($id_jabatan)
   {
      $this->db->select('*');
      $this->db->from('jabatan');
      $this->db->where('id_jabatan', $id_jabatan);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_jabatan', $data['id_jabatan']);
      $this->db->update('jabatan', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_jabatan', $data['id_jabatan']);
      $this->db->delete('jabatan', $data);
   }
}

/* End of file M_rumahsakit.php */
