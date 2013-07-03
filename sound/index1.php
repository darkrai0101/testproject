
<?php
session_start();

	if(!isset($_SESSION['username'])){
			if(isset($_POST['username']) && isset($_POST['password'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$url = "http://connectdb.yocity.vn/checkdb?&type=1&username=".$username."&password=".$password;
				$checkResult = file_get_contents($url);
				$resultArray = explode("|",$checkResult);
				if ($resultArray[0]=="1"){
					$_SESSION['username'] = $username;
				}
		}
	}

	if(isset($_POST['logout']) && $_POST['logout'] == 'logout'){
		//tim session
		session_start();
		//huy cac bien cua session
		$_SESSION=array();
		//loai bo cac cookie
		if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),time()-100000,"/",0,0);
		}
		//huy toan bo cac session
		session_destroy();
	}



	$_SESSION['username'] = "chatdaigia";
  	$username = $_SESSION['username'];
	$connect = mysql_connect("localhost", "root", "")
			or die("Lỗi không kết nối được đến server!".mysql_error());
	mysql_select_db("pikachu")
		or die(mysql_error());

	$query = "SELECT * FROM username WHERE username ='".$username."'";
	$results = mysql_query($query)
				or die(mysql_error());
	$data_js = 10;
	$list = mysql_fetch_row($results);
	print_r($username);
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
 		<canvas id="myCanvas" width="800px" height="480px" style="solid #9C9898;z-index: 2;position:absolute; margin: 0px auto"></canvas>
 	</div>
 		
 	

  </body>
   <script language="javascript" type="text/javascript">
            var arrayStar  = "<?php echo $arrayStar?>".split("|");
    		var arrayScore = "<?php echo $arrayScore?>".split("|");
    		var numberTools = "<?php echo $arrayTools?>".split("|");
			var username = "<?php echo $username?>";
    </script>

  <script type="text/javascript" src="js/Algorithms.js"></script>
  <script type="text/javascript" src="js/popup.js"></script>
  <script type="text/javascript" src="js/screen.js"></script>
  <script type="text/javascript" src="js/selectBgr.js"></script>
  <script type="text/javascript" src="js/times.js"></script>
  <script type="text/javascript" src="js/orther.js"></script>
  <script type="text/javascript" src="js/resources.js"></script>
  <script type="text/javascript" src="js/pieces.js"></script>
  <script type="text/javascript" src="js/declared.js"></script>
  <script type="text/javascript" src="js/board.js"></script>
   <script type="text/javascript" src="js/loading.js"></script>
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
