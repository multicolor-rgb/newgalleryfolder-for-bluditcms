 
 <style>

.newgallery-foto{
    transition: all 250ms linear;

    <?php 
    if($this->getValue('border')!=='0px'){
        echo 'border: solid '.$this->getValue('border').' '.$this->getValue('bordercolor');
    }

    ;?>

}


.newgallery-foto:hover{

    <?php

if($this->getValue('hover')=='dark'){
    echo 'filter: brightness(80%);';
}elseif($this->getValue('hover')=='light'){
    echo 'filter: brightness(130%);';
};

;?>
    

}

    </style>

    <?php
  
          
       

    $allPage = '.'.HTML_PATH_UPLOADS_PAGES.$pageId.'';
        
          
        echo '<div class="newGalleryFolder" style="width:100%;display:grid;grid-template-columns:repeat('.$this->getValue('columngallery').',1fr);grid-gap:'.$this->getValue('gapgallery').';">';
        foreach(glob($allPage."/*.{jpg,png,jpeg,gif,bmp}", GLOB_BRACE) as $file)
     
        if($file != '.' && $file != '..'&& $file != '' ){
        $thumb = str_replace($pageId.'/',$pageId.'/thumbnails/',$file);
        echo'';
        echo '<a href="'.DOMAIN.$file.'" class="glightbox" data-gallery="gallery1">';
        echo'<img src="'.DOMAIN.$thumb.'"  class="newgallery-foto" style="max-width:100%;width:'.$this->getValue('widththumb').';height:'.$this->getValue('heightthumb').';display:block;object-fit:cover;object-position:center center;"  alt="'.$sluger.'-'.$countx.'"/>';  
        echo'</a>';  
        $countx++;
        };
        echo'</div>';



        ;?>