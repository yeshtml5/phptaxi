<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<link type="text/css" rel="StyleSheet" href="/src/css/basic.css" />
		<script type="text/javascript" src="/src/js/lib/jquery.js"></script><!-- jQuery -->		
		<!--[if lt IE 9]><script type="text/javascript" src="/src/js/lib/html5/html5.js"></script><![endif]-->
	</head>
	<body>
<script type="text/javascript">
	(function($){
		var max_parameter = "max_id";
		var paging= new Object();
		var count=30; // max가 33개정도
		var page=0;
		var hashtag="";

		var access_token="1651707531.c9015f8.a35230e6a33c403c8d5bc560d8025f33",
		//var access_token="3558951229.1677ed0.9b1295f705c4482ba140aef39afc0dc0",
		access_parameters = {
			access_token: access_token
		};

		function prevInsta(e){
			paging[e.data.ID]['page']-=1;
			var instagramUrl = 'https://api.instagram.com/v1/tags/' + hashtag + '/media/recent?callback=?&count=' + count+'&'+max_parameter+'='+paging[e.data.ID][paging[e.data.ID]['page']]+'&ID='+e.data.ID;
			$.getJSON(instagramUrl, access_parameters, onDataLoaded);
			return false;
		}
		
		function nextInsta(e){
			paging[e.data.ID]['page']+=1;
			var instagramUrl = 'https://api.instagram.com/v1/tags/' + hashtag + '/media/recent?callback=?&count=' + count+'&'+max_parameter+'='+paging[e.data.ID][paging[e.data.ID]['page']]+'&ID='+e.data.ID;
			$.getJSON(instagramUrl, access_parameters, onDataLoaded);
			return false;
		}

		var ID=0;
		function show_instagram(){
			//ID=_ID;
			//hashtag = encodeURIComponent(tag);
			hashtag="car";
			ID="yeshtml5";
			var instagramUrl = 'https://api.instagram.com/v1/tags/' + hashtag + '/media/recent?callback=?&count=' + count+'&max_tag_id=0&ID='+ID;
			console.log(access_parameters);
			$.getJSON(instagramUrl, access_parameters, onDataLoaded);
			return false;
		}

		function onTagLoaded(instagram_data) {
			// console.log(instagram_data);
		}

		function onDataLoaded(instagram_data) {
			 console.log(instagram_data);
			 return false;
		if (instagram_data.meta.code == 200) {
			var photos = instagram_data.data;
			var params = this.url.split("&");
			var ID=0;
			for (i = 0; i < params.length; i++) {
				sParameterName = params[i].split('=');
				if (sParameterName[0] === "ID") {
					ID = sParameterName[1];break;
				}
			}			
			var page = paging[ID]['page'];
			if (ID!=0 && photos.length > 0) {
					var last_id=0;
					for (var key in photos) {
						var photo = photos[key];		

						if(!$("#tag_"+photo.id).length){
							if(typeof(photo.images)=="undefined") continue;
							var li = $("<li />").attr("id", "tag_"+photo.id);
							var a = $("<a />").attr({ href: "#", class: "image"}).click(photo, function(e){
								var photo = e.data;

								$("#chk_"+photo.id).click();
								return false;
							});

							a.append('<img src="' + photo.images.low_resolution.url + '">');
							li.append(a);
							var div = $("<div />");
							var label1 = $("<label />").text("");
							var ckb = $("<input />").attr({
								type:"checkbox",
								id:"chk_"+photo.id,
								name:"chkbox["+photo.id+"]"
							}).addClass("chk_"+ID);
							var input0 = $("<input />").attr({type:"hidden",name:"ID[]"}).val(photo.id);
							var input1 = $("<input />").attr({type:"hidden",name:"caption["+photo.id+"]"}).val(photo.caption.text);
							var input2 = $("<input />").attr({type:"hidden",name:"likes["+photo.id+"]"}).val(photo.likes.count);
							var input3 = $("<input />").attr({type:"hidden",name:"link["+photo.id+"]"}).val(photo.link);
							var input4 = $("<input />").attr({type:"hidden",name:"name["+photo.id+"]"}).val(photo.user.username);
							var input5 = $("<input />").attr({type:"hidden",name:"created["+photo.id+"]"}).val(photo.created_time);
							var input6 = $("<input />").attr({type:"hidden",name:"profile["+photo.id+"]"}).val(photo.user.profile_picture);
							var input7 = $("<input />").attr({type:"hidden",name:"image_s["+photo.id+"]"}).val(photo.images.low_resolution.url);
							var input8 = $("<input />").attr({type:"hidden",name:"image_l["+photo.id+"]"}).val(photo.images.standard_resolution.url);
							label1.append(ckb);
							div.append(label1);
							li.append(div);
							li.append(input0).append(input1).append(input2).append(input3).append(input4).append(input5).append(input6).append(input7).append(input8);
							$("#target_"+ID).append(li);
							if(page==1) $("#instaList_"+ID+" .arrow_prev").hide();
							else $("#instaList_"+ID+" .arrow_prev").show();
							if(photos.length!=count)	$("#instaList_"+ID+".arrow_next").hide();
							else $("#instaList_"+ID+" .arrow_next").show();
						}else{

							$("#instaList_"+ID+".arrow_next").hide();
						}
					}
				} else {

				}

				if(typeof(instagram_data.pagination.next_max_tag_id)!="undefined"){
					paging[ID][page+1]=instagram_data.pagination.next_max_tag_id;		
				}else if(typeof(instagram_data.pagination.next_max_id)!="undefined"){
					paging[ID][page+1]=instagram_data.pagination.next_max_id;		
				}else{
					$("#instaList_"+ID+" .arrow_next").hide();
				}
			} else {
				var error = instagram_data.meta.error_message;
			}
		}

		function selectAll(ID){
			$(".chk_"+ID).prop("checked", $("#selector_"+ID).is(":checked"));
		}

		function saveMain(ID){
			$("#type").val("main");
			document.dataFormSearch.submit();
		}

		function savePage(ID){
			$("#type").val("page");
			document.dataFormSearch.submit();
		}
		$(document).ready(function(){
			show_instagram();

			return false;
			$(".instaID").each(function(idx){

				var tag = $("#instaTag_"+$(this).val()).val();
				 
				console.log(tag);
				
				paging[$(this).val()]=new Array();
				paging[$(this).val()]['name']=tag;
				paging[$(this).val()]['page']=0;
				show_instagram(tag, $(this).val());
				//$("#instaList_"+ID+" .arrow_next").on("click",{ID:ID},nextInsta);
			});
		});
	})($);
