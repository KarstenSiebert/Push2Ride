<?php

	# Send messages to an individual recipient
		
	$data = array (
            'head' => 'Title of message', 
            'text' => 'Short description of message', 
            'link' => 'Link to site or element (image, video, other) (or empty)', # Appropriate app will be started to view / follow this link
            'icon' => 'Link to icon, which is displayed with message (or empty)',
	    'shot' => 'Link to image file, which will be displayed with message (or empty)',
	    'from' => 'From identifier (or empty)'
        );     

	# Comments
	#
	# No type field necessary, type is fixed: Private message center (16) 
	#
	# No site field, message will be deliverd independent of the location of the recipient
	#
		
        $headers = array (
		'Authorization: key=app-key',		# Recipient's key inside the app
		'Content-Type: application/json'
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://push.barubox.com/messagesPush');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_exec($ch);

	curl_close($ch);

?>
