<?php

require 'core/Classloader.php';

$loader = new Classloader();

// ディレクトリを登録
$loader -> registerDir(dirname(__FILE__) . '/core');
$loader -> registerDir(dirname(__FILE__) . '/modules');

// オートロードに登録
$loader -> register();
