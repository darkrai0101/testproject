
<?php
echo "abc";
require_once('sql.php');
include_once('server_api/login.php');
	
//////////////////////////////////////////////////////
  	$username = $_SESSION['username'];
	$query = "SELECT * FROM username WHERE username ='".$username."'";
	$results = mysql_query($query)
				or die(mysql_error());
	$data_js = 10;
	$list = mysql_fetch_row($results);
	if($list[0]=="" && $username != ""){
		mysql_query("INSERT INTO username (username) values ('".$username."')"); 
	} else {  
			$arrayStar = $list[2];
			$arrayScore = $list[3];
			$arrayTools = $list[4];
	}
  	?>


<!DOCTYPE HTML>
	<html>
		<HEAD>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
			<style type="text/css">
				body {
					margin: 0px ;
					width: 100%;
				}

				div#canvas {
					text-align: center;
				}
				@font-face {
					font-family: score;
					src: url('font/CPMono_v07_Bold-webfont.woff');
				}

				#myCanvas {background-color:#FFFFFF;}

			</style>

		</HEAD>
 <body>

	 	<div id = "canvas">
	 		<canvas id="myCanvas" width="800px" height="480px" style="solid #9C9898;z-index: 2; margin: 0px auto"></canvas>
	 		
	 	</div>
 		

  </body>
   <script language="javascript" type="text/javascript">
            var arrayStar  = "<?php echo $arrayStar?>".split("|");
    		var arrayScore = "<?php echo $arrayScore?>".split("|");
    		var numberTools = "<?php echo $arrayTools?>".split("|");
			var username = "<?php echo $username?>";
	</script>
  <script type="text/javascript" src="js/board.js"></script>
   <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript">
				function clear() {
					_context.clearRect(0, 0, _canvas.width, _canvas.height);
				}

				window.onload = function() {
					document.getElementById("canvas").style.cursor = "none";
				loading();
				if (!arrayStar[0]) {
    				ajaxFunction(1+"|"+0, 0+"|"+ 0,1+"|"+1+"|"+1+"|"+1);
					arrayStar[0] = 1;
					arrayStar[1] = 0;
					arrayScore[0] = 0;
					arrayScore[1] = 0;
					numberTools[0] = 1;
					numberTools[1] = 1;
					numberTools[2] = 1;
					numberTools[3] = 1;
				}
				loadImages(res,loadComplete);
			}
			</script>
</html>
