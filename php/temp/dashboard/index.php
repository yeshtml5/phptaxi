<?php include_once($_SERVER['DOCUMENT_ROOT']."/php/common/db_connect.php"); ?><!-- php connect-->
<!--style & css -->
<link type="text/css" rel="stylesheet" href="/php/dashboard/style.css"/>
<script type="text/javascript" src="/src/js/lib/jquery.js"></script><!-- jQuery -->
<script type="text/javascript" src="/php/dashboard/script.js"></script>

<!--<div class="util-wrap">-->
    <!--<div class="util">-->
        <!--<div>1111</div>-->
        <!--<div></div>-->
    <!--</div>-->
<!--</div>-->
<div class="left-menu none">
    <ul>
        <li><a href="#">1</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">1</a></li>
        <li><input type="button" id="prepend-button"></li>
    </ul>
</div>
<div class="main-wrap">
    <ul class="panel col-4">
        <li class="ip">
            <div class="box">
                <p>MY IP</p>
                <?php echo $_SERVER['REMOTE_ADDR']; ?>
            </div>
        </li>
        <li>
            <div class="box">
                2222222222222
            </div>
        </li>
        <li>
            <div class="box">
                3333333333333
            </div>
        </li>
        <li>
            <div class="box">
                4444444444444444
            </div>
        </li>
    </ul>
    <?php
    /*logic */
    ?>
	<!-- todo list -->
    <div class="todo-wrap">
		<form method="post" action="/php/dashboard/todo_delete.php">
			<table class="todo">
				<colgroup><col width="10%;"><col width="60%;"><col width="10%;"><col width="20%;"></colgroup>
				<thead>
				<tr>
					<th>완료여부</th>
					<th>id</th>
					<th>제목</th>
					<th class="last">등록일</th>
				</thead>
				<tbody>
				<?php
					$sql='SELECT * FROM todo';
					$rst=mysqli_query($conn,$sql);
					if (mysqli_num_rows($rst) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($rst)) {
				?>
						<!--loop-->
						<tr class=<? echo ($row["check"]==0)?'':'on'; ?>>
							<td class="chk">
								<input type="hidden" name="row_id" value=<? echo $row["id"] ?> ><!-- custom value -->
								<input type="checkbox" name="check" class="todo-chk" <? echo ($row["check"]==0)?'':'checked'; ?> >
							</td>
							<td class="tit"><? echo $row["title"]; ?></td>
							<td><? echo $row["date"] ?></td>
							<td class="btn"><input class=""type="submit" value='삭제' <? $_POST['mode']='DEL'; ?> ></td>
						</tr>
						<!--//loop-->
				<?php
						}
					}else{
						echo "결과가 없습니다.";
					}
				?>
				</tbody>
			</table>
		</form>
    </div>
	<!-- todo write -->
	<div class="todo-write">

		<div class="box-view">
			<form method="post" action="/php/dashboard/todo_insert.php">
				<input type="text" class="cmn w80" name="title">
				<input type="submit" value="등록">
			</form>
		</div>
	</div>
</div>

<?php include_once($_SERVER['DOCUMENT_ROOT']."/php/common/db_close.php"); ?><!-- php close-->