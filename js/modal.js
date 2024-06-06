$(document).ready(function() {
  $('.delete-button').click(function(event) {
    var studentID = $(this).data('id');

    // Confirm deletion with an alert
    if (confirm('¿Está seguro de que desea eliminar al estudiante?')) {
      // Proceed with deletion
      window.location.href = '../modelo/eliminar_alumno.php?id=' + studentID;
    } else {
      // Cancel deletion
      event.preventDefault(); // Prevent default link behavior
    }
  });
});