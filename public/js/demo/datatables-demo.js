// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "bLengthChange": false,
    "iDisplayLength": -1
  });
});

$(document).ready(function() {
  $('#dataTable-user').DataTable({
  });
});
