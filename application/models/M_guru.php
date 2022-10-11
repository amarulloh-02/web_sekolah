<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{
   public function list()
   {
      $this->db->select('*');
      $this->db->from('guru');
      $this->db->join('pelajaran', 'pelajaran.id_pelajaran = guru.id_pelajaran', 'left');
      $this->db->join('jabatan', 'jabatan.id_jabatan = guru.id_jabatan', 'left');
      $this->db->order_by('id_guru', 'desc');
      return $this->db->get()->result();
   }
   public function input($data)
   {
      $this->db->insert('guru', $data);
   }

   public function detail($id_guru)
   {
      $this->db->select('*');
      $this->db->from('guru');
      $this->db->where('id_guru', $id_guru);
      return $this->db->get()->row();
   }

   public function edit($data)
   {
      $this->db->where('id_guru', $data['id_guru']);
      $this->db->update('guru', $data);
   }

   public function delete($data)
   {
      $this->db->where('id_guru', $data['id_guru']);
      $this->db->delete('guru', $data);
   }
}

/* End of file M_rumahsakit.php */
