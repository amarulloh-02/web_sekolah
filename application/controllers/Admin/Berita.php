<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_berita');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Berita',
         'berita' => $this->m_berita->list()
      ];
      $this->load->view('admin/berita/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required', [
         'required' => '%s harus diisi',
      ]);
      $this->form_validation->set_rules('des_berita', 'Deskripsi Berita', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Tambah Berita',
         ];
         $this->load->view('admin/berita/tambah', $data);
      } else {
         date_default_timezone_set('Asia/Jakarta');
         $now = date('Y-m-d H:i:s');
         $data = [
            'judul_berita' => $this->input->post('judul_berita'),
            'tgl_berita' => $now,
            'des_berita' => $this->input->post('des_berita'),
            'id_user' => $this->session->userdata('id_user')
         ];
         $this->m_berita->input($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/berita');
      }
   }

   public function edit($id_berita)
   {
      $this->form_validation->set_rules('judul_berita', 'Nama berita', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('des_berita', 'Deskripsi Berita', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Edit Data berita',
            'berita' => $this->m_berita->detail($id_berita)
         ];
         $this->load->view('admin/berita/edit', $data);
      } else {
         date_default_timezone_set('Asia/Jakarta');
         $now = date('Y-m-d H:i:s');
         $data = [
            'id_berita' => $id_berita,
            'judul_berita' => $this->input->post('judul_berita'),
            // 'tgl_berita' => $now,
            'des_berita' => $this->input->post('des_berita'),
            'id_user' => $this->session->userdata('id_user')
         ];
         $this->m_berita->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/berita');
      }
   }

   public function delete($id_berita)
   {
      $data = [
         'id_berita' => $id_berita
      ];
      $this->m_berita->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/berita');
   }
}

/* End of file berita.php */
