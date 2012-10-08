var collection_id; 
var go_back, add_document;

wrapResponse = function(data) {
    $.post(ajaxurl, data, function(response){
        $('.mongodb_wrapper').replaceWith(response);
        processNavigator();
    });
}

processNavigator = function() {
        if(go_back) {
            $('.current_document').show();
            $('.current_document').html(go_back);
        }
        else {
            $('.current_document').hide();
        }
}

$(function() {
 
    go_back = null;
    processNavigator();

    $('.collection_interface_link').live('click',function() {

        collection_id = $(this).data('collection-id');

        var data = {
           action: 'admin_supra_mongodb_documents_show',
           id: collection_id
        };
 
        go_back = this
        wrapResponse(data);
    });

    $('.connections_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_connections_index',
        };

        go_back = null;
        wrapResponse(data);
    });

    $('.collections_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_collections_index',
        };

        go_back = null;
        wrapResponse(data);
    });

    $('.fields_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_fields_index',
        };

        go_back = null;
        wrapResponse(data);
    });

    $('.documents_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_documents_index',
        };

        go_back = null;
        wrapResponse(data);
    });





    $('.document_modification_link').live('click', function() {
        modify_document($(this).data('object-id'));
    });

    $('.document_deletion_link').live('click', function() {
        if (!confirmDelete()) return false;
        delete_document($(this).data('object-id'));
    });

    $('.document_creation_link').live('click', function() {

        var data = {
           action: 'admin_supra_mongodb_documents_add',
           collection_id: collection_id
        }

        wrapResponse(data);
    });

    $('.mongodb_document_modifier').live('submit', function(e) {
        e.preventDefault();

        var data = {
           action: 'admin_supra_mongodb_documents_edit',
           _id: $(this).data('object-id'),
           collection_id: collection_id,
           formdata: $(this).serialize()
        }

        wrapResponse(data);
    });

    $('.mongodb_document_creator').live('submit', function(e) {
        e.preventDefault();

        var data = {
           action: 'admin_supra_mongodb_documents_add',
           collection_id: collection_id,
           formdata: $(this).serialize()
        }

        // ajaxurl is defined by WordPress
        $.post(ajaxurl, data, function(response){

            var json_resp = $.parseJSON(response);

            if(json_resp._id) {
                modify_document_link(json_resp._id);
            }
            else {
                $('.mongodb_wrapper').replaceWith(response);
                $('.current_document').html(go_back);
            }

        });
    });
});

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
