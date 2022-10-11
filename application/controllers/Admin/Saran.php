<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Saran extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_saran');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Saran',
         'saran' => $this->m_saran->list()
      ];
      $this->load->view('admin/saran/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_saran', 'Nama Saran', 'required', [
         'required' => '%s harus diisi',
      ]);
      $this->form_validation->set_rules('email_saran', 'Email', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('telp_saran', 'Telepon', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('pesan_saran', 'Pesan', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Tambah Saran',
         ];
         $this->load->view('admin/saran/tambah', $data);
      } else {
         date_default_timezone_set('Asia/Jakarta');
         $now = date('Y-m-d H:i:s');
         $data = [
            'nama_saran' => $this->input->post('nama_saran'),
            'email_saran' => $this->input->post('email_saran'),
            'telp_saran' => $this->input->post('telp_saran'),
            'pesan_saran' => $this->input->post('pesan_saran'),
            'tgl_saran' => $now
         ];
         $this->m_saran->input($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/saran');
      }
   }

   public function edit($id_saran)
   {
      $this->form_validation->set_rules('nama_saran', 'Nama Saran', 'required', [
         'required' => '%s harus diisi',
      ]);
      $this->form_validation->set_rules('email_saran', 'Email', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('telp_saran', 'Telepon', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('pesan_saran', 'Pesan', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Edit Data Saran',
            'saran' => $this->m_saran->detail($id_saran)
         ];
         $this->load->view('admin/saran/edit', $data);
      } else {
         date_default_timezone_set('Asia/Jakarta');
         $now = date('Y-m-d H:i:s');
         $data = [
            'id_saran' => $id_saran,
            'nama_saran' => $this->input->post('nama_saran'),
            'email_saran' => $this->input->post('email_saran'),
            'telp_saran' => $this->input->post('telp_saran'),
            'pesan_saran' => $this->input->post('pesan_saran')
            // 'tgl_saran' => $now,
         ];
         $this->m_saran->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/saran');
      }
   }

   public function delete($id_saran)
   {
      $data = [
         'id_saran' => $id_saran
      ];
      $this->m_saran->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/saran');
   }
}

/* End of file saran.php */
