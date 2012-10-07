<h2>Update <?=$collection->displayable_name ?></h2>
<form class="mongodb_document_modifier" data-collection-id="<?=$collection->id?>" data-object-id="<?=$document['_id']?>">
    <?php 
    foreach($fields as $field) {
        $id=$model->name . ucfirst($field->name);
        echo '<div>';
        echo '<label for="'.$id.'">'.$field->displayable_name.'</label>';
        echo '<input type="text" id="'.$id.'" name="data['.$model->name.']['.$field->name.']" value="'.$document[$field->name].'"/>';
        echo '</div>';
    }
    ?>
    <input type="submit" value="Update" />
</form>

