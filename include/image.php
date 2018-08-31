<?php 
 include_once 'model.php';

 /**
 * 
 */
 class Image extends Model
 {
 	public $image_id;
 	public $name;
 	public $passport;
 	public $date;
 	public $title;
 	
 	

 	protected static $primary_key = 'image_id';
 	protected static $table_name = 'image';
 	protected static $class_name = 'Image';
 	protected static $table_fields = array('image_id','name','passport','date','title');
 	
 	public function __construct(){
		parent::__construct();
	}
	   
	

 	public function getImageId(){
		return $this->image_id;
	}

	 public function setImageId(){

		if($lastmember = static::last()){
	 		$lastId = explode ('/',$lastmember->image_id);
	 		$lastId[1]++;
		$this->image_id = 'Img/0'.$lastId[1];
	 	}else{
			$this->image_id= 'Img/01'; 
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
	 			if (!isset($this->image_id)) 
	 				$this->setImageId();

	 			$this->temp_path = $file['tmp_name'];
	 			$this->passport = str_replace('/', '_', $this->image_id).'.'.basename($file['type']);
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
	 		$target_path = "../img/eventpix/".$this->passport;
	 		if(move_uploaded_file($this->temp_path, $target_path)){
	 			if(static::find($this->image_id)){
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




    public static function img(){

    	$pix="<section class='main-section paddind' id='Portfolio'>
				<!--main-section-start-->
				<div class='container'>
					<h2>Portfolio</h2>
					<h6>The UniqueMappersTeam gallery.</h6>";

					if($all = static::All())
				$pix.="	<div class='portfolioFilter'>
						<ul class='Portfolio-nav wow fadeIn delay-02s'>
							<li><a href='#' data-filter='*' >All</a></li>
							<li><a href='#' data-filter='.branding'>Let Girls map</a></li>
							<li><a href='#' data-filter='.webdesign'>Let's map Our World</a></li>
							<li><a href='#' data-filter='.printdesign'>Events</a></li>
							<li><a href='# data-filter='.photography'>Award</a></li>
						</ul>
					</div>
				</div>";
				
				 	foreach ($all as $image){
				 	$pix.="<div class='portfolioContainer wow fadeInUp delay-04s'>
								<div class=' Portfolio-box printdesign'>
									<a href='img/eventpix/$image->passport'><img src='img/eventpix/$image->passport' alt=''></a>
								<h3>$image->name</h3>
							</div>";
					}
					$pix.="	</div>
			</section>";
			echo "$pix";
    }


	}
	 	
		?>