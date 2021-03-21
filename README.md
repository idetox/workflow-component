# Introduction to Workflow Component

### Prerequisites

#### Composer
```bash
$ composer install
```
#### MySql
```bash 
$ docker-compose up -d
$ php bin/console doctrine:database:create
$ php bin/console doctrine:migration:migrate
$ php bin/console doctrine:fixtures:load
```

#### Generating flow schema
```bash 
$ php bin/console workflow:dump account_status --dump-format=puml | java -jar plantuml.jar -p  > graph.png
$ php bin/console workflow:dump account_status | dot -Tpng -o graph.png
$ php bin/console workflow:dump account_status SYNCHRONIZED | dot -Tpng -o graph.png
```