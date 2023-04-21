<? defined("FKN") or http_response_code(403).die('Forbidden!');

return [
    
    'name' => 'api',
    'domain' => '127.0.0.1:8080',

    'session-token-key' => 'API_SESSION',
    
    'title' => 'API',
    'description' => 'Falkon Back End Framework',
    
    'google-tag-manager-id' => 'GTM-XXXXXXX',

    'facebook-id' => 'api',
    'facebook-url' => 'facebook.com/api',
    
    'twitter-id' => 'api',
    'twitter-url' => 'twitter.com/api',
    
];
