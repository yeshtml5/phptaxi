<?php include($_SERVER['DOCUMENT_ROOT']."/inc/common.inc"); ?>
<?php db_connect(); ?>
<?php head(); ?>
<!--contents-->
<div class="container">
<article>
	<h1><?php echo $_SERVER['HTTP_USER_AGENT'];  ?></h1>
</article>
</div>
<!--//contents-->
<?php footer();?>
