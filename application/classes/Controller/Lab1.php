<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Lab1 extends Controller_Template {

	private $session;

	public function before() {
		parent::before();

		$this->session = Session::instance();
	}

	protected function getUser($username) {
		$users = json_decode(file_get_contents("users.json"));
		foreach ($users as $index => $user) {
			if ($user->name == $username) {
				return $user;
			}
		}
	}

	protected function getUsers() {
		$users = json_decode(file_get_contents("users.json"));
		return $users;
	}

	protected function addUserName($username) {
		$users = $this->getUsers();
		$user = new stdClass();
		$user->name = strtolower($username);
		$user->token = "";
		array_push($users, $user);
		file_put_contents("users.json", json_encode($users));
	}

	protected function addToken($token) {

		$activeUser = $this->session->get('username');
		$users = $this->getUsers();
		foreach ($users as $index => $user) {
			if ($user->name == $activeUser) {
				$user->token = $token;
			}
		}

		file_put_contents("users.json", json_encode($users));
	}

	public function action_index() {

		$this->template->content = View::factory("lab1/current-users");
		$this->template->content->set("users", $this->getUsers());
	}

	public function action_addUserToken() {

		$code = $this->request->query("code");
		//$code = "ID0LS5VSS4GFBQVWP1KLX5P4DXA2KD3M0M1QS2HGY5UMHJZN";

		if (isset($code)) {
			//make request to https://foursquare.com/oauth2/access_token?client_id=AKEEBQXVGYNERMINA3NV3HMXMG33AJYG5ELXHWSUENELR2CI&client_secret=WGXJU2WCTIF5BYKHYTFMJRI1B3LX4OPXOHR033VMQGIR0YIA&grant_type=authorization_code&redirect_uri=https://54.245.233.32/cs462/index.php/lab1/addUserToken&code=ID0LS5VSS4GFBQVWP1KLX5P4DXA2KD3M0M1QS2HGY5UMHJZN
			$url = "https://foursquare.com/oauth2/access_token?client_id=AKEEBQXVGYNERMINA3NV3HMXMG33AJYG5ELXHWSUENELR2CI&client_secret=WGXJU2WCTIF5BYKHYTFMJRI1B3LX4OPXOHR033VMQGIR0YIA&grant_type=authorization_code&redirect_uri=https://54.245.233.32/cs462/index.php/lab1/addUserToken&code=" . $code;
			var_dump($url);
			die;
			// create curl resource 
			$ch = curl_init();

			// set url 
			curl_setopt($ch, CURLOPT_URL, $url);

			//return the transfer as a string 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			// $output contains the output string 
			$response = curl_exec($ch);

			// close curl resource to free up system resources 
			curl_close($ch);

			$data = json_decode($response);
			//var_dump($data);die;
			$token = $data->access_token;
			$this->addToken($token);
		}

		$activeUser = $this->session->get('username');
		$this->template->content = View::factory("lab1/user-details-self");
		$this->template->content->set('user', $this->getUser($activeUser));
	}

	public function action_create() {
		$this->template->content = View::factory("lab1/create-user");
	}

	public function action_add_user() {
		$post = $this->request->post();
		$username = strtolower($post['username']);
		//check if form username is unique

		$users = $this->getUsers();


		//if it is not unique, reload the create view with error message
		foreach ($users as $index => $user) {
			if ($user->name == $username) {
				$this->template->content = View::factory("lab1/create-user");
				$this->template->content->set("error", "Username already exists");
				return;
			}
		}

		//if it is unique, add to list of names and load current users
		$this->session->set("username", $username);
		$this->addUserName($username);

		$this->template->content = View::factory("lab1/current-users");
		$this->template->content->set("users", $this->getUsers());
	}

	public function action_userDetails() {
		$username = $this->request->param('username');

		$activeUser = $this->session->get('username');

		$user = $this->getUser($username);
		$data = '';
		if ($user->token != "") {
			$url = "https://api.foursquare.com/v2/users/self/checkins?oauth_token=" . $user->token;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec($ch);
			curl_close($ch);

			$data = json_decode($response);
			//var_dump($data);die;
		}

		if ($username == $activeUser) {
			$this->template->content = View::factory("lab1/user-details-self");
			$this->template->content->set('user', $user);
			$this->template->content->set('userdata', $data);
			return;
		}

		//check if current logged in user is selected user.

		$this->template->content = View::factory("lab1/user-details-other");
		$this->template->content->set('user', $user);
		$this->template->content->set('userdata', $data);
	}

	public function action_logout() {

		$this->session->delete("username");
		$this->template->content = View::factory("lab1/current-users");
		$this->template->content->set("users", $this->getUsers());
	}

	public function action_login() {

		$this->template->content = View::factory("lab1/login");
	}

	public function action_login_user() {
		$post = $this->request->post();
		$username = strtolower($post['username']);
		$validUserName = false;

		$users = $this->getUsers();
		foreach ($users as $index => $user) {
			if ($user->name == $username) {
				$validUserName = true;
			}
		}

		if (!$validUserName) {

			$this->template->content = View::factory("lab1/login");
			$this->template->content->set('error', "Not a valid username.");
			return;
		}

		$this->session->set("username", $username);


		$this->template->content = View::factory("lab1/current-users");
		$this->template->content->set("users", $this->getUsers());
	}

}

// End Welcome
