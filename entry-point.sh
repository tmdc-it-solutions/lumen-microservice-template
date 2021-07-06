#!/bin/sh

# copy from the image backup location to the volume mount
cp -a /var/www/html_backup/vendor/* /var/www/html/vendor/

# this next line runs the docker command
exec "$@"