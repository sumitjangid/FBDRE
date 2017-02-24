<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $fb;
	public function __construct()
	{
		parent::__construct();
		$this->load->config('facebook');
		// FacebookSession::setDefaultApplication($this->config->item('fb_app_id'), $this->config->item('fb_app_secret'));
		$this->fb =	new Facebook\Facebook(['app_id' => $this->config->item('fb_app_id'),'app_secret' => $this->config->item('fb_app_secret'),'default_graph_version' => $this->config->item('fb_default_graph_version')]);
		if($this->session->userdata('is_loggedin') === TRUE){
			if($this->router->class == 'login'){
				if($this->router->method != 'fbconnect'){
					redirect('/user');
				}
			}
		}
		elseif($this->router->class != 'login'){
			$this->session->set_flashdata('warning','Login to continue');
			redirect('/');
		}
	}

	public function render($data = array(),$viewToLoad = false, $onlythis= false)
	{
		if($viewToLoad === false){
			$viewToLoad = $this->router->class."/".$this->router->method;
		}
		$error = $this->session->flashdata('error');
		$success = $this->session->flashdata('success');
		$warning = $this->session->flashdata('warning');
		if(isset($error) && !empty($error)){
			$data['error'] = $error;
		}
		if(isset($success) && !empty($success)){
			$data['success'] = $success;
		}
		if(isset($warning) && !empty($warning)){
			$data['warning'] = $warning;
		}
		if(!$onlythis){$this->load->view('elements/header',$data);}
		$this->load->view($viewToLoad,$data);
		if(!$onlythis){$this->load->view('elements/footer',$data);}
	}

	public function _checkFBSession()
	{
		// Check if fb_access_token exists in CI user-data or not
		if ($this->session->userdata('fb_access_token'))
		{
			// Create new FB session for the fb_access_token
			$this->fb->setDefaultAccessToken($this->session->userdata('fb_access_token'));
			try {
				// Get the Facebook\GraphNodes\GraphUser object for the current user.
				$response = $this->fb->get('/me?fields=id,name,email,picture.type(large),permissions');
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				// When Graph returns an error
				$message = 'Graph returned an error: ' . $e->getMessage();
				log_message('error',$message );
				return false;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
				// When validation fails or other local issues
				$message = 'Facebook SDK returned an error: ' . $e->getMessage();
				log_message('error',$message );
				return false;
			}
			$me = $response->getGraphUser();
			$this->session->set_userdata('fb_userdata',$me->asArray());
			return $me;
		}
		else
		{
			return false;
		}
	}

}
