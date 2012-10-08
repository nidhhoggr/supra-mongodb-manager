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

add_action('mvc_admin_init','supramongodb_on_mvc_admin_init');

function supramongodb_on_mvc_admin_init($options) {
    wp_register_style('mongodb-style',mvc_css_url('supra-mongodb-manager','main'));
    wp_enqueue_style('mongodb-style');
    wp_enqueue_script(
        'mongodb-script',
         mvc_js_url('supra-mongodb-manager','main'),
         array('jquery')
    );
}
