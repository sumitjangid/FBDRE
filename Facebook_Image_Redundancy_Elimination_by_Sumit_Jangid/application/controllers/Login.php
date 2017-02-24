<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = $this->input->post();
		$helper = $this->fb->getRedirectLoginHelper();
		$loginUrl = $helper->getLoginUrl(base_url($this->config->item('redirect_url')), $this->config->item('login_permissions'));
		$this->render(array('loginUrl'=>$loginUrl));
		if(!empty($data)){
			# TODO:: LOGIN VIA EMAIL AND PASSWORD
		}
	}

	public function connect()
	{
		$helper = $this->fb->getRedirectLoginHelper();
		$loginUrl = $helper->getLoginUrl(base_url($this->config->item('redirect_url')), $this->config->item('login_permissions'));
		redirect($loginUrl);
	}

	public function fbconnect($photos = false)
	{
		$helper = $this->fb->getRedirectLoginHelper();
		try {
			$accessToken = $helper->getAccessToken();
		}
		catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			$message = 'Graph returned an error: ' . $e->getMessage();
			log_message('debug',$message );
			$this->session->set_flashdata('error', $message);
			redirect('/');
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			$message = 'Facebook SDK returned an error: ' . $e->getMessage();
			log_message('debug',$message );
			$this->session->set_flashdata('error', $message);
			redirect('/');
			exit;
		}

		if (isset($accessToken)) {
			// Logged in!
			if (! $accessToken->isLongLived()) {
				// Exchanges a short-lived access token for a long-lived one
				try {
					// OAuth 2.0 client handler
					$oAuth2Client = $this->fb->getOAuth2Client();
					// Exchanges a short-lived access token for a long-lived one
					$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
					} catch (Facebook\Exceptions\FacebookSDKException $e) {
					$message = 'Error getting long-lived access token: ' . $helper->getMessage();
					log_message('debug',$message );
					$this->session->set_flashdata('error', $message);
					redirect('/');
				}
			}
			$this->load->model('User_model','User');
			$SessionToSet = [
				'is_loggedin' => TRUE,
				'fb_access_token'	=> (string)$accessToken
			];
			// Get users ID
			$user = $this->fb->get('/me?fields=id,name,email,picture.type(large)',(string)$accessToken)->getGraphObject()->asArray();
			if(isset($user['id'])){
				$userDetails = $this->User->get_fb_user($user['id']);
				$userDetails['token']	=	(string)$accessToken;
				if(isset($userDetails['fb_id']) && $userDetails['id']){
					$SessionToSet['user']	=	$userDetails;
					$this->User->register_fb_user($userDetails);
				}else{
					$userDetails['fb_id']		=	$user['id'];
					$userDetails['name']		=	$user['name'];
					$userDetails['email']		=	$user['email'];
					$userDetails['pass']		=	md5($user['id']);
					$userDetails['token']		=	(string)$accessToken;
					$userDetails['id'] 			=	$this->User->register_fb_user($userDetails);
					$SessionToSet['user']	=	$userDetails;
				}
			}
			$this->session->set_userdata($SessionToSet);
			if($photos !== false){
				redirect('user/'.$photos);
			}
			$this->session->set_flashdata('success','Logged In Successful !!');
			redirect('user');
		}
		redirect('/');
	}
}
