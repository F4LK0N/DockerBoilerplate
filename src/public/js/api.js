class API 
{
    host   = 'http://127.0.0.1:8080'
    url    = '/'
    method = 'POST'
    data   = {}
    header = []



    constructor(url='/')
    {
        this.url = url;
    }

    header($key, $value)
    {
        this.xhttp.setHeader($key, $value);
    }

    requestHeader($key, $value)
    {
        this.xhttp.setRequestHeader($key, $value);
    }

    post (data={})
    {
        this.method = 'POST';
        this.data   = data;
        return this.#send();
    }

    #send ()
    {
        return $.ajax({
            method: this.method,
            url: this.host+this.url,
            data: this.data,
            dataType: 'json',
        });
    }

}
