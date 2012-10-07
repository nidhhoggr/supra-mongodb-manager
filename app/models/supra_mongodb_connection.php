<?php

class SupraMongodbConnection extends MvcModel {

	var $display_field = 'name';

        var $has_many = array( 
            'SupraMongodbCollection' => array(
                'dependent' => true
            ) 
        );
}

?>
