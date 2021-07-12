#!/bin/sh

VENDOR_DIR="/var/www/html/vendor/"
CACHE_DIR="/var/www/cache/vendor/*"

# Synchronize cache directory to vendor directory if vendor does not exist
if ![ -d "$VENDOR_DIR" ]; then
    echo "Synchronizing vendor files..."
    rsync -a --stats $CACHE_DIR $VENDOR_DIR
    echo "Synchronized vendor files"
fi

exec supervisord -c /etc/supervisord.conf 