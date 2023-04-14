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
        this.#transactionStart();

        //API
        setTimeout(()=>{

            vd('Auth.login OK');
            
            this.#token = Date.now();
            localStorage.setItem("token", this.#token);
            this.#transactionStop();

            window.location = HTML_ROOT;

        }, 3000);
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

        }, 3000);
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
