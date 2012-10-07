<?php

class SupraMongodbCollection extends MvcModel {

	var $display_field = 'displayable_name';
        var $belongs_to = array(
            'SupraMongodbConnection' => array(
                'foreign_key' => 'supra_mongodb_connection_id'
            )
        );
        var $has_many = array( 
            'SupraMongodbField' => array(
                'dependent' => true
            ) 
        );

        public function findAllActive() {
            return $this->find(array(
                                     'conditions'=>array('SupraMongodbCollection.active'=>1)
                                    ));
        }
}

?>
