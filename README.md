# TMDC Lumen Microservice Template

A template for TMDC microservices. Powered by Lumen, MySQL, and RabbitMQ. The architecture is event-driven and also follows the event sourcing paradigm.

## Installation

Clone the repository. Install using Docker. It will build once on deployment.

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

Run tests

```bash
$ phpunit
```

## Coding Style
This template follows the PSR-2 coding standard and the PSR-4 autoloading standard.

## Acknowledgements

-   [Event-Driven Architecture Primer](https://www.youtube.com/watch?v=STKCRSUsyP0)

## License

[MIT](https://choosealicense.com/licenses/mit/)
