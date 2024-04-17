<?php

require_once  '/app/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class MessageSender {
    private $connection;
    private $channel;

    public function __construct($host, $port, $user, $password) {
        $this->connection = new AMQPStreamConnection($host, $port, $user, $password);
        $this->channel = $this->connection->channel();
    }

    /**
     * @param $messageBody
     * @return void
     * @throws Exception
     */
    public function sendMessage($messageBody) {
        $exchange = 'message_exchange';
        $queue = 'message_queue';
        $routingKey = 'message';

        // Declaração da exchange e da fila
        $this->channel->exchange_declare($exchange, 'direct', false, true, false);
        $this->channel->queue_declare($queue, false, true, false, false);
        $this->channel->queue_bind($queue, $exchange, $routingKey);

        // Criar uma mensagem com um identificador único
        $message = new AMQPMessage($messageBody, [
            'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT,
            'message_id' => uniqid() // Identificador único da mensagem
        ]);

        // Publicar a mensagem na exchange
        $this->channel->basic_publish($message, $exchange, $routingKey);

        echo "Mensagem enviada com sucesso. \n<br />Body: $messageBody \n";

        // Fechar a conexão
        $this->channel->close();
        $this->connection->close();
    }
}

// Exemplo de uso
$sender = new MessageSender('rabbitmq', 5672, 'guest', 'guest');
$messageBody = 'Teste, Roberto Ancelmo!';
$sender->sendMessage($messageBody);
