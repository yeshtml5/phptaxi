<?php
$page_id = 'yesflash';
$access_token = 'EAAQgILFiZAJIBACxNClcgthiWraNUJKJ2qsxR9V4PKZBtZCZBbla1HjX29Fr1DcgEddDMbcPerGkqeD0CrepSuBxjXozrsEvpMj0J711ptZBFeheQn4Yk8f4k9kCYgJWduXSx4ULZBU72vvkM75qeZBUrOMupiDKEzbuKSf85IuiwZDZD';
//Get the JSON
$json_object = @file_get_contents('https://graph.facebook.com/' . $page_id . '/posts?access_token=' . $access_token);
//Interpret data
$fbdata = json_decode($json_object);

foreach ($fbdata->data as $post )
{
$posts .= '<p><a href="' . $post->link . '">' . $post->story . '</a></p>';
$posts .= '<p><a href="' . $post->link . '">' . $post->message . '</a></p>';
$posts .= '<p>' . $post->description . '</p>';
$posts .= '<br />';
}
//Display the posts
echo $posts
echo "1``"
?>