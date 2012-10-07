<?php

class AdminSupraMongodbFieldsController extends MvcAdminController {
	
        var $default_columns = array('name','displayable_name');
        var $default_searchable_fields = array('name','displayable_name');


        public function add() {
            parent::add();
            $this->_set_collections();
        }

        public function edit() {
            parent::edit();
            $this->_set_collections();
        }

        private function _set_collections() {
            $this->load_model('SupraMongodbCollection');
            $sm_collections = $this->SupraMongodbCollection->find(array('selects' => array('id', 'displayable_name')));
            $this->set('sm_collections', $sm_collections);
        }

	
}

?>
