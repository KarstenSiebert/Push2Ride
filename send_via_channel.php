<?php

	# Send a message via a channel to subscribers
		
        $data = array (
            'head' => 'Title of message', 
            'text' => 'Short description of message', 
            'link' => 'Link to site or element (image, video, other) (or empty)',
            'icon' => 'Link to icon, which is displayed with message (or empty)',
	    'shot' => 'Link to image file, which will be displayed with message (or empty)',
	    'prod' => 'Unique subscription identifier'
        );

        $headers = array (
            'Authorization: key=app-key',	# Sender's key inside the app
            'Content-Type: application/json'
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://push.barubox.com/messagesSubs');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_exec($ch);

        curl_close($ch);

?>
