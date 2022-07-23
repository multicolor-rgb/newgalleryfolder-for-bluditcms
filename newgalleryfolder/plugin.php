<?php


    

class newGalleryFolder extends Plugin {

 

    public function init()
	{
		$this->dbFields = array(
			'label'=>'',
			'slugpages'=>'',
            'widththumb'=>'',
            'heightthumb'=>'',
            'gapgallery'=>'',
            'columngallery'=>'',
            'showautomatic'=>'',
            'showall'=>'',
            'border'=>'0px',
            'bordercolor'=>'#fff',
            'hover'=>'',
            'thumbnailsfolder'=>''
		);

        $this->customHooks = array(
            'showgallery'
           
        );

	}

    public function adminBodyEnd(){
        if($this->getValue('showautomatic')=='paste'){
        echo '<script src="'.$this->domainPath().'js/buttonAdder.js"></script>';
    } 

    }


 

    public function siteHead() {
        echo '<link rel="stylesheet" href="'.$this->domainPath().'css/glightbox.min.css">';
        echo '<link rel="stylesheet" href="'.$this->domainPath().'css/style.css?v=3">';

   

    }

   

    public function siteBodyEnd() {
        echo '<script src="'.$this->domainPath().'js/glightbox.min.js"></script>';
        echo '<script src="'.$this->domainPath().'js/script.js"></script>';

        if($this->getValue('showautomatic')=='paste'){

        echo "<script>if(document.querySelector('.new-gal-tinymce')!==null){

            const nge = document.querySelector('.new-gal-tinymce');
            const ngf = document.querySelector('.newGalleryFolder');
            
            document.querySelector('.new-gal-tinymce').outerHTML = `<div class='new-gal-tinymce'></div>`;
            document.querySelector('.new-gal-tinymce').append(ngf);
            
            }</script>";

        };

    }
 
 

    public function showgallery(){

        $countx=0;

        if($this->getValue('showautomatic')=='disable'){
        global $page;
        $sluger = $page->slug();
       $valueslugpages = $this->getValue('slugpages');
       $pageId = $page->uuid();


       if($this->getvalue('showall')=='all'){
       include($this->phpPath().'php/newGalleryFunction.php');
       };




     
       if($this->getvalue('showall')=='chosen'){
        if(strpos($this->getValue('slugpages'), $sluger) !== false){
        include($this->phpPath().'php/newGalleryFunction.php');
         }
        };


        }


    }


   

    //frontautomatic




        public function pageBegin(){

            $countx=0;

            if($this->getValue('showautomatic')=='paste'){
                global $page;
                $sluger = $page->slug();
               $valueslugpages = $this->getValue('slugpages');
               $pageId = $page->uuid();
        
                include($this->phpPath().'php/newGalleryFunction.php');
             }

       

            if($this->getValue('showautomatic')=='begin'){
            global $page;
            $sluger = $page->slug();
           $valueslugpages = $this->getValue('slugpages');
           $pageId = $page->uuid();
    



  
           if($this->getvalue('showall')=='all'){

            include($this->phpPath().'php/newGalleryFunction.php');

           };


       


         
           if($this->getvalue('showall')=='chosen'){
            if(strpos($this->getValue('slugpages'), $sluger) !== false){

                include($this->phpPath().'php/newGalleryFunction.php');

             }
           };


    }
    }

 
       public function pageEnd(){
        $countx=0;
            
        if($this->getValue('showautomatic')=='end'){
            global $page;
            $sluger = $page->slug();
           $valueslugpages = $this->getValue('slugpages');
           $pageId = $page->uuid();
    
 
           if($this->getvalue('showall')=='all'){
  
            include($this->phpPath().'php/newGalleryFunction.php');

       };




     
       if($this->getvalue('showall')=='chosen'){
        if(strpos($this->getValue('slugpages'), $sluger) !== false){

            include($this->phpPath().'php/newGalleryFunction.php');
 
         }
       };



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
        
        <code> &lt;?php Theme::plugins('showgallery') ?&gt;</code> or use settings on <b>Show automatic on top or down page</b> input

        <br>
        <br>

        <h4>What next?</h4>


        <ul style='margin:0;padding:0;margin-left:15px;list-style-type:square;'>
        <li>Upload photos by adding them from the page tab as usual. Every Page generates own gallery.</li>
        <li>Enter friendly URL names of the pages on which the gallery is to be displayed</li>
        </ul>
     
        </div>
        ";

        $html .='
        <label>Show on every pages or only chosen</label>
        <select name="showall">
<option value="all" '.($this->getValue('showall')==="all"?"selected":"").'>All pages/articles</option>
<option value="chosen" '.($this->getValue('showall')==="chosen"?"selected":"").'>Chosen pages/articles</option>
 
        </select>
        ';

        $html .= '<label>Write the Friendly URL names (you find correct on page options, seo sections)</label>';
		$html .= '<input type="text" name="slugpages" placeholder="about,more,homepage" value="'.$this->getValue('slugpages').'">';


        $html .='
        <label>Show automatic on top or down page</label>
        <select name="showautomatic">
<option value="disable" '.($this->getValue('showautomatic')==="disable"?"selected":"").'>show only with function in template</option>
<option value="begin" '.($this->getValue('showautomatic')==="begin"?"selected":"").'>Begin on page content</option>
<option value="end" '.($this->getValue('showautomatic')==="end"?"selected":"").'>End of page content</option>
<option value="paste" '.($this->getValue('showautomatic')==="paste"?"selected":"").'>Can add inside tinymce</option>

        </select>
        ';

        $html .= '<label>width thumbnails</label>';
		$html .= '<input type="text" name="widththumb" placeholder="300px" value="'.$this->getValue('widththumb').'">';

        $html .= '<label>height thumbnails</label>';
		$html .= '<input type="text" name="heightthumb" placeholder="300px" value="'.$this->getValue('heightthumb').'">';


      
        
        
        $html .= '<label>gap gallery</label>';
		$html .= '<input type="text" name="gapgallery" placeholder="20px" value="'.$this->getValue('gapgallery').'">';

                
        $html .= '<label>column gallery</label>';
		$html .= '<input type="text" name="columngallery" placeholder="1-10" value="'.$this->getValue('columngallery').'">';



        $html .= '<div class="bg-light border mt-4 p-3"><h4>Thumbnails Settings</h4><label>Border thumbnails</label>';
		$html .= '<input type="text" name="border" placeholder="20px" class="form-control" value="'.$this->getValue('border').'">';

        $html .= '<label>Border color thumbnails</label>';
		$html .= '<input type="color" name="bordercolor" class="form-control form-color" placeholder="20px" value="'.$this->getValue('bordercolor').'">';


        $html .='
        <label>Hover effect</label>
        <select name="hover">
<option value="off" '.($this->getValue('hover')==="off"?"selected":"").'>no effect</option>
<option value="light" '.($this->getValue('hover')==="light"?"selected":"").'>light effect</option>
<option value="dark" '.($this->getValue('hover')==="dark"?"selected":"").'>dark effect</option>
        </select>

        <br>

        <p>Choose thumbnails generated (original thumbnails from bludit, or generated from plugin)</p>
        <select name="thumbnailsfolder">
       <option value="automatic" '.($this->getValue('thumbnailsfolder')==="automatic"?"selected":"").'>Thumbnails automatic (larger size)</option>
       <option value="bludit" '.($this->getValue('thumbnailsfolder')==="bludit"?"selected":"").'>Thumbails from bludit</option>
        </select>

        </div>
        ';

 

        
        $html .= '
        
       

            <div class="bg-danger text-light col-md-12 mt-5 py-3 d-block border text-center">

      
            <p class="lead">Created by <b>multicolor</b> | Buy me coffe ❤️  </p>

            <a href="https://www.paypal.com/donate/?hosted_button_id=TW6PXVCTM5A72">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"  />
            </a>

            </div>

          
   
        
        ';


		return $html;




     
	}



}
?>