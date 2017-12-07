<?php include($_SERVER['DOCUMENT_ROOT']."/inc/common.inc"); ?>
<?php db_connect(); ?>
<?php head(); ?>
<!--contents-->
<div class="container">
<article>
	<h1><?php echo $_SERVER['HTTP_USER_AGENT'];  ?></h1>
    <?php
    $baseUrl = 'https://www.instagram.com/explore/tags/girls/?a=1';
    $url = $baseUrl;

    while(1) {
        $json = json_decode(file_get_contents($url));
        print_r($json->tag->media->nodes);
        if(!$json->tag->media->page_info->has_next_page) break;
        $url = $baseUrl.'&max_id='.$json->tag->media->page_info->end_cursor;
    }
     ?>
</article>
</div>
<!--//contents-->
<?php footer();?>
