<? defined("FKN") or http_response_code(403).die('Forbidden!');

class eSERVER_PROVIDER
{
    const UNKNOWN                       = 0;
    
    //### DEVELOPERS ###
    const DEVELOPER                     = 10000;
    //F4lk0n (100)
    const DEVELOPER_F4LK0N              = 10100;
    const DEVELOPER_F4LK0N_RAGNAR       = 10101;
    const DEVELOPER_F4LK0N_COMPAQ       = 10102;
    const DEVELOPER_F4LK0N_SPACESTATION = 10103;

    //### COMPANY ###
    const COMPANY                       = 20000;
    //WorkStations (100)
    const COMPANY_WORKSTATION_A         = 20101;
    const COMPANY_WORKSTATION_B         = 20102;
    //Notebooks (200)
    const COMPANY_NOTEBOOK_A            = 20201;
    const COMPANY_NOTEBOOK_B            = 20202;
    //Servers (300)
    const COMPANY_SERVER_A              = 20301;
    const COMPANY_SERVER_B              = 20302;

    //### CLOUD ###
    const CLOUD                         = 30000;
    //King Host (100)
    const CLOUD_KINGHOST                = 30100;
    const CLOUD_KINGHOST_API            = 30101;
    const CLOUD_KINGHOST_WEB            = 30102;
    //Amazon Web Services (200)
    const CLOUD_AWS                     = 30200;
    const CLOUD_AWS_API                 = 30211;
    const CLOUD_AWS_API_STAG            = 30212;
    const CLOUD_AWS_WEB                 = 30211;
    const CLOUD_AWS_WEB_STAG            = 30212;
    //Google Cloud Platform (300)
    const CLOUD_GCP                     = 30300;
}
