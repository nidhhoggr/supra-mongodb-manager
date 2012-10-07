<h2><?=$collection->displayable_name?></h2>
<table class="widefat post fixed">
  <thead>
    <tr>

<?php

foreach($fields as $field) {
    echo '<th scope="col" class="manage-column">'.$field->displayable_name.'</th>';
}
?>
    <th scope="col" class="manage-column">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($documents as $document) {
    echo '<tr>';
    foreach($fields as $field) {
        echo '<td>'.$document[$field->name].'</td>';
    }
    echo '<td><a class="document_modification_link" data-object-id="'.$document['_id'].'">edit</a></td>';
    echo '<td><a class="document_creation_link" data-object-id="'.$document['_id'].'">add</a></td>';
    echo '</tr>';
}
?>
  </tbody>
</table>

