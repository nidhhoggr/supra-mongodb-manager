<h2>Add Supra Mongodb Connection</h2>
<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('name'); ?>
<?php echo $this->form->input('username'); ?>
<?php echo $this->form->input('password'); ?>
<?php echo $this->form->input('host'); ?>
<?php echo $this->form->input('port'); ?>
<?php echo $this->form->input('database_name'); ?>
<?php echo $this->form->checkbox_input('active',array('label'=>'Active'));?>
<?php echo $this->form->end('Add'); ?>
