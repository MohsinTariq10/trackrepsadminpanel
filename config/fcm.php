<?php

return [
	'driver'      => env('FCM_PROTOCOL', 'http'),
	'log_enabled' => true,

	'http' => [
		'server_key'       => env('FCM_SERVER_KEY', 'AIzaSyBsM3Tvgzgg4b4eQVDrf3ks4M3iIm1J9KY'),
		'sender_id'        => env('FCM_SENDER_ID', '156837133083'),
		'server_send_url'  => 'https://fcm.googleapis.com/fcm/send',
		'server_group_url' => 'https://android.googleapis.com/gcm/notification',
		'timeout'          => 100.0, // in second
	]
];
