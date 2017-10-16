<?php
date_default_timezone_set("Asia/Manila");
class Model_attendance extends CI_Model {

	public function addyouth()
	{
		$today = date('Y-m-d');
		$data = array(
			'name' => $this->input->post('name'),
			'contact' => $this->input->post('contact'),
			'birthdate' => $this->input->post('birthdate'),
			'type' => $this->input->post('type'),
			'date_created' => $today
		);
		$query = $this->db->insert('ya_attendance_users',$data);

		if($query){
			return true;
		} else {
			return false;
		}
	}

	public function addPresentYouth()
	{
		$today = date('Y-m-d');
		$data = array(
			'name' => $this->input->post('name'),
			'date_present' => $today
		);
		$query = $this->db->insert('ya_attendance',$data);

		if($query){
			return true;
		} else {
			return false;
		}
	}

	public function getYouthMembers(){
			$this->db->order_by('name', 'asc');
			$query = $this->db->get('ya_attendance_users'); 
			if($query->num_rows() > 0){
				return $query->result();
			}
	}

	public function presentToday()
	{
			$today = date('Y-m-d');
			$this->db->where('date_present', $today);
			$this->db->order_by('date_present', 'asc');
			$query = $this->db->get('ya_attendance'); 
			if($query->num_rows() > 0){
				return $query->result();
			}


	}


}