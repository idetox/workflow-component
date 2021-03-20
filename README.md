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
