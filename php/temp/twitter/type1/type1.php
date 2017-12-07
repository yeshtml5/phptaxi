<?php
require_once 'twitteroauth/twitteroauth.php';

define('CONSUMER_KEY', 'U5D2MWe6autzVOWWApUCU7tRk');
define('CONSUMER_SECRET', 't8SlJ1cSjgXem00ACbhULgHN8ogGBaUrd1Z0keuHp3OMZsEcbM');
define('ACCESS_TOKEN', '114379771-vjoLd8y5RtW4WHdESbTvzzisuuKAjr4AmjpX1mpc');
define('ACCESS_TOKEN_SECRET', 'YR1EAUyQbbvwGisLUXBF8JFkv4Sq5ncn3IJ8f9L60icia');

$toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);

$query = array(
	"q" => "#국카스텐"
);

$results = $toa->get('search/tweets', $query);

foreach ($results->statuses as $result) {
	echo "<div>";
  echo $result->user->screen_name . ": " . $result->text . "\n";
  	echo "</div>";
}
?>