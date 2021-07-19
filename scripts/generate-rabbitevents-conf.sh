#!/bin/sh

CONFIG_FILE=supervisord-rabbitevents.conf
MEMORY_ALLOCATION_MB=256

writeEvent() {
    EVENT_NAME=$1
    echo "[program:${EVENT_NAME}.listener]" >> $CONFIG_FILE
    echo "directory=/var/www/html" >> $CONFIG_FILE
    echo "command=php artisan rabbitevents:listen ${EVENT_NAME} --memory=${MEMORY_ALLOCATION_MB} --timeout=60 --tries=3 --sleep=5" >> $CONFIG_FILE
    echo "user=appuser" >> $CONFIG_FILE
    echo "autostart=true" >> $CONFIG_FILE
    echo "autorestart=true" >> $CONFIG_FILE
    echo "stopasgroup=true" >> $CONFIG_FILE
    echo "killasgroup=true" >> $CONFIG_FILE
    echo "redirect_stderr=true" >> $CONFIG_FILE
    echo "stopwaitsecs=3600" >> $CONFIG_FILE
}

php artisan rabbitevents:list |
{
while read CMD; do
    writeEvent $CMD
done
}