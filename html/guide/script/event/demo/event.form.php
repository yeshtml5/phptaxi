<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.header.php"); ?>
<script type="text/javascript">
	$(document).ready(function() {

		// 체크 박스 모두 체크
		$("#checkAll").click(function() {
			$("input[name=box]:checkbox").each(function() {
				$(this).attr("checked", true);
			});
		});

		// 체크 박스 모두 해제
		$("#uncheckAll").click(function() {
			$("input[name=box]:checkbox").each(function() {
				$(this).attr("checked", false);
			});
		});

		// 체크 되어 있는 값 추출
		$("#getCheckedAll").click(function() {
			$("input[name=box]:checked").each(function() {
				var test = $(this).val();
				console.log(test);
			});
		});

		// 서버에서 받아온 데이터 체크하기 (콤마로 받아온 경우)
		$("#updateChecked").click(function() {
			var splitCode = $("#splitCode").val().split(",");
			for (var idx in splitCode) {
				$("input[name=box][value=" + splitCode[idx] + "]").attr("checked", true);
			}
		});

		// test case
		test1();

	});

	function test1() {

		console.log("################################################");
		console.log("## test1 START");
		console.log("################################################");

		var cnt = $("input:checkbox").size();
		console.log("checkboxSize=" + cnt);

		$("input[name=box]:checkbox").each(function() {
			var checkboxValue = $(this).val();
			console.log("checkboxValue=" + checkboxValue);
		});

		console.log("----------------------------------------------");

		$("#checkboxArea").children().each(function() {
			var checkboxValue = $(this).children(":checkbox").val();
			var text = $(this).children().eq(1).text();
			console.log(text + "=" + checkboxValue);
		});
	}
</script>
<div id="checkboxArea">
	<ul>
		<li>
			<input type="checkbox" name="box" value="A" />
			<label>1번째 checkbox</label>
		</li>
		<li>
			<input type="checkbox" name="box" value="B" />
			<label>2번째 checkbox</label>
		</li>
		<li>
			<input type="checkbox" name="box" value="C" />
			<label>3번째 checkbox</label>
		</li>
		<li>
			<input type="checkbox" name="box" value="D" />
			<label>4번째 checkbox</label>
		</li>
	</ul>
</div>
<br/>
<br/>
<div id="buttonGroups">
	<input type="button" id="checkAll" value="check all" />
	<input type="button" id="uncheckAll" value="uncheck all" />
	<input type="button" id="getCheckedAll" value="get checked all" />
	<input type="button" id="updateChecked" value="updateChecked" />
</div>

<input type="hidden" id="splitCode" name="splitCode" value="A,C,D" />
<?php include($_SERVER['DOCUMENT_ROOT']."/pages/inc/inc.footer.php"); ?>