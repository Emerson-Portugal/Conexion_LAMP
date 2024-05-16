#!/bin/bash

# Start MySQL service
service mysql start

# Wait for MySQL to be up and running
until mysqladmin ping; do
    sleep 1
done

# Initialize database
mysql < /docker-entrypoint-initdb.d/createDB.mysql

# Start Apache service
service apache2 start

# Keep the container running
tail -f /dev/null
