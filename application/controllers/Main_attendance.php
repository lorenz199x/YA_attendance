<?php
date_default_timezone_set("Asia/Manila");
class Main_attendance extends CI_Controller {

		public function index()
	{
		$this->newpage();
	}


	public function newpage()
	{
		$this->load->model('model_attendance');
		$members = $this->model_attendance->getYouthMembers();
		$this->load->view('templates/header');
		$this->load->view('page/attendance',['members' => $members]);
		$this->load->view('templates/footer');
	}

	public function weekly_attendance_validation()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|trim|is_unique[ya_attendance_users.name]');
		$this->form_validation->set_rules('contact','Contact','trim');
		$this->form_validation->set_rules('birthdate','Birthdate','trim');
		$this->form_validation->set_rules('type','Type','required|trim');		

		$this->form_validation->set_message('is_unique','Already Added');			

		if($this->form_validation->run())
		{
			
			$this->load->model('model_attendance');

			if($this->model_attendance->addyouth())
			{
				//$this->session->set_flashdata('msg','New Youth Saved Successfully');	
			echo '<script>alert("New Youth Saved Successfully");</script>';
			} else {
				$this->session->set_flashdata('msg','Failed to Save Youth Attendee!');
			}
			

			//redirect('main_attendance');

		}
		//redirect('main_attendance');
		//$this->newpage();	
		echo '<script type="text/javascript" src="'. base_url("assets/js/jquery-3.2.1.min.js").'"></script>';
		echo '<script>jQuery("form.form-horizontal.newattendance").trigger("reset");</script>';	
		$this->newpage();

	}

	public function present_youth()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|trim|is_unique[ya_attendance.name]');

		$this->form_validation->set_message('is_unique','Already PRESENT');		

		if($this->form_validation->run())
		{
			
			$this->load->model('model_attendance');

			if($this->model_attendance->addPresentYouth())
			{
				$this->session->set_flashdata('msg1','New Youth Saved Successfully');	
			} else {
				$this->session->set_flashdata('msg1','Failed to Save Youth Attendee!');
			}
		//	$this->newpage();	

			redirect('main_attendance');

		}
		redirect('main_attendance');

	}

	public function presentToday()
	{
	
		$this->load->model('model_attendance');
		//$posts = $this->model_users->getEventAttendance();
		$posts = $this->model_attendance->presentToday();
		 	$this->load->view('presentToday', ['posts' => $posts]);
	}

	public function view_ya_attendance()
	{
	
	//	$this->load->model('model_attendance');
		//$posts = $this->model_users->getEventAttendance();
	//	$posts = $this->model_attendance->presentToday();
		 	$this->load->view('view_ya_attendance', ['posts' => $posts]);
	}



}