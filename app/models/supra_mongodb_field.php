<?php

class SupraMongodbField extends MvcModel {

	var $display_field = 'displayable_name';
        var $belongs_to = array(
            'SupraMongodbCollection' => array(
                'foreign_key' => 'supra_mongodb_collection_id'
            )
        );

        public function findAllActiveByCollectionId() {
            return $this->find(array(
                                     'conditions'=>array('SupraMongodbField.active'=>1,'SupraMongodbField.supra_mongodb_collection_id'=>$collection_id)
                                    ));
        }
}

?>
