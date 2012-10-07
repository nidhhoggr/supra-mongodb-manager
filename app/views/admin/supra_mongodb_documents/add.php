<h2>Add <?=$collection->displayable_name ?></h2>
<form class="mongodb_document_creator" data-collection-id="<?=$collection->id?>">
<?php 
foreach($fields as $field) {
    $id=$model->name . ucfirst($field->name);
    echo '<div>';
    echo '<label for="'.$id.'">'.$field->displayable_name.'</label>';
    echo '<input type="text" id="'.$id.'" name="data['.$model->name.']['.$field->name.']" />';
    echo '</div>';
}
?>
<input type="submit" value="Add" />
</form>
