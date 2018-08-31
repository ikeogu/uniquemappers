<?php
include_once 'Model.php';

/**
* 
*/
class Interview extends Model
{
	protected $interview_id;
	public $name;
	public $mapping;
	public $joined;
	public $mapped;
	public $dept;
	public $software;
	public $hcourse;
	public $lcourse;
	public $cgpa;
	public $level;
	public $errors = array();
	


	public static $class_name = 'Interview';
	public static $table_name  = 'interview';
	public static $primary_key = 'interview_id'; 
	public static $table_fields = array ('interview_id','name','mapped','mapping','dept','level','hcourse','lcourse','software','cgpa','level');


	public function __construct()
	{
		# code...
		parent::__construct();

	}

	public function getInterviewid(){
		return $this->interview_id;
	}

	 public function setInterviewid(){

		if($lastmember = static::last()){
	 		$lastId = explode ('/',$lastmember->interview_id);
	 		$lastId[1]++;
		$this->interview_id = 'intv/00'.$lastId[1];
	 	}else{
			$this->interview_id= 'intv/001'; 
		}

	}

		public function interview(){

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
	 			if (!isset($this->interview_id)) 
	 				$this->setInterviewid();

	 			$this->temp_path = $file['tmp_name'];
	 			$this->passport = str_replace("/", "_", $this->interview_id).".".basename($file["type"]);
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
	 			if(static::find($this->interview_id)){
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

	
}





?>