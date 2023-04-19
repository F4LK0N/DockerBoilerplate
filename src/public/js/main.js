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

        this.login();
    }

    static token()
    {
        return this.#token;
    }

    static logged()
    {
        return this.#logged;
    }

    static userId = 1;
    
    
    static login($button)
    {
        vd('Auth.login');
        //this.#transactionStart();
        let $auth = this;

            ////INDEX
            //(new API('/')).post();
            
            ////USERS
            //(new API('/users/')).post();
            //(new API('/users/view/'+$auth.userId)).post();

            (new API('/users/add')).post({
                email: 'user'+(Date.now())+'@gmail.com',
                pass: 'teste132',
                name: 'name'+(Date.now()),
                surname: 'surname'+(Date.now()),
            }).done((response)=>{$auth.userId = response.data.id;});
            
            //(new API('/users/add')).post({
            //    email: 'otaviosoria@gmail.com',
            //    pass: '123456',
            //    name: 'Otavio',
            //    surname: 'Soria',
            //}).done((response)=>{$auth.userId = response.data.id;});
            //(new API('/users/edit/'+$auth.userId)).post();
            //(new API('/users/rem/60')).post();
            //(new API('/users/rem/1')).post();

            //AUTH
            (new API('/auth/login')).post({
                email: 'otaviosoria@gmail.com',
                pass: '123456',
            });

        ////API
        //(new API('/users/'))
        //.post(
        //)
        //.fail((jqXHR, textStatus, errorThrown)=>{
        //    console.error('fail');
        //    //console.log(jqXHR);
        //    //console.log(textStatus);
        //    console.log(errorThrown);
        //})
        //.done((data, textStatus, jqXHR)=>{
        //    console.warn();('done');
        //    console.log(data);
        //    //console.log(textStatus);
        //    //console.log(jqXHR);
        //})
        //.always((data, textStatus)=>{
        //    console.warn();('always');
        //    console.log(data);
        //    //console.log(textStatus);
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
