<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_admin extends CI_Model {


	//Register Kelas
	public function register_jeniskelas_process()
	{
		$data=array(
			'id_macam_kelas'=>null,
			'macam_kelas'=>$this->input->post('macam_kelas'));
		$this->db->insert('jenis_kelas',$data);
		if ($this->db->affected_rows() > 0 ) {
			return true;
		}
		else{
			return false;
		}		
	}

	public function get_macamkelas_process()
	{
		return $this->db->get('jenis_kelas')->result();
	}

	public function get_datakelasdipakai_process()
	{
		return $this->db->join('kelas', 'kelas.id_user = user.id_user')->get('user')->result();
	}

	//Delete Macam Kelas 
	public function delete_macamkelas_process($id_macam_kelas)
	{
		$where=array('id_macam_kelas'=>$id_macam_kelas);
		$this->db->where($where)->delete('jenis_kelas');
	}

	//Delete Kelas diajar process
	public function delete_kelas_process($id_kelas)
	{
		$where=array('id_kelas'=>$id_kelas);
		$this->db->where($where)->delete('kelas');
	}

}

/* End of file Mo_admin.php */
/* Location: ./application/models/Mo_admin.php */