</script>
<style>
	.list-thumbnail li{float:left;margin:8px 10px;}
	.list-thumbnail li a img{width:100px;height:100px;}
	.clear{clear:both;}
	.btn01{padding:4px;width:100px;}
</style>

<div id="contentcolumn" class="">
	<div id="spot" class=""> 
		<h3>컨텐츠 추가</h3>
		<div id="" class="path">HOME &gt; 부가서비스 &gt; <b>컨텐츠 추가</b> </div>
	</div>
	
	<div class="contents">
		<p style="padding-top:15px;" />
		<form name="dataFormSearch" method="post" autocomplete="off">
			<input type="hidden" id="action" name="action" value="add"/>
			<input type="hidden" id="type" name="type" value="all"/>
			
			<div class="subtitle">해시태그 - 콘텐츠</div>
			<div class="bgtbheader01">				
				<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tablelistH31">
					<col width="45">
					<col width="150">
					<col width="*">
					<col width="120">
					<thead>
						<tr>
							<th class="thL">번호</th>
							<th>해시태그</th>
							<th>내용</th>
							<th class="thR">설정</th>
						</tr>					
					</thead>
					<tbody>
						{@TAG_LIST}
						<tr>
							<td class="tdL" align="center">{.__ord}</td>
							<td class="tdL" align="center">{.tag}</td>
							<td class="tdL" align="center">
								<input type="hidden" class="instaID" value="{.ID}"/>
								<input type="hidden" id="instaTag_{.ID}" value="{.tag}"/>
								<div id="instaList_{.ID}">
									<ul class="list-thumbnail instagram" id="target_{.ID}"></ul>
									<div class="clear"></div>
									<a href="#" class="arrow_next">더보기</a>
								</div>
							</td>
							<td class="tdR" align="center">
								<p><label><input type="checkbox" id="selector_{.ID}" onchange="selectAll({.ID})" />전체선택</label></p>
								<p><label><input type="button" class="btn01" onclick="saveMain({.ID})" value="메인노출 저장"/></label></p>
								<p><label><input type="button" class="btn01" onclick="savePage({.ID})" value="페이지노출 저장"/></label></p>
							</td>
						</tr>
						{:}
						<tr>
							<td colspan="4" height="50" class="tdLR" align="center">등록된 해시태그가 없습니다.</td>
						</tr>
						{/}
					</tbody>				
				</table>
			</div>
		</form>
	</div>
</div>
</body>
</html>