<?php
use Phalcon\Mvc\Url;

PROVIDER::SET(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri(HTML_ROOT);
        return $url;
    }
);
