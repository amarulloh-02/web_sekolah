<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_jabatan');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Jabatan',
         'jabatan' => $this->m_jabatan->list()
      ];
      $this->load->view('admin/jabatan/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required', [
         'required' => '%s harus diisi',
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Tambah Jabatan',
         ];
         $this->load->view('admin/jabatan/tambah', $data);
      } else {
         $data = [
            'nama_jabatan' => $this->input->post('nama_jabatan')
         ];
         $this->m_jabatan->input($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/jabatan');
      }
   }

   public function edit($id_jabatan)
   {
      $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required', [
         'required' => '%s harus diisi',
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Edit Data Jabatan',
            'jabatan' => $this->m_jabatan->detail($id_jabatan)
         ];
         $this->load->view('admin/jabatan/edit', $data);
      } else {
         $data = [
            'id_jabatan' => $id_jabatan,
            'nama_jabatan' => $this->input->post('nama_jabatan')
         ];
         $this->m_jabatan->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/jabatan');
      }
   }

   public function delete($id_jabatan)
   {
      $data = [
         'id_jabatan' => $id_jabatan
      ];
      $this->m_jabatan->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/jabatan');
   }
}

/* End of file jabatan.php */
