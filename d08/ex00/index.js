$(document).ready(function() {

//move pieces to initial spots
	$.get("setup_board.php", function(data, status) {
		var all_pieces = $.parseJSON(data);
		$(".piece").each(function() {
			var left = (all_pieces[$(this).attr("id")].x - 1) * 12 + 2;
		   	var top = (all_pieces[$(this).attr("id")].y - 1) * 12 + 2;
			$(this).animate({ "left" : left, "top" : top });
		});
	});













//	$(document).on("keypress", function(e) {
//		$.post("move.php", { key : e.which }, function(data, status) {
//			alert("data: " + data + "\nstatus: " + status);
//		});	
//	});
});
