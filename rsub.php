<?php

	# Close a subscription channel
		
        $data = array (
	    'prod' => 'Unique subscription identifier',
        );

	# Comments
	#
	# Closing a channel will make all subscriptions obsolete
	#

        $headers = array (
		'Authorization: key=app-key',		# Sender's key inside the app
		'Content-Type: application/json'
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://push.barubox.com/subscriptionRem');

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        curl_exec($ch);

        curl_close($ch);

?>
