<?php
foreach($collections as $k=>$v) {
    echo '<div class="collection_row"><a class="collection_interface_link" data-collection-id="'.$v->id.'">'.$v->displayable_name.'</a></div>';
}
?>
