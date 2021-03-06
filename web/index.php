<?php
namespace Radar\Adr;

require '../vendor/autoload.php';

$boot = new Boot(dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env');
$adr = $boot->adr();

$adr->get('Hello', '/{name}?', function (array $input) {
        $payload = new \Aura\Payload\Payload();
        return $payload
            ->setStatus($payload::SUCCESS)
            ->setOutput([
                'phrase' => 'Hello ' . $input['name']
            ]);
    })
    ->defaults(['name' => 'world']);

$adr->run();
