<!doctype html>
<html>
    <head>
	<title>MVC site</title>
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link href="/css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
	<?php
	include_once 'app/views/'.$this->page.'.php';
	?>
	<script src="/js/main.js" type="text/javascript"></script>
    </body>
</html>