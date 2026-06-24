#!/usr/bin/env sh

# Create the directory on the volume if it doesn't exist
mkdir -p /var/www/html/storage/database

# Create the blank sqlite file if it doesn't exist
if [ ! -f /var/www/html/storage/database/database.sqlite ]; then
    echo "Creating database.sqlite file..."
    touch /var/www/html/storage/database/database.sqlite
fi

# Ensure the web server (www-data) owns it so it can read/write to it
chown -R www-data:www-data /var/www/html/storage/database

# Run your database migrations safely
echo "Running database migrations..."
php artisan migrate --force

# Run user scripts, if they exist
for f in /var/www/html/.fly/scripts/*.sh; do
    # Bail out this loop if any script exits with non-zero status code
    bash "$f" -e
done

if [ $# -gt 0 ]; then
    # If we passed a command, run it as root
    exec "$@"
else
    exec supervisord -c /etc/supervisor/supervisord.conf
fi
