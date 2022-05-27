<?php


    

class newGalleryFolder extends Plugin {


    public function init()
	{
		$this->dbFields = array(
			'label'=>'Static Pages',
			'slugpages'=>'',
            'widththumb'=>'',
            'heightthumb'=>'',
            'gapgallery'=>'',
            'columngallery'=>'',
		);

        $this->customHooks = array(
            'showgallery',
           
        );

	}


 

    public function siteHead() {
        echo '<link rel="stylesheet" href="'.$this->domainPath().'css/glightbox.min.css">';
        echo '<link rel="stylesheet" href="'.$this->domainPath().'css/style.css">';
    }

    public function siteBodyEnd() {
        echo '<script src="'.$this->domainPath().'js/glightbox.min.js"></script>';
        echo '<script src="'.$this->domainPath().'js/script.js"></script>';


     
    }
 






    public function showgallery()
    {
        global $page;
        $sluger = $page->slug();
       $valueslugpages = $this->getValue('slugpages');
       $pageId = $page->uuid();

        if(strpos($this->getValue('slugpages'), $sluger) !== false){

     
       $allPage = '.'.HTML_PATH_UPLOADS_PAGES.$pageId.'';
 
   
 
     echo '<div class="newGalleryFolder" style="width:100%;display:grid;grid-template-columns:repeat('.$this->getValue('columngallery').',1fr);grid-gap:'.$this->getValue('gapgallery').';">';
     foreach(glob($allPage."/*.{jpg,png,jpeg,gif,bmp}", GLOB_BRACE) as $file)
     if($file != '.' && $file != '..'&& $file != '' ){
     $thumb = str_replace('.'.$allPage.'/',$allPage.'/thumbnails.',$file);
     echo'';
     echo '<a href="'.DOMAIN.$file.'" class="glightbox" data-gallery="gallery1">';
     echo'<img src="'.DOMAIN.$thumb.'"  style="max-width:100%;width:'.$this->getValue('widththumb').';height:'.$this->getValue('heightthumb').';display:block;object-fit:cover;object-position:center center;"  alt="image"/>';  
     echo'</a>';  
     };
     echo'</div>';

    }

 
    }


    //settings
    
	public function form()
	{
		global $L;

        $html = '<div class="bg-light border p-4"><h4>How to use it?</h4>';
        $html .= "
        
        <p class='lead'>This very easy plugin create gallery from upload photos</p>

        <p>Put this code on your template where you want to show gallery</p>
        
        <code> &lt;?php Theme::plugins('showgallery') ?&gt;</code>

        <br>
        <br>

        <h4>What next?</h4>


        <ul style='margin:0;padding:0;margin-left:15px;list-style-type:square;'>
        <li>Upload photos by adding them from the page tab as usual. Every Page generates own gallery.</li>
        <li>Enter the slug of the page on which the gallery is to be displayed</li>
        </ul>
     
        </div>
        ";

        $html .= '<label>Write the slug of the pages on which the gallery should appear</label>';
		$html .= '<input type="text" name="slugpages" placeholder="about,more,homepage" value="'.$this->getValue('slugpages').'">';

        $html .= '<label>width thumbnails</label>';
		$html .= '<input type="text" name="widththumb" placeholder="300px" value="'.$this->getValue('widththumb').'">';

        $html .= '<label>height thumbnails</label>';
		$html .= '<input type="text" name="heightthumb" placeholder="300px" value="'.$this->getValue('heightthumb').'">';

        
        $html .= '<label>gap gallery</label>';
		$html .= '<input type="text" name="gapgallery" placeholder="20px" value="'.$this->getValue('gapgallery').'">';

                
        $html .= '<label>column gallery</label>';
		$html .= '<input type="text" name="columngallery" placeholder="1-10" value="'.$this->getValue('columngallery').'">';

        $html .= '
        
       

            <div class="bg-light col-md-12 mt-5 py-3 d-block border">

      
            <p>If you want support my work, and you want saw new plugins:) </p>

            <a href="https://www.paypal.com/donate/?hosted_button_id=TW6PXVCTM5A72">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"  />
            </a>

            </div>

          
   
        
        ';


		return $html;




     
	}



}
?>