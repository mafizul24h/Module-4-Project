<?php
require_once '../app/Classes/VehicleManager.php';

$vehicleManager = new VehicleManager('', '', '', '');
$vehicleManager->setFilePath('../data/vehicles.json');
$vehicles = $vehicleManager->getVehicles();

include './views/header.php';
?>


    <div class="container my-4">
        <h1>Vehicle Listing</h1>
        <a href="./views/add.php" class="btn btn-success mb-3">Add Vehicle</a>
        <div class="row row-cols-1 row-cols-md-2 g-4">
         <?php foreach ($vehicles as $id=> $vehicle): ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= $vehicle['image'] ?>" class="card-img-top" alt="<?= $vehicle['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $vehicle['name'] ?></h5>
                        <p class="card-text">Type: <?= $vehicle['type'] ?></p>
                        <p class="card-text">Price: $<?= $vehicle['price'] ?></p>
                        <a href="./views/edit.php?id=<?= $id ?>" class="btn btn-primary">Edit</a>
                        <a href="./views/delete.php?id=<?= $id ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>