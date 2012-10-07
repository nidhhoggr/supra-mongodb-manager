<?php

class AdminSupraMongodbCollectionsController extends MvcAdminController {
	
	var $default_columns = array('name','displayable_name');

        var $default_searchable_fields = array('name','displayable_name');

        public function add() {
            parent::add();
            $this->_set_connections();
        }

        public function edit() {
            parent::edit();
            $this->_set_connections();
        }

        private function _set_connections() {
            $this->load_model('SupraMongodbConnection');
            $sm_connections = $this->SupraMongodbConnection->find(array('selects' => array('id', 'name')));
            $this->set('sm_connections', $sm_connections);
        }
}

?>
