<?php
namespace app\controllers;

use app\models\Service;

class ServiceController extends \app\core\Controller {

    public function createService() {


        $service = new \app\models\Service();
        $service->description = $_POST['description'];
        $service->basePrice = $_POST['basePrice'];
        $service->ratePerSquareFoot = $_POST['ratePerSquareFoot'];
        $service->category = $_POST['category'];
        $service->insert();
        
        $this->view('path/to/redirect'); // Adjust the path as needed
    }

    public function getAllServices() {
        $service = new \app\models\Service();
        $services = $service->getAllService();
        
        // Load a view and pass services data
        $this->render('services/index', ['services' => $services]);
    }

    public function getService($id) {
        $service = new \app\models\Service();
        $serviceDetail = $service->getService($id);
        
        // Load a view and pass service data
        $this->render('services/detail', ['service' => $serviceDetail]);
    }

    public function deleteService($id) {
        $service = new \app\models\Service();
        $service->serviceID = $id;
        $service->delete();
        
        // Redirect or return a success message
        $this->redirect('path/to/redirect'); // Adjust the path as needed
    }
}
?>
