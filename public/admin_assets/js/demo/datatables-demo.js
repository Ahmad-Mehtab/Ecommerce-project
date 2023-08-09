// Call the dataTables jQuery plugin
$(document).ready(function () {
    $("#dataTable").DataTable({

        dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "lengthMenu": [[10, 25, 50,100,500, -1], [10, 25, 50,100,500, "All"]],

    });

    $("#dataTableZ").DataTable({

        "order": [],
        dom: 'Blfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "lengthMenu": [[10, 25, 50,100,500, -1], [10, 25, 50,100,500, "All"]],
    });
});
