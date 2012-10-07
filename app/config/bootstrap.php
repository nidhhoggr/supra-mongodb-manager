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

        wp_enqueue_script(
                'mongodb-script',
                mvc_js_url('supra-mongodb-manager','main'),
                array('jquery')
        );
