<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_fasilitas');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Fasilitas',
         'fasilitas' => $this->m_fasilitas->list()
      ];
      $this->load->view('admin/fasilitas/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_fasilitas', 'Nama Fasilitas', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_fasilitas/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_fasilitas')) {
            $data = [
               'title' => 'Tambah Data Fasilitas',
               'error_upload' => $this->upload->display_errors(),
            ];
            $this->load->view('admin/fasilitas/tambah', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_fasilitas/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = [
               'nama_fasilitas' => $this->input->post('nama_fasilitas'),
               'foto_fasilitas' => $upload_data['uploads']['file_name']
            ];
            $this->m_fasilitas->input($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/fasilitas');
         }
      }
      $data = [
         'title' => 'Tambah Data Fasilitas'
      ];
      $this->load->view('admin/fasilitas/tambah', $data);
   }

   public function edit($id_fasilitas)
   {
      $this->form_validation->set_rules('nama_fasilitas', 'Nama Fasilitas', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_fasilitas/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_fasilitas')) {
            $data = [
               'title' => 'Edit Data Fasilitas',
               'error_upload' => $this->upload->display_errors(),
               'fasilitas' => $this->m_fasilitas->detail($id_fasilitas),
            ];
            $this->load->view('admin/fasilitas/edit', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_fasilitas/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $item = $this->m_fasilitas->detail($id_fasilitas);
            if ($item->foto_fasilitas != null) {
               $target_file = 'foto_fasilitas/' . $item->foto_fasilitas;
               unlink($target_file);
            }

            $data = [
               'id_fasilitas' => $id_fasilitas,
               'nama_fasilitas' => $this->input->post('nama_fasilitas'),
               'foto_fasilitas' => $upload_data['uploads']['file_name']
            ];
            $this->m_fasilitas->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/fasilitas');
         }
         $data = [
            'id_fasilitas' => $id_fasilitas,
            'nama_fasilitas' => $this->input->post('nama_fasilitas'),
         ];
         $this->m_fasilitas->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/fasilitas');
      }
      $data = [
         'title' => 'Edit Data fasilitas',
         'fasilitas' => $this->m_fasilitas->detail($id_fasilitas)
      ];
      $this->load->view('admin/fasilitas/edit', $data);
   }

   public function delete($id_fasilitas)
   {
      $item = $this->m_fasilitas->detail($id_fasilitas);
      if ($item->foto_fasilitas != null) {
         $target_file = 'foto_fasilitas/' . $item->foto_fasilitas;
         unlink($target_file);
      }
      $data = [
         'id_fasilitas' => $id_fasilitas
      ];
      $this->m_fasilitas->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/fasilitas');
   }
}

/* End of file fasilitas.php */
