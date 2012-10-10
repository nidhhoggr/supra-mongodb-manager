var collection_id; 
var go_back, add_document;

jQuery(function(jQuery) {
 
    go_back = null;
    processNavigator();

    jQuery('.collection_interface_link').live('click',function() {

        collection_id = jQuery(this).data('collection-id');

        var data = {
           action: 'admin_supra_mongodb_documents_show',
           id: collection_id
        };
 
        go_back = this
        wrapResponse(data);
    });

    jQuery('.connections_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_connections_index',
        };

        go_back = null;
        wrapResponse(data);
    });

    jQuery('.collections_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_collections_index',
        };

        go_back = null;
        wrapResponse(data);
    });

    jQuery('.fields_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_fields_index',
        };

        go_back = null;
        wrapResponse(data);
    });

    jQuery('.documents_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_documents_index',
        };

        go_back = null;
        wrapResponse(data);
    });





    jQuery('.document_modification_link').live('click', function() {
        modify_document(jQuery(this).data('object-id'));
    });

    jQuery('.document_deletion_link').live('click', function() {
        if (!confirmDelete()) return false;
        delete_document(jQuery(this).data('object-id'));
    });

    jQuery('.document_creation_link').live('click', function() {

        var data = {
           action: 'admin_supra_mongodb_documents_add',
           collection_id: collection_id
        }

        wrapResponse(data);
    });

    jQuery('.mongodb_document_modifier').live('submit', function(e) {
        e.preventDefault();

        var data = {
           action: 'admin_supra_mongodb_documents_edit',
           _id: jQuery(this).data('object-id'),
           collection_id: collection_id,
           formdata: jQuery(this).serialize()
        }

        wrapResponse(data);
    });

    jQuery('.mongodb_document_creator').live('submit', function(e) {
        e.preventDefault();

        var data = {
           action: 'admin_supra_mongodb_documents_add',
           collection_id: collection_id,
           formdata: jQuery(this).serialize()
        }

        // ajaxurl is defined by WordPress
        jQuery.post(ajaxurl, data, function(response){

            var json_resp = jQuery.parseJSON(response);

            if(json_resp._id) {
                modify_document_link(json_resp._id);
            }
            else {
                jQuery('.mongodb_wrapper').replaceWith(response);
                jQuery('.current_document').html(go_back);
            }

        });
    });

});

wrapResponse = function(data) {
    jQuery.post(ajaxurl, data, function(response){
        jQuery('.mongodb_wrapper').replaceWith(response);
        processNavigator();
    });
}

processNavigator = function() {
        if(go_back) {
            jQuery('.current_document').show();
            jQuery('.current_document').html(go_back);
        }
        else {
            jQuery('.current_document').hide();
        }
}


delete_document = function(object_id) {

       var data = {
           action: 'admin_supra_mongodb_documents_delete',
           _id: object_id,
           collection_id: collection_id
        }

        wrapResponse(data);
}

modify_document = function(object_id) {

       var data = {
           action: 'admin_supra_mongodb_documents_edit',
           _id: object_id,
           collection_id: collection_id
        }

        wrapResponse(data);
}

confirmDelete = function() {
    return confirm('Are you sure you want to delete?');
}
