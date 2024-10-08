<?php

declare(strict_types=1);

$basePath = __DIR__ . '/../../';
require_once $basePath . 'OpenSearch/Thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;

$loader = new ThriftClassLoader();

$loader->registerNamespace('Thrift', $basePath . 'OpenSearch');
$loader->registerNamespace('OpenSearch', $basePath);
$loader->registerDefinition('OpenSearch', $basePath);
$loader->register();
