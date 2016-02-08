<?php
session_start();
// added in v4.0.0

require_once '../login-ext/autoload.php';

// path of these files have changes
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurl;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\Entities\AccessToken;
use Facebook\Entities\SignedRequest;
// other files remain the same
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;
// init app with app id and secret
FacebookSession::setDefaultApplication( '729548783843058','8c1ab42bf63573813d48f26c01a49633' );
// login helper with redirect_uri
 /* $helper = new FacebookRedirectLoginHelper('http://www.iphrasesonline.com.ve' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
	echo $ex;
  // When Facebook returns an error
} catch( Exception $ex ) {
	echo $ex;
  // When validation fails or other local issues
}
*/
$helper = new FacebookJavaScriptLoginHelper();
//echo $helper;
try {
	echo "Inicia session";
    $session = $helper->getSession();
} catch(FacebookRequestException $ex) {
	echo $ex;
    // When Facebook returns an error
} catch(Exception $ex) {
	echo $ex;
    // When validation fails or other local issues
}

// see if we have a session
echo $session;
if ( isset($session) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');         // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	    
	/* ---- Session Variables -----*/
	    $_SESSION['ID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
    /* ---- header location after session ----*/
	echo "prueba";
 header("Location: ".$loginUrl);
} else {
  	echo "No entro";
	
// $loginUrl = $helper->getLoginUrl();
//header("Location: ".$loginUrl);
}
?>