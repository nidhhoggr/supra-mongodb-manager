<?php

$m = new Mongo('mongodb://root:root@localhost:27017/test');

$db = $m->test;

$doc = $db->ehealthrates->findOne();

var_dump($doc['_id']->__toString());



