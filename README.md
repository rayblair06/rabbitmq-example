# RabbitMQ Laravel 8 Example

## Installation

At the current moment there are no instructions for installing `rabbitmq` within this repo, you will have to install and configure it yourself.

Make sure to configure both Laravel instances, and that `QUEUE_CONNECTION=rabbitmq` and the `RABBITMQ` credientials are configured within `.env`. You can find an example within `.env.example` but i've included one below.

```
RABBITMQ_HOST=
RABBITMQ_PORT=5672
RABBITMQ_USER=
RABBITMQ_PASSWORD=
RABBITMQ_VHOST=
```

Install and serve this laravel application as you wish, making note that you need to run two instances from folder root.

```
./consumer/public
./sender/public
```

## Usage

Initialise the `consumer` by running `php artisan rabbitmq:consume`

You can send messages to the `consumer` by running the following commands with the `sender` application.

```
php artisan ping:job // Simply returns a 'Ping Event Received' string on consumer.
php artisan user:job // Returns a json string of a factory model of a user to the consumer.
```
