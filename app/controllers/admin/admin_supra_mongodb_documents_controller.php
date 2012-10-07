<?php

class AdminSupraMongodbDocumentsController extends MvcAdminController {
	
    var $default_columns = array('id', 'name');

    public function index() {
        $this->_getActiveCollections();
    }

    public function show() {
        extract($this->_getActiveCollectionsAndFieldsByCollectionId($this->params['id']));

        $this->set('documents',$this->getDocuments($collection,$fields));
        $this->set('collection', $collection);
        $this->set('fields', $fields);
    }

    private function _getActiveCollectionsAndFieldsByCollectionId($collection_id) {
        $this->load_model('SupraMongodbCollection');
        $this->load_model('SupraMongodbField');

        $collection = $this->SupraMongodbCollection->find_one_by_id($collection_id, array(
            'conditions'=>array('active'=>1)
        ));

        $fields = $this->SupraMongodbField->find_by_supra_mongodb_collection_id($collection_id, array(
            'conditions'=>array('active'=>1)
        ));

        return compact('collection','fields');
    }

    public function getMongoConnection() {
        $this->load_model('SupraMongodbConnection');
        
        $connection = $this->SupraMongodbConnection->find_one(array('conditions'=>array('active'=>1)));

        $server_url = 'mongodb://';
 
        if(!empty($connection->username) && !empty($connection->password))
            $server_url .= $connection->username . ':' . $connection->password . '@';
        
        $server_url .= $connection->host;
 
        if(!empty($connection->port))
            $server_url .= ':' . $connection->port;

        $server_url .= '/' . $connection->database_name;

        $m = new Mongo($server_url);

        return $m->{$connection->database_name};
    }

    public function getDocuments($collection,$fields) {

        $db = $this->getMongoConnection();
        $return_fields = array();

        foreach($fields as $field) {
            $return_fields[$field->name] = true;
        }

        return $db->{$collection->name}->find(array(),$return_fields);
    }

    public function edit() {
        extract($this->_getActiveCollectionsAndFieldsByCollectionId($this->params['collection_id']));

        $db = $this->getMongoConnection();

        $document = $db->{$collection->name}->findOne(array('_id'=> new MongoId($this->params['_id'])));

        parse_str($this->params['formdata'],$params);

        if (!empty($params['data'][$this->model->name])) {
    
            $criteria['_id'] = new MongoId($this->params['_id']);

            foreach($fields as $field) {
                $update_fields[$field->name] = $params['data'][$this->model->name][$field->name];
            }

            $result = $db->{$collection->name}->update($criteria,array('$set'=>$update_fields));
 
            if($result) { 
                $this->flash('notice','successfully updated document.');
                $document = $db->{$collection->name}->findOne(array('_id'=> new MongoId($this->params['_id'])));
            }
            else {
                $this->flash('notice','something went wrong.');
            }

        }

        $this->set('document', $document);
        $this->set('collection', $collection);
        $this->set('fields', $fields);
    }
 
    public function add() {

        extract($this->_getActiveCollectionsAndFieldsByCollectionId($this->params['collection_id']));

        parse_str($this->params['formdata'],$params);

    	if (!empty($params['data'][$this->model->name])) {

            $db = $this->getMongoConnection();

            foreach($fields as $field) {
                $insert_fields[$field->name] = $params['data'][$this->model->name][$field->name];
            }

            $result = $db->{$collection->name}->insert($insert_fields);

            if($result) {
                $this->flash('notice','successfully created document.');
                $document = $db->{$collection->name}->findOne(array('_id'=> new MongoId($insert_fields['_id'])));
                var_dump($insert_fields);
                var_dump($document);
            }
            else {
                $this->flash('notice','something went wrong.');
            }


            $this->refresh();
        }

        $this->set('collection', $collection);
        $this->set('fields', $fields);
    }

    public function delete() {

    }

    public function _getActiveCollections() {
        $this->load_model('SupraMongodbCollection');
        $this->set('collections',$this->SupraMongodbCollection->findAllActive());
    }
 
    public function _getActiveFieldsByCollectionId($collection_id) {

    }
}

?>
