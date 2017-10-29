# chat

Chat is a realtime chat application built with Laravel.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

* PHP 7.0+
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* One of the four Laravel compatible databases(and corresponding PHP extension for the database):
    * MySQL
    * PostgreSQL
    * SQLite
    * SQL Server
* Composer

### Installing

Start by cloning the repository.

```
git clone https://gitlab.com/prowolf/chat.git
```

Change directory into the repository directory.

```
cd chat
```

Use composer to install the dependencies.

```
composer install
```

Create a .env file from a copy of the example.

```
cp .env.example .env
```

Use an editor of your choice to edit the .env file to use the correct values for your environment.

Generate an app key to secure your data.

```
php artisan key:generate
```

Generate a passport key to secure your api data.

```
php artisan passport:keys
```

Run the database migrations.

```
php artisan migrate
```

Run the database seeder if you want to fill the database with example data for testing.

```
php artisan db:seed
```

The website is now configured and ready to be served. This can be achieved using a web server, however you may need to grant the web server write permissions to the `storage` and the `bootstrap/cache` directories, or PHP's built in development server.

To use PHP's built in development server run the serve command.

```
php -S localhost:8000 -t public/
```

By default the HTTP-server will listen to port 8000. However if that port is already in use or you wish to serve multiple applications this way, you might want to specify what port to use. This can be done by changing the 8000 to the port number you want to use. 

## Deployment

Follow the installation instructions to get a copy off the project on your machine and use the information bellow to configure it for use on a live system.

You should configure your web server's document / web root to be the `public` directory. The `index.php` in this directory serves as the front controller for all HTTP requests entering your application.

The config and route files can be cached for performance improvements.

```
php artisan config:cache
php artisan route:cache
```

The files must be cached again if any changes are made.

The class files can be added to an optimised class loader for better performance.

```
php artisan optimize
```

This command must be run again if any changes are made to the class files in the optimized class loader.

## Built With

* [Laravel](https://laravel.com) - Web framework
* [Composer](https://getcomposer.org) - Dependency management for PHP

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Changelog

All notable changes to this project will be documented in [CHANGELOG.md](CHANGELOG.md). The changelog format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/) and adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## Versioning

We use [SemVer](http://semver.org/spec/v2.0.0.html) for versioning. For the versions available, see the [tags on this repository](https://gitlab.com/prowolf/chat/tags). 

## Authors

* **ProWolf** - *Initial work* - [ProWolf](https://gitlab.com/ProWolf)

See also the list of [contributors](https://gitlab.com/prowolf/chat/graphs/master) who participated in this project.

## License

This project is licensed under the MIT License (MIT) - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

* Thank you to the Laravel team.