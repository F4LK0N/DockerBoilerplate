class Auth 
{
    static #token  = '';
    static #logged = false;
    static #busy   = false;

    static #transactionStart()
    {
        this.#busy = true;
        (new Loader());
    }
    static #transactionStop()
    {
        (new Loader()).stop();
        this.#busy = false;
    }
    
    static onload() 
    {
        vd('Auth.onload');
        this.#transactionStart();
        let token = localStorage.getItem("token");

        if(token===null){
            this.#transactionStop();
            return;
        }
        this.#token = token;
        this.refresh();
    }

    static token()
    {
        return this.#token;
    }

    static logged()
    {
        return this.#logged;
    }

    static login($button)
    {
        vd('Auth.login');
        //this.#transactionStart();

        let $auth = this;

        (new API('/')).post();
        (new API('/users/')).post();
        (new API('/users/view/1')).post();
        (new API('/users/add')).post();
        (new API('/users/edit/1')).post();
        (new API('/users/rem/1')).post();

        ////API
        //(new API('/users/'))
        //.post(

        //)
        //.error((jqXHR, textStatus, errorThrown)=>{
        //    console.error('error');
        //    console.log(jqXHR);
        //    console.log(textStatus);
        //    console.log(errorThrown);
        //})
        //.success((data, textStatus, jqXHR)=>{
        //    console.warn();('success');
        //    console.log(data);
        //    console.log(textStatus);
        //    console.log(jqXHR);
        //})
        //.complete((jqXHR, textStatus)=>{
        //    console.warn();('complete');
        //    console.log(jqXHR);
        //    console.log(textStatus);
        //    $auth.#transactionStop();
        //});

    }

    static refresh()
    {
        vd('Auth.refresh');
        this.#transactionStart();

        //API
        setTimeout(()=>{

            vd('Auth.refresh OK');
            this.#token = Date.now();
            localStorage.setItem("token", this.#token);
            this.#transactionStop();

        }, 200);
    }

}

let WINDOWS_LOADED = false;
window.onload = function()
{
    if(WINDOWS_LOADED){
        return;
    }
    WINDOWS_LOADED = true;

    vd('windows.onload');
    Auth.onload();
};
