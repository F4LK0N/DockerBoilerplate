<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Filter\FilterFactory;
use Phalcon\Filter\Filter;

PROVIDER::SET_SHARED(
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

        $filter->set('double-spaces', function ($input)
        {
            while(strpos($input, '  ')!==false){
                $input = str_replace('  ', ' ', $input);
            }
            return trim($input);
        });

        $filter->set('php', function ($input)
        {
            while(strpos($input, '<?')!==false){
                $input = str_replace('<?', '', $input);
            }
            while(strpos($input, '?>')!==false){
                $input = str_replace('?>', '', $input);
            }
            return trim($input);
        });

        $filter->set('injection', function ($input)
        {
            $pattern = '/(\"|\'|\`|\´|\/|\||\;|\:)/';
            while(1===preg_match($pattern, $input)){
                $input = preg_replace($pattern, '', $input);
            }
            while(strpos($input, '\\')!==false){
                $input = str_replace('\\', '', $input);
            }

            $input = PROVIDER::GET('filter')->sanitize($input, ['php']);
            return $input;
        });

        $filter->set('strict', function ($input)
        {
            $pattern = '/(\^|\~|\*|\(|\)|\?|\{|\}|\[|\]|\=|\°|\º|\ª|\§|\¬|\¨|\£|\,|\.|\+|\<|\>|\#|\&|\¹|\²|\³|\¢|\@|\!|\$|\%)/';
            while(1===preg_match($pattern, $input)){
                $input = preg_replace($pattern, '', $input);
            }

            $input = PROVIDER::GET('filter')->sanitize($input, ['injection']);
            return $input;
        });



        return $filter;
    }
);
