$(document).ready(function() {
  if (document.getElementById('dataTable')) {
    $('#dataTable').DataTable();
  }

  if (document.getElementById('dataTableButtons')) {
    $('#dataTableButtons').DataTable({dom: 'Bflrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print','colvis'
        ]
    });
  }
});