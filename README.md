# TMDC Lumen Microservice Template

A template for TMDC microservices. Powered by Lumen, MySQL, and RabbitMQ. The architecture is event-driven and also follows the event sourcing paradigm.
Long-lived distributed transactions follow the event/choreography-based [Saga pattern](https://blog.couchbase.com/saga-pattern-implement-business-transactions-using-microservices-part/).

## Installation

1. Clone the repository.
2. Copy `.env.example` as `.env`. Tweak accordingly.
3. Copy `phpunit.xml.dist` as `phpunit.xml`. Tweak accordingly.
4. Provide necessary keys in `storage/keys` directory.
    - `oauth-private.key` - It is a private RSA key generated. It is used to generate access tokens for clients to use. This is required by issuers.
    - `oauth-public.key` - It is a public RSA key provided by the API gateway. It is used for verifying the signature of access tokens. This is required by clients.
5. Build using `docker-compose` (See Usage).

## Usage

### Building the Image

Docker will reference your `.env` in order to spin up the different services defined in `docker-compose.yml`. This will only build on the first time it is upped. The subsequent `up`s should be faster.

```bash
$ docker-compose up
```

### Lumen Shell

While you are in the project folder, access the Lumen shell:

```bash
$ docker-compose exec lumen sh
```

If your development environment is running on Linux (or even WSL), you can setup a bash alias in your `~/.bashrc`. Like so:

```bash
alias lumen='bash scripts/lumen-shell.sh'
```

Then you can quickly access a Lumen shell using:

```bash
$ lumen
```

## Making Requests

To interface with the API, requests sent to it must have a proper `Accept` header like:

```
Accept: application/vnd.YOUR_APP_NAME.v1+json
```

This is used to let the API know what API version the request needs. Normally, the API gateway handles this for you. See [Dingo Documentation](https://github.com/dingo/api/wiki/Making-Requests-To-Your-API) for more information. The advantages of this approach, compared to indicating the API version in the URI, is also discussed [here](https://restfulapi.net/versioning/).

## Container Commands

While inside the Lumen container, you can:

### Artisan

Run artisan commands

```bash
$ php artisan
```

### Roles Seeding

Run the `BouncerSeeder` class to seed default roles from `config/roles.php` and your service's permission rules:

```bash
$ composer make-permissions
```

### Linting

Run linting - check for coding style violations:

```bash
$ composer lint
```

### Testing

Run tests - runs the created unit and functional tests found in the `tests` folder:

```bash
$ composer test
```

Run more informative and verbose tests:

```bash
$ composer test-dox
```

### Event Listeners

When event listeners have been created, you can generate the `supervisord-rabbitevents.conf` using:

```bash
$ composer make-rabbitevents-conf
```

It will create the RabbitMQ consumers for each listened event.

### API Documentation

Create basic API documentation using [dingo/api](https://github.com/dingo/api/wiki/API-Blueprint-Documentation) that is API Blueprint 1A standard compliant.

```bash
$ composer make-api-doc
```

You can view the generated `DOCUMENTATION.apib` using a VSCode extension: [API Blueprint Viewer](https://marketplace.visualstudio.com/items?itemName=develiteio.api-blueprint-viewer) or any other supported `apib` parser.

## Coding Style

This template follows the [PSR-2](https://www.php-fig.org/psr/psr-2/) coding standard and the [PSR-4](https://www.php-fig.org/psr/psr-4/) autoloading standard.

## Acknowledgements

-   [Event-Driven Architecture Primer - incredible talk about event-driven architecture](https://www.youtube.com/watch?v=STKCRSUsyP0)
-   [Spatie Event Sourcing - for storing events](https://spatie.be/docs/laravel-event-sourcing/v5/introduction)
-   [Rabbitevents - for broadcasting events to RabbitMQ](https://nuwber.github.io/rabbitevents/)
-   [Rabbitevents Sourcing - for making Spatie Event Sourcing and Rabbitevents together](https://github.com/jg-rivera/laravel-rabbitevents-sourcing)
-   [Jaeger PHP Client - for distributed tracing instrumentation](https://github.com/jonahgeorge/jaeger-client-php)
-   [Bouncer - for handling abilities, permissions, and roles](https://github.com/JosephSilber/bouncer)

## License

[MIT](https://choosealicense.com/licenses/mit/)
