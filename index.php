<?php

  $requested = str_replace("/","",$_SERVER['REQUEST_URI']);
  $urls = include(__DIR__ . '/../urls.php');

?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * {
                font-family: Arial;
            }
            table {
                border-collapse: collapse;
                width: 60%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
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
                    if (empty($urls)) {
                        // URL list is empty
                        echo("<h1>Server Error</h1><p>No short URLs have been defined.</p>");
                    } else {
                        echo("<h1>Available short URLs</h1>");
                        echo("<table><tr><th>Short URL</th><th>Full URL</th></tr>");
                        foreach ($urls as $key => $value) {
                            echo("<tr><td>".$key."</td><td><a href='".$value."'>".$value."</a></td></tr>");
                        }
                        echo("</table>");
                    }
                }
            ?>
	    </center>
    </body>
</html>
