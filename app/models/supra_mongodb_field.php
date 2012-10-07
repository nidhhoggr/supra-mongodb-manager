<?php

class SupraMongodbField extends MvcModel {

	var $display_field = 'displayable_name';
        var $belongs_to = array(
            'SupraMongodbCollection' => array(
                'foreign_key' => 'collection_id'
            )
        );

        public function findActiveByCollectionId($collection_id) {

            return $this->find(array('active'=>1,'collection_id'=>$collection_id));

        }
}

?>
