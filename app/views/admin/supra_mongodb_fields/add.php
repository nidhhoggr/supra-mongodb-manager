<h2>Add Supra Mongodb Field</h2>
<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->belongs_to_dropdown('SupraMongodbCollection',$sm_collections,array('empty'=>true)); ?>
<?php echo $this->form->input('name');?>
<?php echo $this->form->input('displayable_name');?>
<?php echo $this->form->checkbox_input('active',array('label'=>'Active'));?>
<?php echo $this->form->end('Add'); ?>
