# URLS
An easy URL shortener service written in PHP.

# Setting up
1. Copy the `urls.php` file from this repository, save it on your host, and populate it with your URL mappings.
2. Run the container by executing `docker run --rm -d -v /path/to/urls.php:/var/www/urls.php -p 8000:80 luketainton/urls:latest`. Please edit `/path/to/urls.php` to the path on your host system.
3. Navigate to http://127.0.0.1:8000 (or the port you used in the command above) and test it!

An example `docker-compose.yml` file is available in the repository.

# Updating urls.php
If you make any changes to the `urls.php` file on your host, while it is not necessary, it is recommended that you restart the container.