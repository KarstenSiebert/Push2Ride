<?php

	# Send messages to a region (site) for later geofencing, users entering the site will receive these messages
		
	$data = array (
            'head' => 'Title of message', 
            'text' => 'Short description of message', 
            'link' => 'Link to site or element (image, video, other) (or empty)', # Appropriate app will be started to view / follow this link
            'icon' => 'Link to icon, which is displayed with message (or empty)',
	    'shot' => 'Link to image file, which will be displayed with message (or empty)',
            'site' => 'Address (street, city, or region, or known place), where to push this message',
	    'prod' => 'Subscription identifier',
            'type' => 'See comments'
        );
				
	# Comments
	#
	# type field is 1 or 2 or 4 or 8 or 16 depending on the category the message belongs to
	#
	# a user will only be notified and the message will be displayed, if the user has enabled the filter to receive messages of this category
	#
	# geofencing messages require additional approval from the backoffice site, contact me at info@siehog.com
	#
		
        $headers = array (
		'Authorization: key=app-key',		# Sender's key inside the app
		'Content-Type: application/json'
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://push.barubox.com/messagesPost');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_exec($ch);

	curl_close($ch);

?>
