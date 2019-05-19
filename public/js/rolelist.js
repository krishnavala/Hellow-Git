 jQuery(function ($) {

    var myTable =
         $('#RoleTable').DataTable({
       "processing": true,
        "serverSide": true,
        "ajax": roleListUrl,
        "columns": [
            {"data": "role_id"},
            {"data": "role_name"},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],         
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
"fnDrawCallback": function () {
            $(".roledelete").on('click', function () {
                $('#deleteroleId').val($(this).data('role_id'));         
            });          
        }
    });

     $(".modelDeleteCnfrm").on('click', function () {
      $('#deleteForm').submit();        
  });
  });

 $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
  