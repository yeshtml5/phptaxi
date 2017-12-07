<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<script type="text/javascript" src="/src/js/framework/ui/ui.calendar.js"></script>
<style type="text/css" rel="stylesheet">
	.calendar { position: relative; padding-top:50px; padding-left:50px; }
	.calendar .bg { background: url('/src/images/common/background/background.calendar.png'); }
	
	/*---- 달력 상단 inputBox --------------*/
	.calendar .input-cnt { display: inline-block; padding:15px;  border: 1px solid #e6e6e6; background: #f6f7f8; }
	.calendar .input-cnt .wrap { display:inline-block; zoom:1; *display:inline/*IE7 HACK*/;  }
	.calendar .input-cnt .wrap input { height:19px; padding:3px 8px 3px; border:1px solid #c5c5c5; border-right-color:#e5e5e5; border-bottom-color:#e5e5e5;  line-height:1.3; text-align: center; }
	.calendar .input-cnt .wrap .btn_icon { display: inline-block; width: 26px; height:24px; vertical-align: middle; }
	.calendar .input-cnt .wrap .btn_icon a { display: inline-block; width: 26px; height:24px; background-position: 0px -32px; } 
	.calendar .input-cnt .wrap .btn_icon a:hover { background-position: -36px -32px; } 
	
	/*---- 달력레이어 --------------*/
	.calendar .layer-cnt { position: absolute; left:100px; top:85px;  width:195px;  background-color: #FFFFFF; border: 1px solid #707070; display: none;}
	.calendar .layer-cnt .wrap { position: relative; height: 35px; background-color: #8d7870; }
	.calendar .layer-cnt .wrap .btn { position: absolute; top: 8px; width: 20px; height: 18px; background-repeat: no-repeat; }
	.calendar .layer-cnt .wrap .prev-year { left: 10px; background-position: 0px 0px; }
	.calendar .layer-cnt .wrap .prev-month { left: 30px; background-position: -30px 0px;   }
	.calendar .layer-cnt .wrap .view-txt { width: 60px; margin: 0 0 0 50px; padding: 9px 0 0; color: #fff; font-weight: bold; font-size: 12px; line-height: 14px; text-align: center;   }
	.calendar .layer-cnt .wrap .next-month { right: 65px; background-position: -60px 0px;  }
	.calendar .layer-cnt .wrap .next-year { right: 45px; background-position: -90px 0px;  }
	.calendar .layer-cnt .wrap .set-today { top: 8px; right: 8px; width: 27px; height: 18px; background-position: -120px 0px; }		
	.calendar .layer-cnt table { padding: 0px 10px 4px; width:100%; font-family:'돋움, dotum', 'Arial', "Verdana", "Arial"; }
	.calendar .layer-cnt table th { height: 29px; border-bottom: 1px solid #f2f2f2; color: #4d4d4d; font-weight: normal; font-size: 12px; line-height: 16px; text-align: center; }
	.calendar .layer-cnt table td { color: #808080; font-weight: bold; font-size: 11px; line-height: 16px; text-align: center;  width: 25px; height: 21px;}
	.calendar .layer-cnt table td a { display: block;  padding: 4px 0px 0px; background-color: #fff; color: #808080; text-decoration: none; width: 25px; height: 21px; }
	.calendar .layer-cnt table .sun , .calendar .layer-cnt table .sun a { color: #ea002c;  }
	.calendar .layer-cnt table .sat , .calendar .layer-cnt table .sat a {  color: #006ea6;  }	
	.calendar .layer-cnt table .today a { background-color: #8d7870; color: #FFFFFF;  }
	.calendar .layer-cnt table .on a {  background-color: #FFAE56; color:#000000;  }
	.calendar .layer-cnt .close { position: absolute; top: -11px; right: -14px; width: 22px; height: 22px; background-position: -157px 0px; }
	.calendar .layer-cnt .close a { display: block; width:22px; height:22px; overflow: hidden; }

</style>		
<script type='text/javascript'>
	(function(){
		$(document).ready(function(){
			_calendar=new ui.Calendar({
				container:$('.calendar'),
				openBtn:$('.btn_icon'),
				closeBtn:$('.close'),
				layer:$('.layer-cnt'),
				prev_year:$('.prev-year'),
				prev_month:$('.prev-month'),
				next_month:$('.next-month'),
				next_year:$('.next-year'),
				today:$('.set-today'),
				view_box:$('.view-txt'),
				callback:function(obj){
					var _year=obj.year, _month=obj.month, _date=obj.date;
					alert(_year+"-"+_month+"-"+_date);
				//	console.log(obj);
				}
			});
			$('input').onlyNumber();
		});
	})();
</script>
<article id="contents">
	<section class="calendar">
		<!--- 카렌다 조회하기 input -->
		<div class="input-cnt">
			<div class="wrap">
				<input type="text" style="width:82px" title="조회기간 시작일" value="" class="txt" name="">
				<span class="btn_icon"><a href="#" class="bg"><span class="hide">시작일 선택 달력보기</span></a></span>
			</div>
			<span class="bar"> ~ </span>
			<div class="wrap">
				<input type="text" style="width:82px" title="조회기간 종료일" value="" class="txt" name="">
				<span class="btn_icon"><a href="#" class="bg"><span class="hide">종료일 선택 달력보기</span></a></span>
			</div>
		</div>
		<!-- 카렌다 달력 -->
		<div class="layer-cnt">
			<div class="wrap"> 
				<a href="#" class="bg btn prev-year"><span class="none">이전 해 보기</span></a>
				<a href="#" class="bg btn prev-month"><span class="none">이전 달 보기</span></a>
				<div class="view-txt">2014-07</div>
				<a href="#" class="bg btn next-month"><span class="none">다음 달 보기</span></a>
				<a href="#" class="bg btn next-year"><span class="none">다음 해 보기</span></a>
				<a href="#" class="bg btn set-today"><span class="none">오늘 보기</span></a>
			</div>
			<table cellpadding="0" cellspacing="0">
				<caption class="hide">캘린더</caption>
				<thead>
					<tr><th class="sun">일</th><th>월</th><th>화</th>	<th>수</th><th>목</th><th>금</th>	<th class="sat">토</th></tr>
				</thead>
				<tbody>
					<tr><td class="sun">1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td class="sat">7</td></tr>				 
					<tr><td class="sun">8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td class="sat">14</td></tr>				 
					<tr><td class="sun">15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td class="sat">21</td></tr>				 
					<tr><td class="sun">22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td class="sat">28</td></tr>				 
					<tr><td class="sun">29</td><td>30</td><td>31</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="sat">&nbsp;</td></tr>				 
					<tr><td class="sun">&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td class="sat">&nbsp;</td></tr>		
				</tbody>						 
			</table>
			<div class="bg close"><a href="#"><span class="none">캘린더 레이어 닫기</span></a></div>
		</div>
	</section>
</article><!-- article End -->
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?>