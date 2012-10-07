<?php

class SupraMongodbCollection extends MvcModel {

	var $display_field = 'displayable_name';
        var $belongs_to = array(
            'SupraMongodbConnection' => array(
                'foreign_key' => 'connection_id'
            )
        );
        var $has_many = array( 
            'SupraMongodbField' => array(
                'dependent' => true
            ) 
        );

        public function findAllActive() {

            return $this->find(array('active'=>1));

        }
}

?>
