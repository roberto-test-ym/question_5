# Teste para Desenvolvedor Sênior Back-end - Questão #5

[![PHP Version][ico-php-version]](https://hub.docker.com/_/php)
[![NGINX Version][ico-nginx-version]](https://hub.docker.com/_/nginx)

## Get it up and running

[Install docker on your machine.][install-docker]

[Install docker-compose on your machine.][install-docker-compose]

Clone this repository.

``` bash
$ git clone https://github.com/roberto-test-ym/question_5.git
```

Switch to the cloned directory.

``` bash
$ cd question_5
```

RabbitMq with composer.

``` bash
$ composer require php-amqplib/php-amqplib
```

Start the stack.

``` bash
$ docker-compose up -d 
```


Visit `localhost:8080` in your browser.

## Objetivo

``` bash
Integração e Microsserviços Escreva um programa em php que use rabbitmq para
enviar uma mensagem com um identificador único e confirmar que a mensagem foi
devidamente entregue. Explique qual método usou para garantir que a mensagem
foi devidamente processada
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-php-version]: https://img.shields.io/badge/PHP-7.4--fpm-blue?style=flat-square
[ico-nginx-version]: https://img.shields.io/badge/NGINX-1.17-green?style=flat-square
[install-docker]: https://docs.docker.com/engine/installation
[install-docker-compose]: https://docs.docker.com/compose/install
