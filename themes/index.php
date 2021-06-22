<?php
$clientName=$_GET['clientName'];
$themeURL=$_GET['themeURL'];
?>
<html>
  <head>
    <title><?php echo $clientName;?> - Template Mockup</title>
    <style>
      body{overflow-y:hidden;}
    </style>
  </head>

  <body>
    <iframe width="100%" height="100%" src="<?php echo $themeURL;?>" frameborder=0></iframe>
  </body>
</html>
