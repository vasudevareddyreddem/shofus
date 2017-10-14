<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/hauth/endpoint',

		"providers" => array (
			// openid providers
			"OpenID" => array (
				"enabled" => true
			),

			"Yahoo" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"AOL"  => array (
				"enabled" => true
			),

			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "601257408376-tuivjicccmlqhvml65j4o77h58gt8fri.apps.googleusercontent.com", "secret" => "FmbraXkmaC8ac5i3IifFWvO3"),
				"redirect_uri"=>"http://localhost/cartinhour/hauth/endpoint?hauth.done=Google",

			),
			
			/*"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => '465574174175-78bd3bkc6lu21h7ccv5893vb1hfvlk33.apps.googleusercontent.com', "secret" => 'JkI7GkSJzDrVmJRJAP7hXviw'),
				//"redirect_uri"=>'http://localhost/cartinhour/hauth/endpoint',

			),*/

			"Facebook" => array (
				"enabled" => true,
				//"keys"    => array ( "id" => '1516692405064355', "secret" => '54dab4497a9c59cfa29e6a222ee5fbc0' ),
				"keys"    => array ( "id" => '146448219424893', "secret" => '4d8dff6476ebbade92c1e816cf2994ad' ),
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			// windows live
			"Live" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),

			"MySpace" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" )
			),

			"LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "81yxvn0skasi9i", "secret" => "vyDPGYkWr9zYek37" )
			),

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" )
			),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => (ENVIRONMENT == 'development'),

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */