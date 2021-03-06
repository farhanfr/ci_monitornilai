<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_pengajar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mo_pengajar');
	}

	//Dashboard 
	public function dashboard()
	{
		$data['title']="Dashboard";
		$data['content']="pengajar/dash_dashboard";
		$this->load->view('dashboard',$data);
	}

	//Login
	public function login_customer()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('emailus', 'kolom email', 'trim|required',array('required'=>'%s wajib diisi'));
			$this->form_validation->set_rules('passwordus', 'kolom password', 'trim|required',array('required'=>'%s wajib diisi'));
			
			if ($this->form_validation->run() == true) {
				if ($this->Mo_pengajar->login_process() == true) {
					redirect('Con_pengajar/check_sess');
				}
				else{
					$this->session->set_flashdata('msg_login', '<div class="alert alert-danger"><b>Login Gagal</b><br>
					Email atau Password anda salah
					</div>');
					redirect('Con_induk/');
				}
			} 
			else {
				$this->session->set_flashdata('msg_login', '<div class="alert alert-danger"><h4>Login Gagal</h4><br>
				'.validation_errors().'</div>');
				redirect('Con_induk/');
			}
		}
	}
	//Check sess
	public function check_sess()
	{
		if ($this->session->login != true) {
			redirect('Con_induk/');
		}
		else{
			redirect('Con_pengajar/dashboard');
		}
	}
	//Logout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Con_induk/');
		
	}
	//-------------------Kelas Saya Ajar----------------------//
	public function dash_kelas_saya()
	{
		$data['title']="Kelas Saya Ajar";
		$data['content']="pengajar/dash_kelas_saya";
		$data['get_data']=$this->Mo_pengajar->get_kelas();
		$data['get_data2']=$this->Mo_pengajar->get_macamkelas_process();
		$this->load->view('dashboard',$data);
	}

	public function register_kelas()
	{
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('nama_kelas', 'Kelas ini', 'trim|required|is_unique[kelas.nama_kelas]',array('is_unique'=>'%s sudah dipakai'));
			
			if ($this->form_validation->run() == true) {
				if ($this->Mo_pengajar->register_kelas_process() == true) {
					$this->session->set_flashdata('msg_regkel', '<div class="alert alert-success"><b>Registerasi Kelas Berhasil</b><br>
					Kelas berhasil ditambahkan
					</div>');
					redirect('Con_pengajar/dash_kelas_saya');
				}
				else{
					$this->session->set_flashdata('msg_regkel', '<div class="alert alert-danger"><b>registerasi Gagal</b><br>
					Tidak bisa ditambahkan
					</div>');
					redirect('Con_pengajar/dash_kelas_saya');
				}
			} 
			else {
				$this->session->set_flashdata('msg_regkel', '<div class="alert alert-danger"><b>registerasi Kelas Gagal</b><br>
				'.validation_errors().'</div>');
				redirect('Con_pengajar/dash_kelas_saya');
			}
		}
	}

	public function delete_kelas($id_kelas)
	{
		$delete=$this->Mo_pengajar->delete_kelas_process($id_kelas);
		$this->session->set_flashdata('msg_delkel', '<div class="alert alert-success"><b>Hapus Kelas Berhasil</b><br>Kelas berhasil dihapus</div>');
		redirect('Con_pengajar/dash_kelas_saya','refresh');
	}

	//-------------------Register Siswa------------------//
	public function dash_registersiswa()
	{
		$data['title']="Register Siswa";
		$data['content']="pengajar/dash_registersiswa";
		$data['get_data']=$this->Mo_pengajar->get_kelas();
		$this->load->view('dashboard',$data);
	}

	public function register_siswa()
	{
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('nama_anggota', 'kolom nama', 'trim|required|is_unique[data_siswa.nama_anggota]',array('required'=>'%s wajib diisi','is_unique'=>'Siswa ini sudah terdaftar'));
			$this->form_validation->set_rules('kelas', 'kolom kelas', 'trim|required',array('required'=>'%s wajib diisi'));
			
			if ($this->form_validation->run() == true) {
				if ($this->Mo_pengajar->register_siswa_process() == true) {
					$this->session->set_flashdata('msg_regsis', '<div class="alert alert-success"><b>Registerasi siswa Berhasil</b><br>
					Siswa berhasil ditambhkan
					</div>');
					redirect('Con_pengajar/dash_registersiswa');
				}
				else{
					$this->session->set_flashdata('msg_regsis', '<div class="alert alert-danger"><b>registerasi Gagal</b><br>
					Tidak bisa masuk
					</div>');
					redirect('Con_pengajar/dash_registersiswa');
				}
			} 
			else {
				$this->session->set_flashdata('msg_regsis', '<div class="alert alert-danger"><b>registerasi Gagal</b><br>
				'.validation_errors().'</div>');
				redirect('Con_pengajar/dash_registersiswa');
			}
		}
	}

	//-------------------Daftar kelas,siswa bserta input nilai (tabel anggota_kelas)------------------//
	public function dash_daftarkelas()
	{
		$data['title']="Daftar Siswa & input nilai ";
		$data['content']="pengajar/dash_daftarkelas";
		$data['get_data']=$this->Mo_pengajar->get_kelas();
		$this->load->view('dashboard',$data);
	}

	public function dash_detdaftarsiswa($id_kelas)
	{
		$data['title']="Daftar Siswa & input nilai";
		$data['content']="pengajar/dash_detdaftarsiswa";
		$data['get_data']=$this->Mo_pengajar->get_anggota_kelasid($id_kelas);
		$this->load->view('dashboard',$data);
	}

	public function dash_updatenilai($id_data_siswa)
	{
		$data['title']="Update nilai";
		$data['content']="pengajar/dash_updatenilai";
		$data['get_data']=$this->Mo_pengajar->form_update_nilai($id_data_siswa);
		$this->load->view('dashboard',$data);
	}

	public function update_nilai()
	{
		if ($id=$this->Mo_pengajar->update_nilai_process()) {
			$this->session->set_flashdata('msg_upnilai', '<div class="alert alert-success"><b>Berhasil diatur</b><br>Nilai berhasil diatur</div>');
			redirect('Con_pengajar/dash_detdaftarsiswa/'.$id,'refresh');
		}
		else{
			$this->session->set_flashdata('msg_upnilai', '<div class="alert alert-success"><b>Gagal diatur</b><br>Nilai Gagal; diatur</div>');
			redirect('Con_pengajar/dash_detdaftarsiswa/'.$id,'refresh');
		}
	}

	public function delete_siswa($id_data_siswa)
	{
		$this->Mo_pengajar->delete_siswa_process($id_data_siswa);
		redirect('Con_pengajar/dash_daftarkelas','refresh');
	}

	//------------------Profil------------------//
	public function dash_profilku()
	{
		$data['title']="Profilku";
		$data['content']="pengajar/dash_profilku";
		$this->load->view('dashboard',$data);
	}

}

/* End of file Con_pengajar.php */
/* Location: ./application/controllers/Con_pengajar.php */