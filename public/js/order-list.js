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
            url: SITEURL + "order-list",
            type: 'GET',
        },
        columns: [
        {data: 'id', name: 'id', 'visible': false},
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false},
            { data: 'order_id', name: 'order_id' },
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
            { data: 'quantity', name: 'quantity' },
            { data: 'total', name: 'total' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'address', name: 'address' },
            { data: 'created_at', name: 'created_at' },
            //{data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']]
    });
    
});
