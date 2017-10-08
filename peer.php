<?php

	# Send messages to a list of recipients, who joined a group

        $data = array (
	    'head' => 'Title of message', 
            'text' => 'Short description of message', 
            'link' => 'Link to site or element (image, video, other) (or empty)', # Appropriate app will be started to view / follow this link
            'icon' => 'Link to icon, which is displayed with message (or empty)',
	    'shot' => 'Link to image file, which will be displayed with message (or empty)',
	    'from' => 'From identifier (or empty)', # A unique identifier of the sender
            'peer' => 'Distribution group name' # A unique group identifier - 10 bytes without special character
        );

	
	# Comments
	#
	# A user will only be notified and the message will be displayed, if the user has joined the peer group and enabled the option to receive private messages
	#
	# Inside the Ride app several groups can be joined by adding them separated with comma
	#
	# Group transmission requires a server side group definition, contact me for more details at info@siehog.com
	#
		
        $headers = array (
            'Authorization: key=app-key',	# Sender's key inside the Ride app
            'Content-Type: application/json'
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://push.barubox.com/messagesPeer');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_exec($ch);
	
        curl_close($ch);

?>

