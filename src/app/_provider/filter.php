<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Filter\FilterFactory;
use Phalcon\Filter\Filter;

PROVIDER::SET(
    'filter',
    function ()
    {
        $factory = new FilterFactory();
        /**
          * @var Filter
          */
        $filter = $factory->newInstance();


        $filter->set('spaces', function ($input)
        {
            while(strpos($input, ' ')!==false){
                $input = str_replace(' ', '', $input);
            }
            return $input;
        });


        return $filter;
    }
);
