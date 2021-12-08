<?php
require_once(ROOT_PATH ."/Models/Profile.php");
require_once(ROOT_PATH ."/Models/Users.php");
require_once(ROOT_PATH ."/Models/Diary.php");

class DiaryController {
	private $request;
	private $profile;
	private $users;
	private $diary;
	

	public function __construct(){
		$this->request["get"] = $_GET;
		$this->request["post"] = $_POST;
		$this->request["file"] = $_FILES;

		 //モデルオブジェクトの生成
        $this->profile = new Profile();
        $db = $this->profile->get_db_handler();
        $this->users = new Users($db);
        $this->diary = new Diary($db);
	}
	public function updateFavo()
	{
		$this->diary->updateFavo($this->request['get']['id'],$this->request['post']['calender']);
	}
	public function resetFavo()
	{
		if(!isset($this->request['get']['postId']))
		{
			return;
		}
		$this->diary->resetFavo($this->request['get']['id'],
								$this->request['get']['postId']);
	}
	public function getUserIndex()
	{
		return $this->users->getIndex();
	}
	public function getMatchUserIndex()
	{
		return $this->users->getMatchIndex($this->request['post']['email'],$this->request['post']['password']);
	}
	public function getUserIndexByEmail()
	{
		return $this->users->getIndexByEmail($this->request['post']['email']);
	}
	public function registratorUserInfo()
	{
		$this->users->registrator($this->request['post']['email'],$this->request['post']['password']);
	}
	public function getProfileIndexById()
	{
		return $this->profile->getIndexById($this->request['get']['id']);
	}

	public function registratorProfile() {

		$user_id = $this->request['get']['id'];
        $name = $this->request['post']['name'];
        $image = $this->request['file']['image']['name'];
        $spday = $this->request['post']['spday'];
        $users_at = $this->request['post']['users_at'];
        $this->profile->registratorProfile($user_id,$name,$image,$spday,$users_at);
    }

    public function updateProfile() {
    	$this->profile->updateProfile($this->request['get']['id'],
     											  $this->request['post']['name'],
     											  $this->request['file']['image']['name'],
     									          $this->request['post']['spday'],
     									          $this->request['post']['users_at']);
    }

    // week
    public function getindexByDiary(){
    	$user_id = $this->request['get']['id'];
        $memory = $this->request['post']['diary'];
        $image1 = $this->request['file']['image1']['name'];
        $created_at = $this->request['post']['ymd'];
        $this->diary->getindexByDiary($user_id,$memory,$image1,$created_at);
    }

    public function getIndexByDiaryId(){
    	return $this->diary->getIndexByDiaryId($this->request['get']['id'],$this->request['post']['calender']);
    }
    public function updateDiary(){
    	$this->diary->updateDiary($this->request['get']['id'],$this->request['post']['diary'],$this->request['file']['image1']['name'],$this->request['post']['calender']);
    }
    public function getIndexByFavoDiary()
    {
    	return $this->diary->getIndexByFavoDiary($this->request['get']['id']);
    }


}

?>