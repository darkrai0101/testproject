<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
$(function(){
	$("#post").click(function(){
		  var highscore = "500";             
          $.ajax({
		  url: "http://testweb.yome.vn:8080/member/highscore",
		  data: {'highscore': highscore},
		  type: "POST",
		  crossDomain: true,
		  success: function(data, textStatus, jqXHR){
			console.log('Success ' + data);
		  },
		  error: function (jqXHR, textStatus, errorThrown){
			console.log('Error ' + jqXHR);
		  }
		});
		});//thoi gian check online 1 lan
	});
</script>

<input value="POST" type="button" name="post" id="post"></input>