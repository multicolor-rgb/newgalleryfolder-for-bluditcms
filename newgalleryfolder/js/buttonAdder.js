if(document.querySelector('#jseditorToolbar')!==null){

    document.querySelector('#jseditorToolbar #jseditorToolbarRight').insertAdjacentHTML('afterbegin','<button class="btn btn-light newgf-btn">Add newGalleryFolder</button>');

    document.querySelector('.newgf-btn').addEventListener('click',(e)=>{

        e.preventDefault();

        value = '<div class="new-gal-tinymce" style="background:#fafafa;border:solid 1px;display:block;padding:100px 15px;text-align:center;">NewGalleryFolder</div><br>';

        tinymce.activeEditor.execCommand('mceInsertContent', false, value);


    })
    
}