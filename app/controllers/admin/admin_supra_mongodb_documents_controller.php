<?php

class AdminSupraMongodbDocumentsController extends MvcAdminController {
	
	var $default_columns = array('id', 'name');


    public function index() {
        $this->some_var = $this->getActiveCollections();
    }

    public function getActiveCollections() {

        $this->load_model('SupraMongodbCollection');
        $this->load_model('SupraMongodbField');
        foreach($this->SupraMongodbCollection->findAllActive() as $collection) {
            $fields = $this->SupraMongodbField->findActiveByCollectionId($collection_id);
            $result['collection'][] = $collection;
            $result['fields'][] = $fields;
        }

        $this->recursive_collections = $result;
    }
 
    public function getActiveFieldsByCollectionId() {

    }
}

?>
