<?php
/*
    Template Name: 스타일가이드
  */
?>
<?php get_header();?>
<?php
/*wordpress function*/
$parent_title = get_the_title($post->post_parent);
$parent_link = get_permalink($post->post_parent);
$current_title = get_the_title($post->ID);
$current_link = get_permalink($post->ID);
?>
<?php /*wordpress 강제p태그 삭제*/ remove_filter( 'the_content', 'wpautop' ); ?>
<?php if(have_posts()): while(have_posts()):the_post();?>
<!--######################################################-->
<style>
	.content.panel {margin-top:50px; padding:30px!important;}
	.content > h3 {margin-top:10px;margin-bottom:10px;}
	.in_wrap {padding:20px;}
</style>
<article><!--page-->
	<?php include_once($_SERVER['DOCUMENT_ROOT'].__PATH__."/inc/inc.location.php");/*location*/?>	
	<div class="content tmpl card"><!--content-->
		<h3>p [Paragraph]</h3>
		<p>문단테스트 문단1 (文段)[문단] [명사] 글에서 하나로 묶을 수 있는 짤막한 단위. 문단2 (文壇) <em>이곳은 em태그를 통한 강조부분입니다.</em> [명사] 문인(文人)들의 사회.유의어 : 사장28, 소단, 문학계 문단3 (紋緞)명사] 무늬가 있는 비단. 기성 문단 (旣成文壇) 문단에 진출하다 (표제어:문단2)문단에 널리 알려지다. (표제어:문단2)작위가 있는 사람이 입는 문단은 빛깔이 선명하였습니다. 출처 : 번역 순조실록 (표제어:문단3)문단과 문단의 연결 관계 (표제어:문단1)문단을 나누다.</p>
		<h3>p.blockquote</h3>
		<p class="blockquote">문단테스트 문단1 (文段)[문단] [명사] 글에서 하나로 묶을 수 있는 짤막한 단위. <em>이곳은 em태그를 통한 강조부분입니다.</em> 한 편의 글은 여러 개의 문단으로 구성된다. 문단2 (文壇) [명사] 문인(文人)들의 사회.유의어 : 사장28, 소단, 문학계 문단3 (紋緞)명사] 무늬가 있는 비단. 기성 문단 (旣成文壇) 문단에 진출하다 (표제어:문단2)문단에 널리 알려지다. (표제어:문단2)작위가 있는 사람이 입는 문단은 빛깔이 선명하였습니다. 출처 : 번역 순조실록 (표제어:문단3)문단과 문단의 연결 관계 (표제어:문단1)문단을 나누다. (표제어:문단1)</p>
		<h3>p.box</h3>
		<p class="box">문단테스트 문단1 (文段)[문단] [명사] 글에서 하나로 묶을 수 있는 짤막한 단위. <em>이곳은 em태그를 통한 강조부분입니다.</em> 한 편의 글은 여러 개의 문단으로 구성된다. 문단2 (文壇) [명사] 문인(文人)들의 사회.유의어 : 사장28, 소단, 문학계 문단3 (紋緞)명사] 무늬가 있는 비단. 기성 문단 (旣成文壇) 문단에 진출하다 (표제어:문단2)문단에 널리 알려지다. (표제어:문단2)작위가 있는 사람이 입는 문단은 빛깔이 선명하였습니다. 출처 : 번역 순조실록 (표제어:문단3)문단과 문단의 연결 관계 (표제어:문단1)문단을 나누다. (표제어:문단1)</p>
		<hr class="mgt_40 mgb_40">
		<h3>Board List Type</h3>
		<table class="bbsList">
			<colgroup><col width="5%;"><col width="10%;"><col width="45%;"><col width="10%;"><col width="10%;"><col width="10%;"></colgroup>
			<thead>
				<tr>
					<th><span>번호</span></th>
					<th><span>이름</span></th>
					<th><span>제목</span></th>
					<th><span>날짜</span></th>
					<th><span>구분</span></th>
					<th class="last"><span>조회수</span></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="icon"><a href="#"><span>1</span></a></td>
					<td><a href="#"><span>홍길동</span></a></td>
					<td><a href="#"><span>제목 및 타이틀 타이틀 타이틀 제목 제목</span></a></td>
					<td><span>2011.05.07</span></td>
					<td><span>진행중</span></td>
					<td><span>100</span></td>
				</tr>
				<tr>
					<td class="icon"><a href="#"><span>2</span></a></td>
					<td><a href="#"><span>홍길동</span></a></td>
					<td><a href="#"><span>제목 및 타이틀 타이틀 타이틀 제목 제목</span></a></td>
					<td><span>2011.05.07</span></td>
					<td><span>진행중</span></td>
					<td><span>100</span></td>
				</tr>
				<tr class="on">
					<td class="icon"><a href="#"><span>3</span></a></td>
					<td><a href="#"><span>홍길동</span></a></td>
					<td><a href="#"><span>제목 및 타이틀 타이틀 타이틀 제목 제목</span></a></td>
					<td><span>2011.05.07</span></td>
					<td><span>진행중</span></td>
					<td><span>100</span></td>
				</tr>
				<tr>
					<td class="icon"><a href="#"><span>4</span></a></td>
					<td><a href="#"><span>홍길동</span></a></td>
					<td><a href="#"><span>제목 및 타이틀 타이틀 타이틀 제목 제목</span></a></td>
					<td><span>2011.05.07</span></td>
					<td><span>진행중</span></td>
					<td><span>100</span></td>
				</tr>
			</tbody>
		</table>
		<h3>Data table</h3>
		<table class="ui-data-table">
			<colgroup><col width="5%;"><col width="30%;"><col width="20%;"><col width="10%;"><col width="15%;"><col width="20%;"></colgroup>
			<thead>
				<tr>
					<th>#</th>
					<th><span>NAME</span></th>
					<th><span>POSITION</span></th>
					<th><span>OFFICE</span></th>
					<th><span>START DATE</span></th>
					<th><span>SALARY</span></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="icon"><a href="#"><span> &gt; </span></a></td>
					<td><span>Prescott Bartlett</span></td>
					<td><span>Technical Author</span></td>
					<td><span>London</span></td>
					<td><span>2011/05/07</span></td>
					<td><span>$145,000</span></td>
				</tr>
				<tr>
					<td class="icon"><a href="#"><span> &gt; </span></a></td>
					<td><span>Prescott Bartlett</span></td>
					<td><span>Technical Author</span></td>
					<td><span>London</span></td>
					<td><span>2011/05/07</span></td>
					<td><span>$145,000</span></td>
				</tr>
				<tr>
					<td class="icon"><a href="#"><span> &gt; </span></a></td>
					<td><span>Prescott Bartlett</span></td>
					<td><span>Technical Author</span></td>
					<td><span>London</span></td>
					<td><span>2011/05/07</span></td>
					<td><span>$145,000</span></td>
				</tr>
				<tr>
					<td class="icon"><a href="#"><span> &gt; </span></a></td>
					<td><span>Prescott Bartlett</span></td>
					<td><span>Technical Author</span></td>
					<td><span>London</span></td>
					<td><span>2011/05/07</span></td>
					<td><span>$145,000</span></td>
				</tr>
				<tr>
					<td class="icon"><a href="#"><span> &gt; </span></a></td>
					<td><span>Prescott Bartlett</span></td>
					<td><span>Technical Author</span></td>
					<td><span>London</span></td>
					<td><span>2011/05/07</span></td>
					<td><span>$145,000</span></td>
				</tr>
				<tr>
					<td class="icon"><a href="#"><span> &gt; </span></a></td>
					<td><span>Prescott Bartlett</span></td>
					<td><span>Technical Author</span></td>
					<td><span>London</span></td>
					<td><span>2011/05/07</span></td>
					<td><span>$145,000</span></td>
				</tr>
			</tbody>
		</table>
		<hr class="mgt_40 mgb_40">
		<h3>Symbol 말풍선</h3>
		<p class="symbol required">필수요소</p>
		<ul class="col-4 col">
			<li><div class="in_wrap"><p class="edge left"></p></div></li>
			<li><div class="in_wrap"><p class="edge right"></p></div></li>
			<li><div class="in_wrap"><p class="edge top"></p></div></li>
			<li><div class="in_wrap"><p class="edge bottom"></p></div></li>
		</ul>
		<h3>Form 컨트롤요소</h3>
		<ul class="col-5 col mgb_20">
			<li><input id="rdo1" class="rdo" name="rdo" type="radio" value="FFFFFF"><label for="rdo1">라디오버튼1</label></li>
			<li><input id="rdo2" class="rdo" name="rdo" type="radio" value="FFFFFF"><label for="rdo2">라디오버튼1</label></li>
			<li><input id="rdo3" class="rdo" name="rdo" type="radio" value="FFFFFF"><label for="rdo3">라디오버튼1</label></li>
			<li><input id="rdo4" class="rdo" name="rdo" type="radio" value="FFFFFF"><label for="rdo4">라디오버튼1</label></li>
			<li><input id="rdo5" class="rdo" name="rdo" type="radio" value="FFFFFF"><label for="rdo5">라디오버튼1</label></li>
		</ul>
		<ul class="col-5 col">
			<li><input id="chk1" class="chk" name="chk" type="checkbox" value="FFFFFF"><label for="chk1">체크박스1</label></li>
			<li><input id="chk2" class="chk" name="chk" type="checkbox" value="FFFFFF"><label for="chk2">체크박스2</label></li>
			<li><input id="chk3" class="chk" name="chk" type="checkbox" value="FFFFFF"><label for="chk3">체크박스3</label></li>
			<li><input id="chk4" class="chk" name="chk" type="checkbox" value="FFFFFF"><label for="chk4">체크박스4</label></li>
			<li><input id="chk5" class="chk" name="chk" type="checkbox" value="FFFFFF"><label for="chk5">체크박스5</label></li>
		</ul>
		<p class="bar mgt_50 mgb_50"></p>
	</div><!--//content-->
</article><!--//page-->
<!--######################################################-->
<?php endwhile; endif; ?>
<?php get_footer();?>