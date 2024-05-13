<?php
namespace app\controllers;

class Service extends \app\core\Controller
{
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \app\models\Service();
            

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