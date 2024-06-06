<?php include("../vista/componentes/header.php") ?>




<?php include("../vista/componentes/footer.php") ?>
<?php

require 'db.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int) $_GET['id']; // Convert ID to integer

    // Prepare the DELETE statement using PDO for security

    $stm = $conexion->prepare("DELETE FROM mascotas WHERE idmascotas = :id");
    $stm->bindParam(":id", $id); // Bind the ID parameter


    // Execute the statement
    $stm->execute();

    // Check for successful deletion
    if ($stm->rowCount() > 0) {
        // Record deleted successfully
        header("Location: index.php?message=RecordDeleted"); // Redirect with success message
    } else {
        // Record not found or deletion failed
        header("Location: index.php?message=RecordNotFound"); // Redirect with error message
    }
} else {
    header("Location: index.php?message=MissingID"); // Redirect with error message
}

// Close the database connection
$connection = null;



?>