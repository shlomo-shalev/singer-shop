#!/usr/bin/env bash
set -e

role=${CONTAINER_ROLE:-php_fpm}

if [ "$role" = "php_fpm" ]; then
    exec php-fpm
    exit 1;
fi