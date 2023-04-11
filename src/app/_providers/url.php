<?php
use Phalcon\Mvc\Url;

PROVIDERS::SET(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri(HTML_ROOT);
        return $url;
    }
);
