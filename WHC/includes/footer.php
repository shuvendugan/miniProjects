

<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/basiccalendar.js"></script>

<script src="js/script.js"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$("#sdate,#edate,#news_date").datepicker({
			minDate: 0
		});
	});
</script>