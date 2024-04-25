<?php
namespace app\controllers;

class Service extends \app\core\Controller
{
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \app\models\Service();
            $service->description = $_POST['description'];
            $service->category = $_POST['category'];
            if ($service->category == 'Commercial') {
                $service->basePrice = 250;
                $service->ratePerSquareFoot = 100 * $_POST['area'];
            } else {
                $service->basePrice = 100;
                $service->ratePerSquareFoot = 50 * $_POST['area'];
            }

            $service->insert();

            if (!empty($service->serviceID)) {
                $_SESSION['serviceID'] = $service->serviceID;
                header('location:/Booking/create');
            } else {
                die('Failed to create service.');
            }
        } else {
            $this->view('Service/create');
        }
    }
}