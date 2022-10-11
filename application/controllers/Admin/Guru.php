<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_guru');
      $this->load->model('m_pelajaran');
      $this->load->model('m_jabatan');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Guru',
         'guru' => $this->m_guru->list(),
         'pelajaran' => $this->m_pelajaran->list(),
         'jabatan' => $this->m_jabatan->list()
      ];
      $this->load->view('admin/guru/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('jk_guru', 'Jenis Kelamin', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('tgl_lahir', 'Tgl. Lahir', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_guru/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_guru')) {
            $data = [
               'title' => 'Tambah Data Guru',
               'pelajaran' => $this->m_pelajaran->list(),
               'jabatan' => $this->m_jabatan->list(),
               'error_upload' => $this->upload->display_errors(),
            ];
            $this->load->view('admin/guru/tambah', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_guru/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = [
               'nama_guru' => $this->input->post('nama_guru'),
               'jk_guru' => $this->input->post('jk_guru'),
               'tgl_lahir' => $this->input->post('tgl_lahir'),
               'id_jabatan' => $this->input->post('id_jabatan'),
               'id_pelajaran' => $this->input->post('id_pelajaran'),
               'foto_guru' => $upload_data['uploads']['file_name']
            ];
            $this->m_guru->input($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/guru');
         }
      }
      $data = [
         'title' => 'Tambah Data Guru',
         'pelajaran' => $this->m_pelajaran->list(),
         'jabatan' => $this->m_jabatan->list()
      ];
      $this->load->view('admin/guru/tambah', $data);
   }

   public function edit($id_guru)
   {
      $guru = $this->m_guru->detail($id_guru);
      $pelajaran = $this->m_pelajaran->list();
      $jabatan = $this->m_jabatan->list();

      $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('jk_guru', 'Jenis Kelamin', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('tgl_lahir', 'Tgl. Lahir', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('id_pelajaran', 'Pelajaran', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_guru/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_guru')) {
            $data = [
               'title' => 'Edit Data Guru',
               'error_upload' => $this->upload->display_errors(),
               'guru' => $guru,
               'pelajaran' => $pelajaran,
               'jabatan' => $jabatan
            ];
            $this->load->view('admin/guru/edit', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_guru/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $item = $this->m_guru->detail($id_guru);
            if ($item->foto_guru != null) {
               $target_file = 'foto_guru/' . $item->foto_guru;
               unlink($target_file);
            }
            $data = [
               'id_guru' => $id_guru,
               'nama_guru' => $this->input->post('nama_guru'),
               'jk_guru' => $this->input->post('jk_guru'),
               'tgl_lahir' => $this->input->post('tgl_lahir'),
               'id_jabatan' => $this->input->post('id_jabatan'),
               'id_pelajaran' => $this->input->post('id_pelajaran'),
               'foto_guru' => $upload_data['uploads']['file_name']
            ];
            $this->m_guru->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/guru');
         }
         $data = [
            'id_guru' => $id_guru,
            'nama_guru' => $this->input->post('nama_guru'),
            'jk_guru' => $this->input->post('jk_guru'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_jabatan' => $this->input->post('id_jabatan'),
            'id_pelajaran' => $this->input->post('id_pelajaran')
         ];
         $this->m_guru->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/guru');
      }
      $data = [
         'title' => 'Edit Data Guru',
         'guru' => $guru,
         'pelajaran' => $pelajaran,
         'jabatan' => $jabatan
      ];
      $this->load->view('admin/guru/edit', $data);
   }

   public function delete($id_guru)
   {
      $item = $this->m_guru->detail($id_guru);
      if ($item->foto_guru != null) {
         $target_file = 'foto_guru/' . $item->foto_guru;
         unlink($target_file);
      }
      $data = [
         'id_guru' => $id_guru
      ];
      $this->m_guru->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/guru');
   }
}

/* End of file guru.php */
