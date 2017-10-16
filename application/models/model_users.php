<?php 

class Model_users extends CI_Model {
	public function can_log_in()
	{

		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5 ($this->input->post('password')));

		$query = $this->db->get('ya_users');

		if($query->num_rows()==1){
		return true;	
		} else {
		return false ;
		}	

		
	}
	public function add_temp_user($key)
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5 ($this->input->post('password')),
			'key' => $key
		);
		$query = $this->db->insert('temp_ya_users',$data);

		if($query){
			return true;
		} else {
			return false;
		}
	}


	public function add_attendance_event()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'contact' => $this->input->post('contact'),
			'school' => $this->input->post('school'),
			'otherschool' => $this->input->post('otherschool')
		);
		$query = $this->db->insert('ya_octoberpraise2017',$data);

		if($query){
			return $data['name'];
		} else {
			return false;
		}
	}

	public function is_valid_key($key)
	{
		$this->db->where('key', $key);
		$query = $this->db->get('temp_ya_users');

		if($query->num_rows()==1){
			return true;
		} else return false;
	}
	public function add_user($key)
	{
		$this->db->where('key', $key);
		$temp_user = $this->db->get('temp_ya_users');

		if($temp_user){
			$row = $temp_user->row();

			$data = array(
			'username' => $row->username,
			'password' => $row->password
		);
		$did_add_user = $this->db->insert('ya_users',$data);

		} 

		if($did_add_user){
			$this->db->where('key', $key);
			$this->db->delete('temp_ya_users');

			return $data['username'];
		}return false;
	}

	public function getEventAttendance(){
			$query = $this->db->get('ya_octoberpraise2017'); 
			if($query->num_rows() > 0){
				return $query->result();
			}
	}

	public function delete_attendee($id){
			return $this->db->delete('ya_octoberpraise2017',['id'=> $id]);
	}
}

