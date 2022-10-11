<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_pengurus');
      $this->load->model('m_jabatan');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Pengurus',
         'pengurus' => $this->m_pengurus->list(),
         'jabatan' => $this->m_jabatan->list()
      ];
      $this->load->view('admin/pengurus/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_pengurus', 'Nama Pengurus', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('jk_pengurus', 'Jenis Kelamin', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_pengurus/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_pengurus')) {
            $data = [
               'title' => 'Tambah Data Pengurus',
               'jabatan' => $this->m_jabatan->list(),
               'error_upload' => $this->upload->display_errors()
            ];
            $this->load->view('admin/pengurus/tambah', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_pengurus/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = [
               'nama_pengurus' => $this->input->post('nama_pengurus'),
               'jk_pengurus' => $this->input->post('jk_pengurus'),
               'id_jabatan' => $this->input->post('id_jabatan'),
               'foto_pengurus' => $upload_data['uploads']['file_name']
            ];
            $this->m_pengurus->input($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/pengurus');
         }
      }
      $data = [
         'title' => 'Tambah Data Pengurus',
         'jabatan' => $this->m_jabatan->list()
      ];
      $this->load->view('admin/pengurus/tambah', $data);
   }

   public function edit($id_pengurus)
   {
      $this->form_validation->set_rules('nama_pengurus', 'Nama pengurus', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('jk_pengurus', 'Jenis Kelamin', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_pengurus/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_pengurus')) {
            $data = [
               'title' => 'Edit Data Pengurus',
               'error_upload' => $this->upload->display_errors(),
               'pengurus' => $this->m_pengurus->detail($id_pengurus),
               'jabatan' => $this->m_jabatan->list()
            ];
            $this->load->view('admin/pengurus/edit', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_pengurus/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $item = $this->m_pengurus->detail($id_pengurus);
            if ($item->foto_pengurus != null) {
               $target_file = 'foto_pengurus/' . $item->foto_pengurus;
               unlink($target_file);
            }
            $data = [
               'id_pengurus' => $id_pengurus,
               'nama_pengurus' => $this->input->post('nama_pengurus'),
               'jk_pengurus' => $this->input->post('jk_pengurus'),
               'id_jabatan' => $this->input->post('id_jabatan'),
               'foto_pengurus' => $upload_data['uploads']['file_name']
            ];
            $this->m_pengurus->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/pengurus');
         }
         $data = [
            'id_pengurus' => $id_pengurus,
            'nama_pengurus' => $this->input->post('nama_pengurus'),
            'jk_pengurus' => $this->input->post('jk_pengurus'),
            'id_jabatan' => $this->input->post('id_jabatan')
         ];
         $this->m_pengurus->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/pengurus');
      }
      $data = [
         'title' => 'Edit Data Pengurus',
         'pengurus' => $this->m_pengurus->detail($id_pengurus),
         'jabatan' => $this->m_jabatan->list()
      ];
      $this->load->view('admin/pengurus/edit', $data);
   }

   public function delete($id_pengurus)
   {
      $item = $this->m_pengurus->detail($id_pengurus);
      if ($item->foto_pengurus != null) {
         $target_file = 'foto_pengurus/' . $item->foto_pengurus;
         unlink($target_file);
      }
      $data = [
         'id_pengurus' => $id_pengurus
      ];
      $this->m_pengurus->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/pengurus');
   }
}

/* End of file pengurus.php */
