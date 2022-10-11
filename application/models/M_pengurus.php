<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengurus extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('pengurus');
      $this->db->join('jabatan', 'jabatan.id_jabatan = pengurus.id_jabatan', 'left');
      $this->db->order_by('nama_pengurus', 'asc');
      return $this->db->get()->result();
   }
   public function input($data)
   {
      $this->db->insert('pengurus', $data);
   }

   public function detail($id_pengurus)
   {
      $this->db->select('*');
      $this->db->from('pengurus');
      $this->db->where('id_pengurus', $id_pengurus);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_pengurus', $data['id_pengurus']);
      $this->db->update('pengurus', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_pengurus', $data['id_pengurus']);
      $this->db->delete('pengurus', $data);
   }
}

/* End of file M_rumahsakit.php */
