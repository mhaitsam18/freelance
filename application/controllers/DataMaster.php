<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		// is_logged_in();
		$this->load->library('form_validation');
		// $this->load->model('DataMaster_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function pertanyaan($pertanyaan = null)
	{
		$data['title'] = "Data Pertanyaan";
		$data['pertanyaan'] = $this->db->get('pertanyaan')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('template_admin/header_dashboard_admin', $data);
		    $this->load->view('template_admin/sidebar_dashboard_admin', $data);
		    $this->load->view('template_admin/topbar_dashboard_admin', $data);
		    $this->load->view('admin/data-pertanyaan', $data);
		    $this->load->view('template_freelance/footer_dashboard_freelance', $data);
		} else{
			$this->db->insert('pertanyaan', [
				'pertanyaan' => $this->input->post('pertanyaan')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				New Question Added!
				</div>');
			redirect('DataMaster/pertanyaan');
		}
	}

	public function updatePertanyaan()
	{
		$this->form_validation->set_rules('pertanyaan', 'Education Name', 'trim|required');
		if ($this->form_validation->run() == false) {
			redirect('DataMaster/pertanyaan');
		} else{
			$this->db->where('id_pertanyaan', $this->input->post('id_pertanyaan'));
			$this->db->update('pertanyaan', [
				'pertanyaan' => $this->input->post('pertanyaan')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Question Updated!
				</div>');
			redirect('DataMaster/pertanyaan');
		}
	}
	
	public function deletePertanyaan($id_pertanyaan)
	{
		$this->db->delete('pertanyaan', ['id_pertanyaan' => $id_pertanyaan]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Question Deleted!
			</div>');
		redirect('DataMaster/pertanyaan');
	}
	public function getUpdatePertanyaan($id_pertanyaan = null){
		if (!$id_pertanyaan) {
			$id_pertanyaan = $this->input->post('id_pertanyaan');
		}
		echo json_encode($this->db->get_where('pertanyaan', ['id_pertanyaan' => $id_pertanyaan])->row_array());
	}
	
}