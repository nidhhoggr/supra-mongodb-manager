$(function() {

    var collection_id; 

    $('.collection_interface_link').live('click',function() {

        collection_id = $(this).data('collection-id');

        var data = {
           action: 'admin_supra_mongodb_documents_show',
           id: collection_id
        };
  
        // ajaxurl is defined by WordPress
        $.post(ajaxurl, data, function(response){
            $('.mongodb_wrapper').replaceWith(response);
        });

    });

    $('.connections_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_connections_index',
        };

        // ajaxurl is defined by WordPress
        $.post(ajaxurl, data, function(response){
            $('.mongodb_wrapper').replaceWith(response);
        });

    });

    $('.collections_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_collections_index',
        };

        // ajaxurl is defined by WordPress
        $.post(ajaxurl, data, function(response){
            $('.mongodb_wrapper').replaceWith(response);
        });

    });

    $('.fields_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_fields_index',
        };

        // ajaxurl is defined by WordPress
        $.post(ajaxurl, data, function(response){
            $('.mongodb_wrapper').replaceWith(response);
        });

    });

    $('.documents_interface_link').live('click',function() {

        var data = {
           action: 'admin_supra_mongodb_documents_index',
        };

        // ajaxurl is defined by WordPress
        $.post(ajaxurl, data, function(response){
            $('.mongodb_wrapper').replaceWith(response);
        });

    });





    $('.document_modification_link').live('click', function() {

        var data = {
           action: 'admin_supra_mongodb_documents_edit',
           _id: $(this).data('object-id'),
           collection_id: collection_id
        }

        // ajaxurl is defined by WordPress
        $.post(ajaxurl, data, function(response){
            $('.mongodb_wrapper').replaceWith(response);
        });
    });

    $('.document_creation_link').live('click', function() {

        var data = {
           action: 'admin_supra_mongodb_documents_add',
           collection_id: collection_id
        }

        // ajaxurl is defined by WordPress
        $.post(ajaxurl, data, function(response){
            $('.mongodb_wrapper').replaceWith(response);
        });
    });

    $('.mongodb_document_modifier').live('submit', function(e) {
        e.preventDefault();

        var data = {
           action: 'admin_supra_mongodb_documents_edit',
           _id: $(this).data('object-id'),
           collection_id: collection_id,
           formdata: $(this).serialize()
        }

        // ajaxurl is defined by WordPress
        $.post(ajaxurl, data, function(response){
            $('.mongodb_wrapper').replaceWith(response);
        });

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
            $('.mongodb_wrapper').replaceWith(response);
        });

    });

});
