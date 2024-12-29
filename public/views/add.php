<?php

require_once '../../app/classes/VehicleManager.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicleManager = new VehicleManager('', '', '', '');
    $vehicleManager->setFilePath(__DIR__ . '/../../data/vehicles.json');
    $vehicleManager->addVehicle([
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ]);
    header('Location: ../index.php');
    exit;
}

include "./header.php";
?>

    <div class="container my-4">
        <h1>Add Vehicle</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Vehicle Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="vehicle-type" class="form-label">Vehicle Type</label>
                <input type="text" class="form-control" name="type">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Image URL</label>
                <input type="url" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Add Vehicle</button>
        </form>
    </div>

</body>

</html>