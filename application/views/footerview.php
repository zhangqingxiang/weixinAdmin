<!-- /#wrapper -->
<script>
	$(document).ready(function() {
		$("#menulist a").each(function(){
			$(this).click(function(){
				$.ajax({
	                type: "GET",
	                url: "../index.php/Report/reportClick",
	                // type: "POST",
	                data: {"click": $(this).text()},
	                dataType: "json",
	                success: function(data){
	                    console.log(data);
	                }
	            });
			})
		})
	})


</script>
</body>
</html>