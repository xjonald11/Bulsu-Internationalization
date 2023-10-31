<!DOCTYPE html>
<html>
<head>
<title>Foreign Travel Form</title>
<!-- <link rel="stylesheet" href="../css/login.css"> -->
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
<script>
            function getPage(url){
                $('#content').hide(1000,function(){
                $('#content').load(url);
                $('#content').show(1000,function(){});
                });
            }

        </script>
</head>
<body>
<div id="wrap">
<div id="header">
<div id="logo">
<h1 style="text-align: center;color: green;"><span><!--<img src="image/Address Book.png" alt="logo"/>--></span>Foreign Travel Form</h1>  
</div>
</div>

<div id="content">
    
    <h1 style="margin-left: 5em;"> Success</h1>
    <h2 style="color: green">You have successful Edit you information</h2>
    
</div>

<div class= "clear"></div>

<!-- <div id="footer">
&copy;coders 2014
</div> -->
</div>
</body>
</html>
<?php
    $loc = "./index.php";
					
					echo '<script> 
					
					function refPage() {
						var loc = "'.$loc.'";
						document.location = loc;
					}
					
					setInterval(\'refPage()\', 2000);
					
					</script>';
?>