jQuery(function ($) {
    
    var myTable =$('#userListTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": userListURL,
        "columns": [
            {"data": "id"},
            {"data": "name"},
            {"data": "email"},
            {"data": "phone_no"},
             {data: 'user_img', name: 'user_img', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
         dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "fnDrawCallback": function () {
            $('.userdelete').click(function () {
             
                $('#deleteUserId').val($(this).data('id'));
            });
        }
    });
    
    $('.modelDeleteCnfrm').click(function () {
        $('#deleteForm').submit();
    });
});
 $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
   