<?php

function create_servers(&$cfg){
    $data = yaml_parse_file( __DIR__ . '/../config_mysql/servers.yml');
    $i = 1;
    foreach($data['servers'] as $server){
        if(isset($server['host'])){
            $cfg['Servers'][$i++] = [
                'verbose' => $server['name'] ?? $server['host'],
                'auth_type' => 'config',
                'host' => $server['host'],
                'user' => $server['user'],
                'password' => $server['password'],
                'compress' => true,
            ];
        }
    }
}

create_servers($cfg);

//echo '<pre>';
//print_r($cfg);
//echo '</pre>';
//die();

