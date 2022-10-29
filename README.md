## start

1. copy .env.example and change name of newc file to .env .
2. set value for DB_PASSWORD attribute in .env file.
3. after install docker, run "docker-compose --env-file .env up -d server".
4. run "docker-compose run --rm artisan key:generate".
5. run "docker-compose run --rm artisan migrate".