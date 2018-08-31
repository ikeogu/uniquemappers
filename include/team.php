<?php
include_once 'Model.php';
 

/**
* 
*/
class Team extends Model
{
	protected $member_id;
	public $first_name;
	public $last_name;
	public $email;
	public $phone;
	public $dept;
	public $date_you_joined;
	public $passport;
	public $osm_userName;
	public $age;
	public $faculty;
	public $level;
	public $sex;
	public $matno;
	public $PC;
	public $member_category;
	public $terms;


	public static $class_name = 'Team';
	public static $table_name  = 'team_member';
	public static $primary_key = 'member_id'; 
	public static $table_fields = array ('member_id','first_name','last_name','email','phone','dept','date_you_joined','passport','osm_userName','age','faculty','level','sex','matno','member_category','PC','terms');


	public function __construct()
	{
		# code...
		parent::__construct();

	}

	public function getTeamid(){
		return $this->member_id;
	}

	 public function setTeamid(){

		if($lastmember = static::last()){
	 		$lastId = explode ('/',$lastmember->member_id);
	 		$lastId[1]++;
		$this->member_id = 'team/00'.$lastId[1];
	 	}else{
			$this->member_id= 'team/001'; 
		}

	}

		public function BeAMember(){

	 		// $this->setStoryid();	 		
	 		return ($this->create())? true : false;
	 	}

	 	protected $upload_errors = array (
	 		UPLOAD_ERR_OK         => "No errors.",
	 		UPLOAD_ERR_INI_SIZE   => "Larger than upload_max_filesize.",
	 		UPLOAD_ERR_FORM_SIZE  => "Larger than form MAX_FILE_SIZE.",
	 		UPLOAD_ERR_PARTIAL    => "Partial upload",
	 		UPLOAD_ERR_NO_FILE    =>  "No file.",
	 		UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
	 		UPLOAD_ERR_CANT_WRITE => "Cant write to disk.",
	 		UPLOAD_ERR_EXTENSION  => "File upload stopped by extension." );

	 	

	 	public function  attach_file($file){
	 		//recieves $_file ('UPLOADED  FILE')
	 		//ERROR CHECKNG , SET OJESCT ATTRIBUTESss
	 		if(!$file || empty($file) || !is_array($file)){
	 			$this->errors[] = "No file was uploaded. ";
	 			return  false;
	 		}elseif($file['error'] != 0){
	 			$this->errors[] = $this->upload->errors[$file['error']];
	 			return  false;
	 		}else{
	 			if (!isset($this->member_id)) 
	 				$this->setTeamid();

	 			$this->temp_path = $file['tmp_name'];
	 			$this->passport = str_replace("/", "_", $this->member_id).".".basename($file["type"]);
	 			$this->type = $file['type'];
	 			$this->size = $file['size'];
	 			return true;
	 		}
	 	}

	 	public function save_with_file(){

	 		if(!empty($this->errors)){return false;}
	 		if(empty($this->passport) || empty($this->temp_path)){
	 			$this->errors[] = "The file location was not avaliable.";
	 			return false;
	 		}
	 		$target_path = "img/team_members/".$this->passport;
	 		if(move_uploaded_file($this->temp_path, $target_path)){
	 			if(static::find($this->member_id)){
	 				$this->update();
	 			}
	 			else{

	 				$this->create();
	 			}
	 			unset($this->temp_path);
	 			return true;
	 		}else {
	 			$this->errors[]= "The file uploade failed, possible due to incorrect permission on the upload folder";
	 			return false;
	 		}
	 	}

	 	public static function FindByEmail($email){
	 		$sql = "SELECT * FROM ".static::$table_name." WHERE email = '$email'    AND  LIMIT 1";
	 		$member = static::findBySql($sql);
	 		return ($member) ? array_shift($member) : false;
	 	}
	 	

		 public static function authenticate($email){
       
            $sql = " SELECT * FROM ".static::$table_name." WHERE email  = '$email' AND  LIMIT 1";
            $member = static::findBySql($sql);
            return ($member) ? array_shift($member) : false;
        }

	
}





?>