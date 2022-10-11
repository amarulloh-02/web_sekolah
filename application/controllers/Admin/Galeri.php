<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_galeri');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Galeri',
         'galeri' => $this->m_galeri->list()
      ];
      $this->load->view('admin/galeri/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_galeri', 'Nama Galeri', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_galeri/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_galeri')) {
            $data = [
               'title' => 'Tambah Data galerikulikuler',
               'error_upload' => $this->upload->display_errors(),
            ];
            $this->load->view('admin/galeri/tambah', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_galeri/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = [
               'nama_galeri' => $this->input->post('nama_galeri'),
               'foto_galeri' => $upload_data['uploads']['file_name']
            ];
            $this->m_galeri->input($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/galeri');
         }
      }
      $data = [
         'title' => 'Tambah Data Galeri'
      ];
      $this->load->view('admin/galeri/tambah', $data);
   }

   public function edit($id_galeri)
   {
      $this->form_validation->set_rules('nama_galeri', 'Nama Galeri', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_galeri/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_galeri')) {
            $data = [
               'title' => 'Edit Data Galeri',
               'error_upload' => $this->upload->display_errors(),
               'galeri' => $this->m_galeri->detail($id_galeri),
            ];
            $this->load->view('admin/galeri/edit', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_galeri/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $item = $this->m_galeri->detail($id_galeri);
            if ($item->foto_galeri != null) {
               $target_file = 'foto_galeri/' . $item->foto_galeri;
               unlink($target_file);
            }
            $data = [
               'id_galeri' => $id_galeri,
               'nama_galeri' => $this->input->post('nama_galeri'),
               'foto_galeri' => $upload_data['uploads']['file_name']
            ];
            $this->m_galeri->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/galeri');
         }
         $data = [
            'id_galeri' => $id_galeri,
            'nama_galeri' => $this->input->post('nama_galeri')
         ];
         $this->m_galeri->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/galeri');
      }
      $data = [
         'title' => 'Edit Data Galeri',
         'galeri' => $this->m_galeri->detail($id_galeri)
      ];
      $this->load->view('admin/galeri/edit', $data);
   }

   public function delete($id_galeri)
   {
      $item = $this->m_galeri->detail($id_galeri);
      if ($item->foto_galeri != null) {
         $target_file = 'foto_galeri/' . $item->foto_galeri;
         unlink($target_file);
      }
      $data = [
         'id_galeri' => $id_galeri
      ];
      $this->m_galeri->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/galeri');
   }
}

/* End of file galeri.php */
