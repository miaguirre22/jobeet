
REPO GitHub: https://github.com/frdepiaggio/jobeet.git Despues de Clonar:

INSTALAR DOCKER CE INSTALAR DOCKER COMPOSE

Comandos: sudo docker-compose up -d

sudo docker-compose ps

sudo docker-compose exec php-fpm bash

composer create-project symfony/website-skeleton:4.1 /tmp/jobeet/ cp -aR /tmp/jobeet/. . exit; sudo chown -R $USER:$USER .

En el .env poner: DATABASE_URL=mysql://user:password@mysql:3306/jobeet composer require knplabs/knp-paginator-bundle

bin/console doctrine:database:create --if-not-exists

bin/console doctrine:schema:validate

composer require doctrine/doctrine-migrations-bundle

bin/console doctrine:migration:diff

bin/console doctrine:migration:migrate

composer require --dev doctrine/doctrine-fixtures-bundle

bin/console doctrine:fixtures:load

bin/console debug:router

composer require stof/doctrine-extensions-bundle

bin/console doctrine:migrations:diff

bin/console doctrine:schema:drop --force --full-database

bin/console doctrine:migration:migrate

bin/console doctrine:fixtures:load

bin/console cache:clear

En config/packages/asset.yaml comentar json_manifest_path

composer require friendsofsymfony/user-bundle "~2.1"
