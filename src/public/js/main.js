

$loader = new Loader();
$loader = new Loader('.a');
$loader = new Loader('main > header');
$loader = new Loader('body > footer');

setTimeout(()=>{
    //(new Loader()).stop();
}, 1000);

setTimeout(()=>{
    //(new Loader('main > header')).stop();
}, 2000);

setTimeout(()=>{
    //(new Loader('body > footer')).stop();
}, 3000);
