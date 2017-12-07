(function ($) {
    $(document).ready(function () {
		$('input.todo-chk').bind('change',function(event){
			event.preventDefault();
			var _id=parseInt($(this).siblings('input').val());
			var _chk=$(this).is(':checked')?'1':'0';
			 
			$.ajax({
				type:'GET',
				url:'/php/dashboard/todo_update.php',
				data:'row_id= ' + _id + '&check='+_chk,
				success:function(){
			       window.location.reload(true);
		        }
			})
		});
    });
})($);