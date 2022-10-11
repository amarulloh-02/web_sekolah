<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('m_kegiatan');
   }

   public function index()
   {
      $this->user_login->cek_login();
      $data = [
         'title' => 'Data Kegiatan',
         'kegiatan' => $this->m_kegiatan->list()
      ];
      $this->load->view('admin/kegiatan/list', $data);
   }

   public function tambah()
   {
      $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('tgl_kegiatan', 'Tgl. Kegiatan', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('des_kegiatan', 'Deskripsi', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_kegiatan/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_kegiatan')) {
            $data = [
               'title' => 'Tambah Data kegiatan',
               'error_upload' => $this->upload->display_errors(),
            ];
            $this->load->view('admin/kegiatan/tambah', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_kegiatan/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            date_default_timezone_set('Asia/Jakarta');
            $now = date('Y-m-d H:i:s');
            $data = [
               'nama_kegiatan' => $this->input->post('nama_kegiatan'),
               'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
               'des_kegiatan' => $this->input->post('des_kegiatan'),
               'tgl_post' => $now,
               'foto_kegiatan' => $upload_data['uploads']['file_name'],
               'id_user' => $this->session->userdata('id_user')
            ];
            $this->m_kegiatan->input($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/kegiatan');
         }
      }
      $data = [
         'title' => 'Tambah Data kegiatan'
      ];
      $this->load->view('admin/kegiatan/tambah', $data);
   }

   public function edit($id_kegiatan)
   {
      $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('tgl_kegiatan', 'Tgl. Kegiatan', 'required', [
         'required' => '%s harus diisi'
      ]);
      $this->form_validation->set_rules('des_kegiatan', 'Deskripsi', 'required', [
         'required' => '%s harus diisi'
      ]);

      if ($this->form_validation->run() == true) {
         $config['upload_path']          = './foto_kegiatan/';
         $config['allowed_types']        = 'gif|jpg|png|jpeg';
         $config['max_size']             = 2000;

         $this->upload->initialize($config);

         if (!$this->upload->do_upload('foto_kegiatan')) {
            $data = [
               'title' => 'Edit Data kegiatan',
               'error_upload' => $this->upload->display_errors(),
               'kegiatan' => $this->m_kegiatan->detail($id_kegiatan),
            ];
            $this->load->view('admin/kegiatan/edit', $data);
         } else {
            $upload_data = ['uploads' => $this->upload->data()];
            $config['image_library']          = 'gd2';
            $config['source_image']          = './foto_kegiatan/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $item = $this->m_kegiatan->detail($id_kegiatan);
            if ($item->foto_kegiatan != null) {
               $target_file = 'foto_kegiatan/' . $item->foto_kegiatan;
               unlink($target_file);
            }
            $data = [
               'id_kegiatan' => $id_kegiatan,
               'nama_kegiatan' => $this->input->post('nama_kegiatan'),
               'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
               'des_kegiatan' => $this->input->post('des_kegiatan'),
               'foto_kegiatan' => $upload_data['uploads']['file_name']
            ];
            $this->m_kegiatan->edit($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('admin/kegiatan');
         }
         $data = [
            'id_kegiatan' => $id_kegiatan,
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
            'des_kegiatan' => $this->input->post('des_kegiatan'),
         ];
         $this->m_kegiatan->edit($data);
         $this->session->set_flashdata('success', 'Data berhasil disimpan');
         redirect('admin/kegiatan');
      }
      $data = [
         'title' => 'Edit Data kegiatan',
         'kegiatan' => $this->m_kegiatan->detail($id_kegiatan)
      ];
      $this->load->view('admin/kegiatan/edit', $data);
   }

   public function delete($id_kegiatan)
   {
      $item = $this->m_kegiatan->detail($id_kegiatan);
      if ($item->foto_kegiatan != null) {
         $target_file = 'foto_kegiatan/' . $item->foto_kegiatan;
         unlink($target_file);
      }
      $data = [
         'id_kegiatan' => $id_kegiatan
      ];
      $this->m_kegiatan->delete($data);
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('admin/kegiatan');
   }
}

/* End of file kegiatan.php */
