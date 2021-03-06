<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_pengajar extends CI_Model {

	//Login Process
	public function login_process()
	{
		$emailus = $this->input->post('emailus');
		$passwordus = $this->input->post('passwordus');

		$where = array(
			'emailus'=>$emailus,
			'passwordus'=>$passwordus);
		$check = $this->db->where($where)->get('user')->num_rows();
		$fetch = $this->db->where($where)->get('user')->row_array();

		if ($check > 0) {
			$get_sess = array('id_user'=>$fetch['id_user'],'namaus'=>$fetch['namaus'],
			'emailus'=>$emailus,'status'=>$fetch['status'],'login'=>true);	
			$this->session->set_userdata($get_sess);
			return true;
		}
		else{
			return false;
		}
	}

	//Register Kelas diajar Process
	public function register_kelas_process()
	{
		$data=array(
			'id_kelas'=>null,
			'id_user'=>$this->session->id_user,
			'nama_kelas'=>$this->input->post('nama_kelas'));
		$this->db->insert('kelas',$data);
		if ($this->db->affected_rows() > 0 ) {
			return true;
		}
		else{
			return false;
		}		
	}

	//Get data macam kelas
	public function get_macamkelas_process()
	{
		return $this->db->get('jenis_kelas')->result();
	}

	//Delete Kelas diajar process
	public function delete_kelas_process($id_kelas)
	{
		$where=array('id_kelas'=>$id_kelas);
		$this->db->where($where)->delete('kelas');
	}

	//--------------------------------------------//
	//Register Siswa Process
	public function register_siswa_process()
	{
		$data=array(
			'id_data_siswa'=>null,
			'id_user'=>$this->session->id_user,
			'nama_anggota'=>$this->input->post('nama_anggota'),
			'id_kelas'=>$this->input->post('kelas'),//Inputan ter JOIN
			't1'=>0,
			't2'=>0,
			't3'=>0,
			't4'=>0,
			't5'=>0,
			'uas'=>0);
		$this->db->insert('data_siswa',$data);
		if ($this->db->affected_rows() > 0 ) {
			return true;
		}
		else{
			return false;
		}		
	}

	//Show data kelas yang diajar
	public function get_kelas()
	{
		return $this->db->where('id_user',$this->session->id_user)->get('kelas')->result();
	}

	//Show data detail anggota kelas id_kelas
	public function get_anggota_kelasid($id_kelas)
	{
		$where=array('data_siswa.id_user'=>$this->session->id_user,'data_siswa.id_kelas'=>$id_kelas);
		return $this->db->join('kelas', 'kelas.id_kelas = data_siswa.id_kelas')->where($where)->get('data_siswa')->result();
	}

	//Form Update Nilai
	public function form_update_nilai($id_data_siswa)
	{
		$where=array('id_data_siswa'=>$id_data_siswa);
		return $this->db->where($where)->get('data_siswa')->result();
	}

	//update nilai process
	public function update_nilai_process()
	{
		$data=array(
			'id_kelas'=>$this->input->post('id_kelas'),
			't1'=>$this->input->post('t1'),
			't2'=>$this->input->post('t2'),
			't3'=>$this->input->post('t3'),
			't4'=>$this->input->post('t4'),
			't5'=>$this->input->post('t5'),
			'uas'=>$this->input->post('uas'));
		$update_nilai=$this->db->where('id_data_siswa',$this->input->post('id_data_siswa_bekas'))->update('data_siswa', $data);
		if ($update_nilai) {
			return $this->input->post('id_kelas');
		}
		else{
			return false;
		}	
	}

	//Delete Siswa process
	public function delete_siswa_process($id_data_siswa)
	{
		$where=array('id_data_siswa'=>$id_data_siswa);
		$this->db->where($where)->delete('data_siswa');
	}




}

/* End of file Mo_pengajar.php */
/* Location: ./application/models/Mo_pengajar.php */


		