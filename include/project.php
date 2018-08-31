<?php 
 include_once 'model.php';

 /**
 * 
 */
 class Project extends Model
 {
 	public $project_id;
 	public $name;
 	public $date;
 	public $subheading;
 	public $body;
 	public $passport;

 	protected static $primary_key = 'project_id';
 	protected static $table_name = 'project';
 	protected static $class_name = 'Project';
 	protected static $table_fields = array('project_id','name','date','subheading','body', 'passport');
 	
 	function __construct()
 	{
 		# code...
 		parent::__construct();
 	}

 	public function getProjectid(){
		return $this->product_id;
	}

	 public function setProjectid(){

		if($lastmember = static::last()){
	 		$lastId = explode ('/',$lastmember->project_id);
	 		$lastId[1]++;
		$this->project_id = 'prj/00'.$lastId[1];
	 	}else{
			$this->project_id= 'prj/001'; 
		}

	}

			protected $upload_errors = array (
	 		UPLOAD_ERR_OK         => 'No errors.',
	 		UPLOAD_ERR_INI_SIZE   => 'Larger than upload_max_filesize.',
	 		UPLOAD_ERR_FORM_SIZE  => 'Larger than form MAX_FILE_SIZE.',
	 		UPLOAD_ERR_PARTIAL    => 'Partial upload',
	 		UPLOAD_ERR_NO_FILE    =>  'No file.',
	 		UPLOAD_ERR_NO_TMP_DIR => 'No temporary directory.',
	 		UPLOAD_ERR_CANT_WRITE => 'Cant write to disk.',
	 		UPLOAD_ERR_EXTENSION  => 'File upload stopped by extension.' );

	 	

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
	 			if (!isset($this->project_id)) 
	 				$this->setProjectid();

	 			$this->temp_path = $file['tmp_name'];
	 			$this->passport = str_replace('/', '_', $this->project_id).'.'.basename($file['type']);
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
	 		$target_path = "../img/logo/".$this->passport;
	 		if(move_uploaded_file($this->temp_path, $target_path)){
	 			if(static::find($this->project_id)){
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
		
		public static function project(){
			$pro = '';
			$pro.="<section class='testimonials3 cid-qxFmUG73Xe' id='testimonials3-4' data-rv-view='872'>
							<center><h3><strong>Achievement</strong></h3></center>";
			             if($all = static::All())
                    
                    		foreach ($all as $project){
                    			$pro.=" <div class='container ' style='border: 3px solid black; padding : 50px;'>
			                               <div class='media-container-row'>
			                                  <div class='media-content px-3 align-self-center mbr-white py-2'>
				                              <h3 class=''>$project->name.</h3>
				            
					                           <h4 class='subheading'>$project->subheading</h4>
				                             <p class='text-muted'>$project->body</p>
				                             <h4>$project->date</h4>
			                
			                                </div>

			                                <div class='mbr-figure pl-lg-5' style='width: 80%;'>
			                                <img src='img/logo/$project->passport' alt='' title='' media-simple='true' height='250px'>
			                                </div>
			                            </div>
	                                </div>
                    			";
			              }
			              $pro.="
			               	<div class='timeline-image'>
                  					<h4>Be Part
                    				<br>Of Our
                    				<br>Story!</h4>
                				</div>
              				</section>";
			    echo "$pro";
		}
 }
 				

    

    

    



?>