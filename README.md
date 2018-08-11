JOBEET
REPO GitHub: https://github.com/frdepiaggio/jobeet.git Despues de Clonar:

INSTALAR DOCKER CE INSTALAR DOCKER COMPOSE

Comandos: INICIAR DOCKER POR PRIMERA VEZ

	sudo docker-compose up -d

VER ESTADO DEL DOCKER COMPOSE

	sudo docker-compose ps

EJECUTAR EL CONTENEDOR PHP

	sudo docker-compose exec php-fpm bash

CREAR EL PROYECTO SYMFONY

	composer create-project symfony/website-skeleton:4.1 /tmp/jobeet/
	cp -aR /tmp/jobeet/. .
	exit;
	sudo chown -R $USER:$USER .

CONFIGURAR LA DATABASE En el archivo: .env poner:

	DATABASE_URL=mysql://user:password@mysql:3306/jobeet
	composer require knplabs/knp-paginator-bundle

CREAR BASE DE DATOS CON DOCTRINE

	bin/console doctrine:database:create --if-not-exists

VALIDAR ESQUEMA DE LA DATABASE CON DOCTRINE

	bin/console doctrine:schema:validate

INSTALAR PAQUETE DE MIGRACION DE DOCTRINE

	composer require --dev doctrine/doctrine-migrations-bundle

MIGRAR DATOS DE ENTITIES Y FIXTURES A LA DATABASE

	bin/console doctrine:migration:diff

	bin/console doctrine:migration:migrate

	bin/console doctrine:fixtures:load

VER ESTADOS DE RUTAS

	bin/console debug:router

INSTALAR stof PARA EXTENSIONES DE RUTAS (usado para las categorias en este caso)

	composer require stof/doctrine-extensions-bundle

SE VUELVE A MIGRAR TODO POR AGREGAR EL stof A LAS CATEGORIAS

	bin/console doctrine:migrations:diff

	bin/console doctrine:schema:drop --force --full-database

	bin/console doctrine:migration:migrate

	bin/console doctrine:fixtures:load

BORRAR LA CACHE DE SYMFONY(IMPORTANTE)

	bin/console cache:clear

IMPORTANTE

En config/packages/asset.yaml comentar json_manifest_path
INSTALAR EL SIGUIENTE BUNDLE

	composer require friendsofsymfony/user-bundle "~2.1"
