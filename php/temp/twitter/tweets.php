<?php
/*
<!-- 
Your Access Token
Consumer Key (API Key)	U5D2MWe6autzVOWWApUCU7tRk
Consumer Secret (API Secret)	t8SlJ1cSjgXem00ACbhULgHN8ogGBaUrd1Z0keuHp3OMZsEcbM

Access Token	114379771-vjoLd8y5RtW4WHdESbTvzzisuuKAjr4AmjpX1mpc
Access Token Secret	YR1EAUyQbbvwGisLUXBF8JFkv4Sq5ncn3IJ8f9L60icia
-->

*/
require_once 'twitter-php/twitter.class.php';

//Twitter OAuth Settings, enter your settings here:
$CONSUMER_KEY = 'U5D2MWe6autzVOWWApUCU7tRk';
$CONSUMER_SECRET = 't8SlJ1cSjgXem00ACbhULgHN8ogGBaUrd1Z0keuHp3OMZsEcbM';
$ACCESS_TOKEN = '114379771-vjoLd8y5RtW4WHdESbTvzzisuuKAjr4AmjpX1mpc';
$ACCESS_TOKEN_SECRET = 'YR1EAUyQbbvwGisLUXBF8JFkv4Sq5ncn3IJ8f9L60icia';

$twitter = new Twitter($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);

// retrieve data
$q = $_POST['q'];
$count = $_POST['count'];
$api = $_POST['api'];

/*
	"q" => "#WorldSeries",
	"result_type" => "popular"
*/
// api data
$params = array(
	'screen_name' => $q,
	'q' => $q,
	'count' => 20,
	'includes_rts' => true
);

$results = $twitter->request($api, 'GET', $params);


// output as JSON
echo json_encode($results);
?>