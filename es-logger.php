<?php
require_once "./vendor/autoload.php";

use Monolog\Logger;
use Elasticsearch\Client;
use Monolog\Handler\ElasticsearchHandler;

$es_hosts = ['http://10.152.183.132:9200'];

$client = \Elasticsearch\ClientBuilder::create()
    ->setHosts($es_hosts)
    ->build();

$options = array(
    'index' => 'elastic_index_name',
    'type'  => 'elastic_doc_type',
);

$handler = new ElasticsearchHandler($client, $options);
$log = new Logger('application');
$log->pushHandler($handler);

// You can now use your logger
$log->info('My logger is now ready');
$log->debug('This is a debug log');
$log->warning('Warning Message!!');
$log->error('DANGER ERROR Message!!');
