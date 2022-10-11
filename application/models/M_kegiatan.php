<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kegiatan extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('kegiatan');
      $this->db->join('user', 'user.id_user = kegiatan.id_user', 'left');
      $this->db->order_by('nama_kegiatan', 'asc');
      return $this->db->get()->result();
   }
   public function input($data)
   {
      $this->db->insert('kegiatan', $data);
   }

   public function detail($id_kegiatan)
   {
      $this->db->select('*');
      $this->db->from('kegiatan');
      $this->db->where('id_kegiatan', $id_kegiatan);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_kegiatan', $data['id_kegiatan']);
      $this->db->update('kegiatan', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_kegiatan', $data['id_kegiatan']);
      $this->db->delete('kegiatan', $data);
   }
}

/* End of file M_rumahsakit.php */
