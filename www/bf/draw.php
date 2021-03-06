<?
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$code = generateRandomString(6);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sasquatch Footprints — How big are they?</title>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="jquery.ui.core.min.js"></script>
		<script type="text/javascript" src="jquery.ui.widget.min.js"></script>
		<script type="text/javascript" src="jquery.ui.mouse.min.js"></script>
		<script type="text/javascript" src="jquery.ui.draggable.min.js"></script>

		<!-- wColorPicker -->
		<link rel="Stylesheet" type="text/css" href="wColorPicker.css" />
		<script type="text/javascript" src="wColorPicker.js"></script>

		<!-- wPaint -->
		<link rel="Stylesheet" type="text/css" href="wPaint.css" />
		<script type="text/javascript" src="wPaint.js"></script>

		<!--  STYLE SHEETS  -->
		<link rel="stylesheet" type="text/css" href="bfStyles.css" />
	</head>
	
	<body>
		<div id="wrapper">
			<div id="content" class="cf">
				<header>
					<a href="/" alt="The Data Skeptic Podcast"><img src="DSlogo_white.png"></a>
					<h1>Sasquatch Footprints</h1>
				</header>
				<p>Whether he is called Sasquatch, Bigfoot, or any of a wide variety of names, the topic of Bigfoot is controversial &mdash; some have no doubt these creatures exists, others do not see enough evidence. Regardless of where you stand, one cannot deny that Bigfoot has had a significant place in our folklore and popular culture. </p>

				<p>We&#39;d like your help testing what people think is the average size of Bigfoot&#39;s footprint, relative to an average human&#39;s foot. Please draw a footprint in the space below that reflects the size you think of for a bigfoot's print.</p>

				<div id="menu">
					<table>
						<tr>
							<td align="center">
								<div id="wPaint"></div>
							</td>
							<td>
								<img id="canvasImage" src=""/>
							</td>
						</tr>
					</table>
				</div>	
				<div>
					<center>
					<br/>
					<table>
					<tr>
					<td>This field contains a test code, take note if you come from Mechanical Turk: &nbsp; </td>
					<td><input id='code' style='width: 100px; font-size: 14pt' value='<? echo($code); ?>' /></td>
					</tr>
					</tr><tr>
					<td>What is your email? (optional)</td>
					<td><input id='email' style='width:250px; font-size: 14pt' /></td>
					</tr><tr>
					<td>With what probability (0.00 - 100.0%) do you think Bigfoot might be real? &nbsp; </td>
					<td><input id='prob' style='width: 100px; font-size: 14pt' /> % </td>
					</tr>
					</table>
					</center>
				</div>
				<div id="buttonHolder">
					<button class="butBase" id="clearBut" onclick='clearCanvas();'>Clear</button>
					<input class="butBase" id="subBut" type="button" value="Upload Image" onclick="upload_image('wPaint');"/>
				</div>
			</div>
		</div>
		<footer>
			<ul>
				<li><a href="/">DataSkeptic Podcast</a></li>
				<li><a href="../episodes.php">Show Notes</a></li>
				<li><a href="../blog.php">Blog</a></li>
				<li><a href="../resources.php">Resources</a></li>
				<li><a href="../contact.php">Contact</a></li>
			</ul>
		</footer>
		<script type="text/javascript">
			function dataURItoBlob(dataURI) {
			    // convert base64/URLEncoded data component to raw binary data held in a string
			    var byteString;
			    if (dataURI.split(',')[0].indexOf('base64') >= 0)
			        byteString = atob(dataURI.split(',')[1]);
			    else
			        byteString = unescape(dataURI.split(',')[1]);

			    // separate out the mime component
			    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

			    // write the bytes of the string to a typed array
			    var ia = new Uint8Array(byteString.length);
			    for (var i = 0; i < byteString.length; i++) {
			        ia[i] = byteString.charCodeAt(i);
			    }
			    return new Blob([ia], {type:mimeString});
			}


			var wp = $("#wPaint").wPaint({
				strokeStyle: '#000000',
				drawDown: function(e, mode){ $("#canvasDown").val(this.settings.mode + ": " + e.pageX + ',' + e.pageY); },
				drawMove: function(e, mode){ $("#canvasMove").val(this.settings.mode + ": " + e.pageX + ',' + e.pageY); },
				drawUp: function(e, mode){ $("#canvasUp").val(this.settings.mode + ": " + e.pageX + ',' + e.pageY); }
			}).data('_wPaint');
				
			function saveImage() {
				var imageData = $("#wPaint").wPaint("image");
				$("#canvasImage").attr('src', imageData);
				$("#canvasImageData").val(imageData);
			}

			function clearCanvas() {
				$("#wPaint").wPaint("clear");
			}
				
			function upload_image(id) {
				var imageData = $("#" + id).wPaint("image");
				var email = $('#email').val();
				var prob = $('#prob').val();
				var blob = dataURItoBlob(imageData);
				var fd = new FormData();
				fd.append('file', blob);
				$.ajax({
					url: 'hello.py/post_img?email=' + email + "&prob=" + prob,
					type: 'POST',
					data: fd,
					async: false,
					cache: false,
					enctype: 'multipart/form-data',
					processData: false,
					contentType: false,
					success: function(data) {
						alert('Thanks for participating');
						clearCanvas();
					}
				});
			}

			$.extend($.fn.wPaint.defaults, {
			  mode:        'pencil',  // set mode
			  lineWidth:   '3',       // starting line width
			  fillStyle:   '#FFFFFF', // starting fill style
			  strokeStyle: '#000000'  // start stroke style
			});
		</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51062432-1', 'dataskeptic.com');
  ga('send', 'pageview');

</script>

	</body>
</html>
