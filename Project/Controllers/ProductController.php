<?php
namespace Project\Controllers;

use Ionian\Core\Controller;
use Ionian\Database\Database;

class productController extends Controller{
    public function showAllProductsAction(){
        $stm = Database::get()->prepare("SELECT * FROM products");
        $stm->execute();
        $this->outputJSON($stm->fetchAll());
    }
    public function getByIdAction($id){
        $stm = Database::get()->prepare("SELECT * FROM products WHERE product_id = :id");
        $stm->bindParam(":id",$id);
        $stm->execute();
        $this->outputJSON($stm->fetch());
    }
    
}