<?php

  $requested = str_replace("/","",$_SERVER['REQUEST_URI']);
  $urls = include(__DIR__ . '/../urls.php');

?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
        <center>
            <?php
                if ($requested != '') {
                    if (array_key_exists($requested, $urls)) {
                        $fullURL = $urls[$requested];
                        echo("<h1>Redirecting...</h1><p>Redirecting to <a href='" . $fullURL . "'>" . $fullURL . "</a></p>");
                        echo("<p>Please click the link above if you are not redirected.</p>");
                        echo("<script> window.location.replace('" . $fullURL . "'); </script>");
                    } else {
                        http_response_code(404);
                        echo("<h1>Not Found</h1><p>'" . $requested . "' is not a valid short URL. Please try again.</p>");
                    }
                } else {
                    echo("<h1>Server Error</h1><p>Please specify a short URL.</p>");
                }
            ?>
	    </center>
    </body>
</html>