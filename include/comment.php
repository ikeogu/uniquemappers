<?php
include_once 'Model.php';

/**
 * 
 */
class Comment extends Model
{

	public $comment_id;
  	public $image;
  	public $text;
  	public $date;
  	public $name;
 	protected static $class_name = 'Comment';
	protected static $primary_key = 'comment_id';
	protected static $table_name = 'comment';
	protected static $table_fields = array('comment_id','text','image','date','name' );

	
	public function getcommentid(){
		return $this->comment_id;
	}

	 public function setcommentid(){

		if($lastcomment = static::last()){
	 		$lastId = explode ('/',$lastcomment->comment_id);
	 		$lastId[1]++;
		$this->comment_id = 'comment/00'.$lastId[1];
	 	}else{
			$this->comment_id = 'comment/01'; 
		}

	}

		public function Tellcomment(){

	 		// $this->setcommentid();	 		
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
	 			if (!isset($this->comment_id)) 
	 				$this->setcommentid();

	 			$this->temp_path = $file['tmp_name'];
	 			$this->image = str_replace("/", "_", $this->comment_id).".".basename($file["type"]);
	 			$this->type = $file['type'];
	 			$this->size = $file['size'];
	 			return true;
	 		}
	 	}

	 	public function save_with_file(){

	 		if(!empty($this->errors)){return false;}
	 		if(empty($this->image) || empty($this->temp_path)){
	 			$this->errors[] = "The file location was not avaliable.";
	 			return false;
	 		}
	 		$target_path = "img/comment/".$this->image;
	 		if(move_uploaded_file($this->temp_path, $target_path)){
	 			if(static::find($this->comment_id)){
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