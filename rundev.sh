#docker-compose up -d --build
docker-compose exec php /bin/bash -c "composer install && php bin/console doctrine:migrations:migrate -n && php bin/console doctrine:fixtures:load -n"
#docker-compose exec php /bin/bash