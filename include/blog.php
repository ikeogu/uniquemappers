<?php
include_once 'Model.php';

/**
 * 
 */
class Blog extends Model
{

	protected $blog_id;
  	public $image;
  	public $text;
  	public $date;
  	public $title;
  	public $tags;
  	public $name;
 	protected static $class_name = 'Blog';
	protected static $primary_key = 'blog_id';
	protected static $table_name = 'blog';
	protected static $table_fields = array('blog_id','text','image','date','title','name','tags' );

	
	public function getblogid(){
		return $this->blog_id;
	}

	 public function setblogid(){

		if($lastblog = static::last()){
	 		$lastId = explode ('/',$lastblog->blog_id);
	 		$lastId[1]++;
		$this->blog_id = 'blog/0'.$lastId[1];
	 	}else{
			$this->blog_id = 'blog/01'; 
		}

	}

		public function Tellblog(){

	 		// $this->setblogid();	 		
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
	 			if (!isset($this->blog_id)) 
	 				$this->setblogid();

	 			$this->temp_path = $file['tmp_name'];
	 			$this->image = str_replace("/", "_", $this->blog_id).".".basename($file["type"]);
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
	 		$target_path = "../img/blog/".$this->image;
	 		if(move_uploaded_file($this->temp_path, $target_path)){
	 			if(static::find($this->blog_id)){
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