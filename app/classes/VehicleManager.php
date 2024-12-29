<?php

require_once 'FileHandler.php';
require_once 'VehicleActions.php';
require_once 'VehicleBase.php';

class VehicleManager extends VehicleBase implements VehicleActions
{
    use FileHandler;

    public function addVehicle($data)
    {
        $vehicles = $this->readFile();
        // $data['id'] = uniqid();
        $vehicles[] = $data;
        $this->writeFile($vehicles);
    }

    public function editVehicle($id, $data)
    {
        $vehicles = $this->readFile();
        if (isset($vehicles[$id])) {
            $vehicles[$id] = $data; 
            $this->writeFile($vehicles);
        }
    }

    public function deleteVehicle($id)
    {
        $vehicles = $this->readFile();
        if (isset($vehicles[$id])) {
            unset($vehicles[$id]); 
            $this->writeFile(array_values($vehicles)); 
        }
    }


    public function getVehicles()
    {
        return $this->readFile();
    }

    public function getDetails()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image
        ];
    }
}
