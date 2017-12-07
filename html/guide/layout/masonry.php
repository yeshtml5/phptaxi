<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<script type="text/javascript" src="/src/js/lib/masonry/masonry.min.js"></script>
<link type="text/css" rel="StyleSheet" href="/src/css/pages/main.css"/><!-- main css -->
<style type="text/css">
    section { position: relative; }
    .bg { width:100%; height:100%; background-repeat: no-repeat;}
    .cnt { position: absolute; top:20%; left:20%; width:60%; height:60%; background:rgba(255,255,255,0.7); overflow: hidden; color:#111; font-size:26px; }
    #appendBtn {width:100px; height:50px; background: #FF5722;}
    .main-wrap{margin:100px auto;}
    .main-wrap ul{width:90%; border:1px solid #111; margin:0 auto; text-align: center;}
    .main-wrap ul li{display:inline-block;width:200px; height:150px;margin:20px;background:#eee;border:1px solid #ff1493;}
</style><!--style end -->
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('.main-wrap ul').masonry({
                // set itemSelector so .grid-sizer is not used in layout
                fitWidth: true,
                itemSelector: 'li'
//                // use element for option
//                columnWidth: '.grid-sizer',

            });
            $('#appendBtn').on( 'click', function() {
                // create new item elements
                var $items = $('<li class="grid-item">Append</li>');
                // prepend items to grid
                $('ul').prepend( $items )
                    // add and lay out newly prepended items
                        .masonry( 'prepended', $items );
            });
        });
    })($);
</script><!--script end -->
<button id="appendBtn">Element 추가</button>
<div class="main-wrap">
    <ul>
        <li>AS-IS</li>
        <li>AS-IS</li>
        <li>AS-IS</li>
        <li>AS-IS</li>
        <li>AS-IS</li>
    </ul>
</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?>