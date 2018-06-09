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

	//----------Data Pengajar-------------//
	public function dash_datapengajar()
	{
		$data['title']="Data Pengajar";
		$data['content']="admin/dash_datapengajar";
		$data['get_data']=$this->Mo_admin->get_datapengajar_process();
		$this->load->view('dashboard',$data);
	}

	public function register_pengajar()
	{
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('namaus', 'kolom nama', 'trim|required',array('required'=>'%s Wajib diisi'));
			$this->form_validation->set_rules('emailus', 'email ini', 'trim|required|is_unique[user.emailus]',array('is_unique'=>'%s sudah dipakai'));
			$this->form_validation->set_rules('passwordus', 'kolom password', 'trim|required',array('required'=>'%s Wajib diisi'));
			
			if ($this->form_validation->run() == true) {
				if ($this->Mo_admin->register_pengajar_process() == true) {
					$this->session->set_flashdata('msg_regpeng', '<div class="alert alert-success"><b>Registerasi Pengajar Berhasil</b><br>
					pengajar berhasil ditambahkan
					</div>');
					redirect('Con_admin/dash_datapengajar');
				}
				else{
					$this->session->set_flashdata('msg_regpeng', '<div class="alert alert-danger"><b>registerasi Gagal</b><br>
					Tidak bisa ditambahkan
					</div>');
					redirect('Con_admin/dash_datapengajar');
				}
			} 
			else {
				$this->session->set_flashdata('msg_regpeng', '<div class="alert alert-danger"><b>registerasi Kelas Gagal</b><br>
				'.validation_errors().'</div>');
				redirect('Con_admin/dash_datapengajar');
			}
		}
	}

	//-------------------------Data Siswa-------------//
	public function dash_datasiswa()
	{
		$data['title']="Data siswa";
		$data['content']="admin/dash_datasiswa";
		$data['get_data']=$this->Mo_admin->get_datapengajar_process();
		$this->load->view('dashboard',$data);
	}

	public function dash_detsiswa($id_user)
	{
		$data['title']="Detail Data siswa";
		$data['content']="admin/dash_detsiswa";
		$data['get_data']=$this->Mo_admin->get_datapengajar_process();
		$data['get_data2']=$this->Mo_admin->getdata_siswa_process($id_user);
		$this->load->view('dashboard',$data);
	}



}

/* End of file Con_admin.php */
/* Location: ./application/controllers/Con_admin.php */