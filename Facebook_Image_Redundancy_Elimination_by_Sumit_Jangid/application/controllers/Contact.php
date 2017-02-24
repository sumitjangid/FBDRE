<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data = $this->input->post();
		if(!isset($data['name']) || empty($data['name']) ||
		!isset($data['email']) || empty($data['email']) ||
		!isset($data['phone']) || empty($data['phone']) ||
		!isset($data['message']) || empty($data['message']) ||
		!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			echo "No arguments Provided!";
			return false;
		}
		$this->load->library('email');

		$this->email->from('noreply@ec2-52-32-195-251.us-west-2.compute.amazonaws.com', 'FBDRE');
		$this->email->to('sumitjan07@gmail.com');
		$this->email->bcc('sumit.jangid@csu.fullerton.edu');
		$this->email->subject('FBDRE: Contact Form');
		$this->email->message("You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: {$data['name']}\n\nEmail: {$data['email']}\n\nPhone: {$data['phone']}\n\nMessage:\n{$data['message']}");

		$this->email->send();
		echo "Email sent successfully!";
		// redirect('/');
	}
}
