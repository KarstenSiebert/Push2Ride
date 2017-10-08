<?php

        $data = array (
            'head' => 'Nagios Message Center', 
            'text' => 'SNMP Server went down', 
            'link' => '',
            'icon' => '',
            'shot' => 'https://filecast.barubox.com/users/e7f889d688d74b3c5901ebad086d8477/407/34VDjfx4.jpg',  
            'from' => 'Karsten',
            'peer' => 'qwertzuiop'
        );

        $headers = array (
#            'Authorization: key=e07b43f67b25858f',
            'Authorization: key=4c21c1c02e7e070',
            'Content-Type: application/json'
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://push.barubox.com/messagesPeer');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $result = curl_exec($ch);

		if ($debug)
		{
        	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        	file_put_contents('/tmp/client-peer', date('Y-m-d H:i').'-'.$httpcode.'-'.$result.PHP_EOL, FILE_APPEND);
		}

        curl_close($ch);

?>

