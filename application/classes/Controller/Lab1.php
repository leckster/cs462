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
		foreach ($users as $index => $user){
			if($user->name == $username) {
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

	public function action_index() {

		$this->template->content = View::factory("lab1/current-users");
		$this->template->content->set("users", $this->getUsers());
	}
	
	public function action_addUserToken() {
		var_dump($this->request);
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
		
		if($username == $activeUser) {
			$this->template->content = View::factory("lab1/user-details-self");
			$this->template->content->set('user', $this->getUser($username)); 
			return;
		}
		
		//check if current logged in user is selected user.

		$this->template->content = View::factory("lab1/user-details-other");
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
