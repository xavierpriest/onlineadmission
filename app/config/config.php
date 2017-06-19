<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => 'root',
        'dbname'      => 'OnlineAdmission',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'configDir'       => __DIR__ . '/../../app/config/',
        'baseUri'        => '/OnlineAdmission/',
        'publicUrl'      => '127.0.0.1/OnlineAdmission',
    ),

    'mail' => array(
        'fromName' => 'GAU Online',
        'fromEmail' => 'paul.yhwh@gmail.com',
        'smtp' => array(
            'server' => 'smtp.gmail.com',
            'port' => 465,
            'security' => 'ssl',
            'username' => 'paul.yhwh@gmail.com',
            'password' => 'thanks2jesus'

        )
    )
));
