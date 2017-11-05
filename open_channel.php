<?php

	# Open a subscription channel
		
        $data = array (
            'head' => 'Title of channel', 
            'text' => 'Short description of channel', 
            'icon' => 'Link to icon, which is displayed with this channel (or empty)',
	    'shot' => 'Link to image file, which will be displayed with this channel (or empty)',
	    'prod' => 'Unique subscription identifier',
            'site' => 'Address (street, city, or region, or known place), where to auto-publish this channel'
        );

	# Comments
	#
	# Simply open a channel and other users can search for the channel and subscribe (swipe right) to it
	#
	# The channel will also be shown on the marketplace automatically, if a user enters the 'site'
	#
	# Users will still receive messages on that channel, even if they have left the 'site' region,
	#
	# as long as they do not unsubscribe from that channel (swipe left on channel inside the marketplace)
	#

        $headers = array (
		'Authorization: key=app-key',		# Sender's key inside the app
		'Content-Type: application/json'
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://push.barubox.com/channelAdd');

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_exec($ch);

        curl_close($ch);

?>
