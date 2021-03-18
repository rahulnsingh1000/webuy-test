//var SITEURL = '{{URL::to('/')}}'+'/';
$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#laravel_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "product-list",
            type: 'GET',
        },
        columns: [
        {data: 'id', name: 'id', 'visible': false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            { data: 'title', name: 'title' },
            { data: 'category_name', name: 'category_name' },
            {
            name: "image",
            data: "image",
                "render": function (data, type, full, meta) {
                    return "<img src=\"images/" + data + "\" height=\"50\"/>";
                }
            },
            { data: 'price', name: 'price' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            {data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']]
    });
    /*  When user click add user button */
    $('#create-new-product').click(function () {
        $('#btn-save').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#productCrudModal').html("Add New Product");
        $('#ajax-product-modal').modal('show');
    });
    /* When click edit user */
    $('body').on('click', '.edit-item', function () {
        var product_id = $(this).data('id');
        $.get('product-list/' + product_id +'/edit', function (data) {
            $('#title-error').hide();
            $('#product_code-error').hide();
            $('#description-error').hide();
            $('#productCrudModal').html("Edit Product");
            $('#btn-save').val("edit-item");
            $('#ajax-product-modal').modal('show');
            $('#product_id').val(data.id);
            $('#title').val(data.title);
            $('#category_id').val(data.category_id);
            //$('#image').val(data.image);
            $("#show_image").attr("src", "images/"+data.image);
            $('#price').val(data.price);
            $('#description').val(data.description);
        })
    });
    $('body').on('click', '#delete-item', function () {
        var product_id = $(this).data("id");
        if(confirm("Are You sure want to delete !")){
            $.ajax({
                type: "get",
                url: SITEURL + "product-list/delete/"+product_id,
                success: function (data) {
                    var oTable = $('#laravel_datatable').dataTable(); 
                    oTable.fnDraw(false);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    }); 
     $('body').on('change', '#image', function () {
        $("#is_image_changed").val(1);
        readURL(this);
    }); 
     function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#show_image').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $('#modalBody').on('submit',"#productForm", (function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $('#btn-save').html('Sending..');
        $(".required").html('');
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            dataType:"json",
            // async: false,
            beforeSend: function () {
                
            },
            success:function(response){

                $('#show_image').attr('src', 'images/default.jpg');
                $("#is_image_changed").val(0);
                $("#product_id").val('');
                $('#productForm').trigger("reset");
                $('#ajax-product-modal').modal('hide');
                $('#btn-save').html('Save Changes');
                var oTable = $('#laravel_datatable').dataTable();
                oTable.fnDraw(false);
                
            },
            error: function(response){
                var responseData=JSON.parse(response.responseText);
                $.each(responseData.errors, function(index, value){
                    var errorDiv = '#'+index+'_error';
                    $(errorDiv).empty().append(value);
                });
                $('#btn-save').html('Save Changes');
            }
        });
    }));
});
/*if ($("#productForm").length > 0) {
    $("#productForm").validate({
        submitHandler: function(form) {
            var actionType = $('#btn-save').val();
            $('#btn-save').html('Sending..');
            var formData = new FormData(form);
            $.ajax({
                data: formData,//$('#productForm').serialize(),
                url: SITEURL + "product-list/store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#productForm').trigger("reset");
                    $('#ajax-product-modal').modal('hide');
                    $('#btn-save').html('Save Changes');
                    var oTable = $('#laravel_datatable').dataTable();
                    oTable.fnDraw(false);
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#btn-save').html('Save Changes');
                }
            });
        }
    })
}*/
