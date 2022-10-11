<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelajaran extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_pelajaran');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Pelajaran',
         'pelajaran' => $this->m_pelajaran->list()
      ];
      $this->load->view('admin/pelajaran/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_pelajaran', 'Nama Pelajaran', 'required', [
         'required' => '%s harus diisi',
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Tambah Pelajaran',
         ];
         $this->load->view('admin/pelajaran/tambah', $data);
      } else {
         $data = [
            'nama_pelajaran' => $this->input->post('nama_pelajaran')
         ];
         $this->m_pelajaran->input($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/pelajaran');
      }
   }

   public function edit($id_pelajaran)
   {
      $this->form_validation->set_rules('nama_pelajaran', 'Nama Pelajaran', 'required', [
         'required' => '%s harus diisi',
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Edit Data Pelajaran',
            'pelajaran' => $this->m_pelajaran->detail($id_pelajaran)
         ];
         $this->load->view('admin/pelajaran/edit', $data);
      } else {
         $data = [
            'id_pelajaran' => $id_pelajaran,
            'nama_pelajaran' => $this->input->post('nama_pelajaran')
         ];
         $this->m_pelajaran->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/pelajaran');
      }
   }

   public function delete($id_pelajaran)
   {
      $data = [
         'id_pelajaran' => $id_pelajaran
      ];
      $this->m_pelajaran->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/pelajaran');
   }
}

/* End of file pelajaran.php */
