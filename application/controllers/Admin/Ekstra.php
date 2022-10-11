<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ekstra extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_ekstra');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Ekstrakulikuler',
         'ekstra' => $this->m_ekstra->list()
      ];
      $this->load->view('admin/ekstra/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_ekstra', 'Nama ekstra', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_ekstra/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_ekstra')) {
            $data = [
               'title' => 'Tambah Data Ekstrakulikuler',
               'error_upload' => $this->upload->display_errors(),
            ];
            $this->load->view('admin/ekstra/tambah', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_ekstra/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = [
               'nama_ekstra' => $this->input->post('nama_ekstra'),
               'foto_ekstra' => $upload_data['uploads']['file_name']
            ];
            $this->m_ekstra->input($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/ekstra');
         }
      }
      $data = [
         'title' => 'Tambah Data Ekstrakulikuler'
      ];
      $this->load->view('admin/ekstra/tambah', $data);
   }

   public function edit($id_ekstra)
   {
      $this->form_validation->set_rules('nama_ekstra', 'Nama ekstra', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_ekstra/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_ekstra')) {
            $data = [
               'title' => 'Edit Data Ekstrakulikuler',
               'error_upload' => $this->upload->display_errors(),
               'ekstra' => $this->m_ekstra->detail($id_ekstra),
            ];
            $this->load->view('admin/ekstra/edit', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_ekstra/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $item = $this->m_ekstra->detail($id_ekstra);
            if ($item->foto_ekstra != null) {
               $target_file = 'foto_ekstra/' . $item->foto_ekstra;
               unlink($target_file);
            }
            $data = [
               'id_ekstra' => $id_ekstra,
               'nama_ekstra' => $this->input->post('nama_ekstra'),
               'foto_ekstra' => $upload_data['uploads']['file_name']
            ];
            $this->m_ekstra->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/ekstra');
         }
         $data = [
            'id_ekstra' => $id_ekstra,
            'nama_ekstra' => $this->input->post('nama_ekstra')
         ];
         $this->m_ekstra->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/ekstra');
      }
      $data = [
         'title' => 'Edit Data Ekstrakulikuler',
         'ekstra' => $this->m_ekstra->detail($id_ekstra)
      ];
      $this->load->view('admin/ekstra/edit', $data);
   }

   public function delete($id_ekstra)
   {
      $item = $this->m_ekstra->detail($id_ekstra);
      if ($item->foto_ekstra != null) {
         $target_file = 'foto_ekstra/' . $item->foto_ekstra;
         unlink($target_file);
      }
      $data = [
         'id_ekstra' => $id_ekstra
      ];
      $this->m_ekstra->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/ekstra');
   }
}

/* End of file ekstra.php */
