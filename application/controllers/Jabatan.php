<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
    
    public function index()
    {
        $this->load->model('M_jabatan');
        
        $data['jabatan'] = $this->M_jabatan->get_jabatan();

        $this->template->load('backend/template', '/backend/jabatan/jabatan', $data);
    }

    public function add_jabatan()
    {
        $this->load->model('M_jabatan');

        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'trim|required');

        $this->form_validation->set_message('required', '{field} harus diisi!');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

        if($this->form_validation->run() == TRUE) {
            $data = [
                'nama_jabatan' => $this->input->post('nama_jabatan')
            ];

            $this->M_jabatan->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-info">Data berhasil disimpan</div>');
            redirect('jabatan', 'refresh');
        } else {
            $this->index();
        }
    }

    function edit_jabatan($id)
    {
        $this->load->model('M_jabatan');

        $data['jbt'] = $this->M_jabatan->get_id_jabatan($id);
        // var_dump($data['jbt']->nama_jabatan);
        if ($data['jbt']) {
            $data['jabatan'] = $this->M_jabatan->get_jabatan();
            $this->template->load('backend/template', '/backend/jabatan/edit_jabatan', $data);
        } else {
            // var_dump($data['jbt']->nama_jabatan);
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ada bro</div>');
            redirect('jabatan');
        }
    }

    function update_jabatan()
    {
        $this->load->model('M_jabatan');
        $data = [
            'nama_jabatan' => $this->input->post('nama_jabatan')
        ];

        $this->M_jabatan->update($this->input->post('id'), $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil diubah</div>');
            redirect('jabatan', 'refresh');
    }
}