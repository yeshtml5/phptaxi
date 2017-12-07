<!--lib-->
<link type="text/css" rel='stylesheet' href='/php/google/calendar/lib/fullcalendar.css' />
<script type="text/javascript" src="/src/js/lib/jquery.js"></script>
<script type="text/javascript" src="/php/google/calendar/lib/moment.min.js"></script>
<script type="text/javascript" src="/php/google/calendar/lib/fullcalendar.js"></script>
<script type="text/javascript" src="/php/google/calendar/lib/gcal.js"></script>
<script type="text/javascript" src="/php/google/calendar/src/calendar.js"></script>

<?php if(is_user_logged_in()): ?>
	<div id="calendar">
	</div>
<?php else: ?>
	<?php	echo var_dump(is_user_logged_in()); ?>
	<p>로그인필요</p>
<?php endif;?>
