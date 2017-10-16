<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->login();
	}

	public function login()
	{

		if ($this->session->userdata('is_logged_in'))
		{
			$this->load->view('members');
		} else {
			$this->load->view('main');	
		}

	}

	public function login_validation()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required|trim|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required|md5|trim');

		if($this->form_validation->run()){

			$data = array(
				'username' => $this->input->post('username'),
				'is_logged_in' => 1
			);
			$this->session->set_userdata($data);
			
			redirect('main/members');	
		}else{
			$this->load->view('main');
		}	
	}

	public function validate_credentials(){

		$this->load->model('model_users');

		if ($this->model_users->can_log_in()){
			return true;
		} else {
			$this->form_validation->set_message('validate_credentials','Incorrect username/password');
			return false;
		}

	}

	public function members()
	{
		if ($this->session->userdata('is_logged_in'))
		{
			$this->load->view('members');
		} else {
			redirect('main/restricted');		
		}
	}

	public function restricted()
	{
		$this->load->view('restricted');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('main');
	}

	public function signup()
	{
		$this->load->view('signup');
	}


	public function signup_validation(){
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','required|trim|is_unique[ya_users.username]');
		$this->form_validation->set_rules('password','Password','required|trim');

		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]');

		$this->form_validation->set_message('is_unique','Username is already in use.');

		if($this->form_validation->run()){

			//generate a random key

			$key = md5(uniqid());

		$this->load->library('email');
		$this->load->model('model_users');


		/*$config = Array(
			'protocol'  => 'smtp',
		    'smtp_host' => 'sg3plcpnl0080.prod.sin3.secureserver.net',
		    'smtp_port' => '465',
		    'smtp_user' => 'ci@wpmanila.com',
		    'smtp_pass' => 'codeigniter',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8'
		);	

	$this->email->initialize($config);


			$this->email->from('ci@wpmanila.com','TEST-CodeIgniter');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Confirm your Account');

			$message ="<p>TY</p>";
			$message .="<p><a href='" .base_url()."main/register_user/$key'>Click Here</a> To Confirm</p>";

			$this->email->message($message);
*/
			if($this->model_users->add_temp_user($key)){

				$this->load->view('templates/header');
				echo '<div class="container">';
				echo '<h1>Confirm Registration</h1><br/><br/>';

				echo '<a href="' .base_url(). "main/register_user/$key".'"><button class="btn btn-success">Click Here To Confirm</button></a>';
				echo '</div>';
				$this->load->view('templates/footer');

			}

		/*	// send an email to the user
			if($this->model_users->add_temp_user($key)){
				if($this->email->send()){
				echo 'Email has been sent!';
				} else {
				echo 'could not sent the email.';
			} 

		}else { echo "problem adding to database"; }


			//add them to the temp_users db

	*/


		}else{
			$this->load->view('signup');
		}	

	}

	public function register_user($key)
	{
		$this->load->model('model_users');

		if($this->model_users->is_valid_key($key)){
			if ($newemail =$this->model_users->add_user($key)){


				$data = array(
				'username' => $newemail,
				'is_logged_in' => 1
			);
			$this->session->set_userdata($data);
			redirect('main/members');	

			} else {
				echo 'failed to add user';
			}
		} else { echo "invalid key"; }

	}

	public function profile(){

		$this->load->view('profile');
	}

	public function attendance(){

		if ($this->session->userdata('is_logged_in'))
		{
			$this->load->view('attendance');
		} else {
			redirect('main/restricted');		
		}
	}

	public function event_attendance_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('contact','Contact','required|trim|numeric');
		$this->form_validation->set_rules('school','School','required|trim');
		$this->form_validation->set_rules('otherschool','School','trim');

		if($this->form_validation->run())
		{
		
			$this->load->model('model_users');

			if($this->model_users->add_attendance_event() == $this->input->post('name')){
		
				$this->load->view('attendance');
				$name = $this->input->post('name');
				echo '<script>';
				echo 'alert("Thanks '.$name.' Enjoy and God bless!");';
				echo 'jQuery("input.form-control").attr("value") == ""';
				echo '</script>';
				}
		

		} else {
			redirect('main/attendance');
		}
	}

	public function attendancelist(){	
		$this->load->model('model_users');
		$posts = $this->model_users->getEventAttendance();
		$this->load->view('attendancelist', ['posts' => $posts]);

	}

	public function delete_attendee($id){

		$this->load->model('model_users');
		if($this->model_users->delete_attendee($id)){
		$this->session->set_flashdata('msg','Attendee Record Deleted Successfully');
		}else
		{
		$this->session->set_flashdata('msg','Failed to Attendee Record');	
		}
		return redirect('main/attendancelist'); 
	}
////////////////////////////////////////////////////////

	
}
