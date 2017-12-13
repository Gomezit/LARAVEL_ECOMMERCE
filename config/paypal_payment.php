<?php

return array(
	# Account credentials from developer portal
	'Account' => array(
		'ClientId' => env('AXLAmn1J0IWZHWq-mz5srWpDJ63WVZjevFO2uUy1E1C4m0cZ7bv9sSrt2YWUHpXjaDh1VwNd6O5_VFQr', ''),
		'ClientSecret' => env('ELRL0XOEgIzkhduMozzRncKwSmkYnsuukVjibUCO6IAxMwG3-UP-1ifg6rKPZ6PrSYQDVH3_b7KGaKpg', ''),
	),

	# Connection Information
	'Http' => array(
		// 'ConnectionTimeOut' => 30,
		'Retry' => 1,
		//'Proxy' => 'http://[username:password]@hostname[:port][/path]',
	),

	# Service Configuration
	'Service' => array(
		# For integrating with the live endpoint,
		# change the URL to https://api.paypal.com!
		'EndPoint' => 'https://api.sandbox.paypal.com',
	),


	# Logging Information
	'Log' => array(
		//'LogEnabled' => true,

		# When using a relative path, the log file is created
		# relative to the .php file that is the entry point
		# for this request. You can also provide an absolute
		# path here
		'FileName' => '../PayPal.log',

		# Logging level can be one of FINE, INFO, WARN or ERROR
		# Logging is most verbose in the 'FINE' level and
		# decreases as you proceed towards ERROR
		//'LogLevel' => 'FINE',
	),
);
