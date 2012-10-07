<h2>Edit Supra Mongodb Collection</h2>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->belongs_to_dropdown('SupraMongodbConnection',$sm_connections,array('empty'=>true)); ?>
<?php echo $this->form->input('name');?>
<?php echo $this->form->input('displayable_name');?>
<?php echo $this->form->checkbox_input('active',array('label'=>'Active'));?>
<?php echo $this->form->end('Update'); ?>
