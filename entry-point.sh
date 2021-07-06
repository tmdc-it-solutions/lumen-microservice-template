#!/bin/sh

# copy from the image backup location to the volume mount
echo "Synchronizing vendor files..."
rsync -a --stats /var/www/cache/vendor/* /var/www/html/vendor/
echo "Synchronized vendor files"

# run PHP server
exec php -S lumen:8000 -t public # port 8000 here will be overwritten by config