<?php
MvcRouter::admin_ajax_connect(array('controller'=>'admin_supra_mongodb_documents','action'=>'show'));
MvcRouter::admin_ajax_connect(array('controller'=>'admin_supra_mongodb_documents','action'=>'add'));
MvcRouter::admin_ajax_connect(array('controller'=>'admin_supra_mongodb_documents','action'=>'index'));
MvcRouter::admin_ajax_connect(array('controller'=>'admin_supra_mongodb_connections','action'=>'index'));
MvcRouter::admin_ajax_connect(array('controller'=>'admin_supra_mongodb_collections','action'=>'index'));
MvcRouter::admin_ajax_connect(array('controller'=>'admin_supra_mongodb_fields','action'=>'index'));
MvcRouter::admin_ajax_connect(array('controller'=>'admin_supra_mongodb_documents','action'=>'edit'));
