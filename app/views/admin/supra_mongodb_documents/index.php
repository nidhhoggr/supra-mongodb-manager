<pre>
<?php
print_r($this->recursive_collections);
?>
</pre>

<?php

$collections = $this->recursive_collections['collection'];
$fields = $this->recursive_collections['fields'];
foreach($collections as $k=>$v) {

    echo $v->displayable_name;

    foreach($fields[$k] as $field) {

        echo $field->displayable_name;

    }

}
