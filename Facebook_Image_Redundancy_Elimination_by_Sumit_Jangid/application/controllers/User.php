<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$FbUser = $this->_checkFBSession();
		if($FbUser === false){
			redirect('user/logout');
		}
		$data = array(
			'user_data'	=>	$this->session->userdata(),
			'fb_data'	=>	$FbUser->asArray(),
			'total_images'	=>	$this->db->where('user_id',$this->session->userdata('user')['id'])->get('images')->num_rows(),
			'imgToFetch'	=>	$this->db->where('user_id',$this->session->userdata('user')['id'])->where('imgdata','')->get('images')->num_rows(),
			'duplicate'	=>	$this->db->select('id,fb_id,url,large_img,album_name,count(fb_id) as duplicate,group_concat(fb_id) as fb_ids')->where('user_id',$this->session->userdata('user')['id'])->where('imgdata !=','')->group_by('imgdata')->having('count(id) > 1')->get('images')->result_array(),
		);
		$this->render($data);
	}

	public function permissions()
	{
		$helper = $this->fb->getRedirectLoginHelper();
		$loginUrl = $helper->getLoginUrl(base_url($this->config->item('redirect_url')).'/get_images', $this->config->item('images_permissions'));
		redirect($loginUrl);
	}

	public function get_images()
	{
		$FbUser = $this->_checkFBSession();
		$FbUserData = $this->fb->get('/me?fields=id,name,email,permissions,picture.type(large),photos.type(uploaded).limit(50000){id,picture,can_delete,album{id,name},images}')->getGraphObject()->asArray();
		$user_photo_permission = false;
		foreach($FbUserData['permissions'] as $permission){
			if($permission['permission'] == 'user_photos' && $permission['status'] == 'granted'){
				$user_photo_permission = true;
			}
		}
		if(!$user_photo_permission){
			$this->session->set_flashdata('error', "Please allow the access to photos. <a href=\"".base_url('user/permissions')."\">Click here</a> to try again");
			redirect(base_url('user'));
		}
		if(isset($FbUserData['photos']) && !empty($FbUserData['photos'])){
			#SAVE IMAGES TO DB FIELDS
			$imagesToSave = array();
			foreach($FbUserData['photos'] as $image){
				$imagesToSave[$image['id']] = [
					'user_id'		=>	$this->session->userdata('user')['id'],
					'fb_id'			=>	$image['id'],
					'url'			=>	$image['picture'],
					'large_img'		=>	$image['images'][0]['source'],
					'album_id'		=>	isset($image['album']) && isset($image['album']['id'])?$image['album']['id']:NULL,
					'album_name'	=>	isset($image['album']) && isset($image['album']['name'])?$image['album']['name']:NULL,
					'created'		=>	date('Y-m-d H:i:s')
				];
			}
			// remove deleted fb images from local db..
			$this->db->where_not_in('fb_id',array_keys($imagesToSave))->delete("images");
			$res = $this->db->select('fb_id')->where_in('fb_id',array_keys($imagesToSave))->get("images");
			if($res->num_rows() > 0){
				$foundImgs = $res->result_array();
				foreach($foundImgs as $fbkey){
					unset($imagesToSave[$fbkey['fb_id']]);
				}
			}
			if(sizeof($imagesToSave) > 0){
				$this->db->insert_batch('images',$imagesToSave);
				$this->session->set_flashdata('success',count($imagesToSave).' image(s) imported successfully.');
			}else{
				$this->session->set_flashdata('success','No new image found.');
			}
		}else{
			$this->session->set_flashdata('success','No image found.');
		}
		redirect(base_url('user'));
	}

	public function get_image_data(){
		$this->load->helper('image');
		$ImagesWithoutData = $this->db->select('id,url,large_img')->where('imgdata','')->where('user_id',$this->session->userdata('user')['id'])->limit(10)->get('images')->result_array();
		$ImageDataToUpdate = array();
		if(sizeof($ImagesWithoutData)){
			foreach($ImagesWithoutData as $images){
				$img = fetch_image($images['large_img']);
				$mdData =  array(
					'id' => $images['id'],
					'imgdata' => md5($img)
				);
				
				$this->db->set('imgdata',$mdData['imgdata']);
				$this->db->where('id',$mdData['id']);
				$this->db->update('images');
			}
		}
		$data = array(
			'total'	=>	$this->db->where('user_id',$this->session->userdata('user')['id'])->get('images')->num_rows(),
			'remaining'	=>	$this->db->where('user_id',$this->session->userdata('user')['id'])->where('imgdata','')->get('images')->num_rows(),
			'duplicate'	=>	$this->db->select('id,fb_id,url,large_img,album_name,count(fb_id) as duplicate,group_concat(fb_id) as fb_ids')->where('user_id',$this->session->userdata('user')['id'])->where('imgdata !=','')->group_by('imgdata')->having('count(id) > 1')->get('images')->result_array(),
		);
		echo json_encode($data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
