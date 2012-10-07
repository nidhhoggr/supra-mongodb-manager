<?php
MvcConfiguration::set(array(
  'Debug' => false
));

MvcConfiguration::append(array(
    'AdminPages' => array(
        'supra_mongodb_documents' => array(
            'add'=>array('in_menu'=>false)
        )
    )
));

?>
