<? defined("FKN") or http_response_code(403).die('Forbidden!');

enum eSTATUS_CODES: int
{
    const SUCCESS = 1;
    const ERROR   = 0;
}

class eERROR_CODES
{
    const NO_ERROR      = 0;
    const GENERIC_ERROR = 1;

    //CONTROLLERS
    const CONTROLLER             = 10000000; //Generic Controller Error.
    const CONTROLLER_INPUT       = 11000000; //Error on the input (get, filter or validate)
    const CONTROLLER_NOT_FOUND   = 12000000; //When required, the register was not found on db.
    const CONTROLLER_RULE        = 13000000; //When set, some model rule was not complied.
    const CONTROLLER_TRANSACTION = 14000000; //When set, the db transaction has an error (querying, saving, updating, deleting)
    const CONTROLLER_ENCODE      = 15000000; //Error encoding the response in JSON format.

    //MODELS
    const MODEL                  =   100000; //Generic Controller Error.
    const MODEL_INPUT            =   110000; //Error on the input (get, filter or validate)
    const MODEL_NOT_FOUND        =   120000; //When required, the register was not found on db.
    const MODEL_RULE             =   130000; //When set, some model rule was not complied.
    const MODEL_TRANSACTION      =   140000; //When set, the db transaction has an error (querying, saving, updating, deleting)
    const MODEL_ENCODE           =   150000; //Error encoding the response in JSON format.

    //INPUT
    const INPUT                  =     1000; //Generic Input Error.
    const INPUT_CONFIG           =     1100; //Invalid Config
    const INPUT_METHOD           =     1200; //Incorrect method used.
    const INPUT_RETRIEVE         =     1300; //Cannot Retrieve
    const INPUT_FILTER           =     1400; //Filter Error
    const INPUT_VALIDATION       =     1500; //Validation Error
}
