# TMDC Lumen Microservice Template

A template for TMDC microservices. Powered by Lumen, MySQL, and RabbitMQ. The architecture is event-driven and also follows the event sourcing paradigm.

## Installation

1. Clone the repository.
2. Copy `.env.example` as `.env`. Tweak accordingly.
3. Copy `phpunit.xml.dist` as `phpunit.xml`. Tweak accordingly.
4. Provide `storage/keys/oauth-public.key`. It is a public RSA key provided by the API gateway.
5. Build using `docker-compose`. It will reference your `.env`.

```bash
$ docker-compose up
```

## Usage

While you are in the project folder, access the Lumen shell:

```bash
$ docker-compose exec lumen sh
```

If your host is machine is running on Linux, you can setup a bash alias in your `~/.bashrc`. Like so:

```bash
alias lumen='bash scripts/lumen-shell.sh'
```

Then you can access a Lumen shell using:

```bash
$ lumen
```

## Container Commands

While inside the Lumen container, you can:

Run artisan commands

```bash
$ php artisan
```

Run linting - check for coding style violations:

```bash
$ composer lint
```

Run tests - runs the created unit and functional tests found in the `tests` folder:

```bash
$ composer test
```

Run more informative and verbose tests:

```bash
$ composer test-dox
```

When event listeners have been created, you can generate the `supervisord-rabbitevents.conf` using:

```bash
$ composer make-rabbitevents-conf
```

It will create the RabbitMQ consumers for each listened event.

Create API documentation using [dingo/api](https://github.com/dingo/api/wiki/API-Blueprint-Documentation) that is API Blueprint 1A standard compliant.

```bash
$ composer make-api-doc
```

You can view the generated `DOCUMENTATION.apib` using a VSCode extension: [API Blueprint Viewer](https://marketplace.visualstudio.com/items?itemName=develiteio.api-blueprint-viewer)

## Coding Style

This template follows the PSR-2 coding standard and the PSR-4 autoloading standard.

## Acknowledgements

-   [Event-Driven Architecture Primer - incredible talk about event-driven architecture](https://www.youtube.com/watch?v=STKCRSUsyP0)
-   [Spatie Event Sourcing - for storing events](https://spatie.be/docs/laravel-event-sourcing/v5/introduction)
-   [Rabbitevents - for broadcasting events to RabbitMQ](https://nuwber.github.io/rabbitevents/)
-   [Rabbitevents Sourcing - for making Spatie Event Sourcing and Rabbitevents together](https://github.com/jg-rivera/laravel-rabbitevents-sourcing)
-   [Jaeger PHP Client - for distributed tracing instrumentation](https://github.com/jonahgeorge/jaeger-client-php)

## License

[MIT](https://choosealicense.com/licenses/mit/)
