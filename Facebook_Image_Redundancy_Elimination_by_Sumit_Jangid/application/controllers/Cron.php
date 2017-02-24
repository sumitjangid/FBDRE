<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('image');
	}

	public function index()
	{
		$ImagesWithoutData = $this->db->select('id,url,large_img')->where('imgdata','')->limit(100)->get('images')->result_array();
		$ImageDataToUpdate = array();
		if(sizeof($ImagesWithoutData)){
			foreach($ImagesWithoutData as $images){
				$img = fetch_image($images['large_img']);
				$mdData =  array(
					'id' => $images['id'],
					'imgdata' => md5($img)
				);
				// $ImageDataToUpdate[] = $mdData;
				$this->db->set('imgdata',$mdData['imgdata']);
				$this->db->where('id',$mdData['id']);
				$this->db->update('images');
			}
		}
	}
}
