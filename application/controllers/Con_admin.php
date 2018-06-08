<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mo_admin');
	}

	//-------------Data Kelas-------------//
	public function dash_datakelas()
	{
		$data['title']="Data Kelas";
		$data['content']="admin/dash_datakelas";
		$data['get_data']=$this->Mo_admin->get_datakelasdipakai_process();
		$data['get_data2']=$this->Mo_admin->get_macamkelas_process();
		$this->load->view('dashboard',$data);
	}

	public function register_jeniskelas()
	{
		$this->Mo_admin->register_jeniskelas_process();
		redirect('Con_admin/dash_datakelas','refresh');
	}

	public function delete_macamkelas($id_macam_kelas)
	{
		$this->Mo_admin->delete_macamkelas_process($id_macam_kelas);
		$this->session->set_flashdata('msg_delkel', '<div class="alert alert-success"><b>Hapus Kelas Berhasil</b><br>Kelas berhasil dihapus</div>');
		redirect('Con_admin/dash_datakelas','refresh');
	}

	public function delete_kelas($id_kelas)
	{
		$this->Mo_admin->delete_kelas_process($id_kelas);
		$this->session->set_flashdata('msg_delkel', '<div class="alert alert-success"><b>Hapus Kelas Berhasil</b><br>Kelas berhasil dihapus</div>');
		redirect('Con_admin/dash_datakelas','refresh');
	}

	//----------Data Penga



}

/* End of file Con_admin.php */
/* Location: ./application/controllers/Con_admin.php */