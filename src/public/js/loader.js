class Loader
{
    #targetOriginalPosition='';
    #$target = null
    #$overlay = null

    constructor($target=null)
    {
        this.#$target = $target;
        this.#load();
        this.start();
    }

    #load()
    {
        if(this.#$target===null){
            this.#$target = $("html > body");
        }
        else if(typeof this.#$target === 'string'){
            this.#$target = $(this.#$target);
        }

        if(this.#$target.length===1){
            this.#$overlay = this.#$target.find("> .loader");
        }
    }

    start()
    {
        if(this.#$overlay!==null && this.#$overlay.length===0){
            this.#targetOriginalPosition = this.#$target.css('position');
            this.#$target.css('position', 'relative');
            this.#$target.prepend("<div class='loader'><img src='"+HTML_IMG+"/loader.gif'></div>");
            this.#$overlay = this.#$target.find("> .loader");
        }
        this.#adjustImage();
    }

    #adjustImage()
    {
        if(this.#$overlay!==null && this.#$overlay.length===1){
            let overlayWidth  = this.#$overlay.width();
            let overlayHeight = this.#$overlay.height();
            let imageMaxSize = overlayWidth;
            if(imageMaxSize > overlayHeight){
                imageMaxSize = overlayHeight;
            }
            imageMaxSize = Math.floor(imageMaxSize * 0.8);

            let $image = this.#$overlay.find('img');
            let imageSize = 100;
            if(imageSize>imageMaxSize){
                imageSize = imageMaxSize;
            }
            $image.css('width', imageSize);
            $image.css('height', imageSize);

            let margin = Math.floor((overlayHeight - imageSize) / 2);
            let marginMaxSize = Math.floor(($("body").innerHeight()/2)-(imageSize/2));
            if(margin>marginMaxSize){
                margin=marginMaxSize;
            }
            $image.css('margin-top', margin);
        }
    }

    stop()
    {
        if(this.#$overlay!==null && this.#$overlay.length===1){
            if(this.#targetOriginalPosition!==''){
                this.#$target.css('position', this.#targetOriginalPosition);
                this.#targetOriginalPosition='';
            }
            this.#$overlay.remove();
            this.#$overlay=null;
        }
    }
    
}
