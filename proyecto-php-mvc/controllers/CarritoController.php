<?php
require_once 'models/Producto.php';
class CarritoController{

    public function index(){
      $carrito = $_SESSION['carrito'];
      require_once 'views/carrito/index.php';
    }

    public function add(){

      if(isset($_GET['id'])){
        $productoId = $_GET['id'];
      }
      else{
        header('Location:'.BASE_URL);
      }
      if(isset($_SESSION['carrito'])){
        $counter = 0;
        foreach($_SESSION['carrito'] as $indice => $valor){
          if($valor['id'] === $productoId){
            $_SESSION['carrito'][$indice]['unidades']++;
            $counter++;
          }
        }
        if(!isset($counter) || $counter == 0){
          $producto = new Producto();
          $prod = $producto->findById($productoId);
          if(is_object($prod)){
            $_SESSION['carrito'][] = array(
              "id" => $prod->id,
              "precio" => $prod->precio,
              "unidades" => 1,
              "producto" => $prod,
            );
          }
        }
      }
      else {
        if(!isset($counter) || $counter == 0){
          $producto = new Producto();
          $prod = $producto->findById($productoId);
          if(is_object($prod)){
            $_SESSION['carrito'][] = array(
              "id" => $prod->id,
              "precio" => $prod->precio,
              "unidades" => 1,
              "producto" => $prod,
            );
          }
        }
      }
      header('Location:'.BASE_URL.'/carrito/index');
    }
    public function remove(){}

    public function deleteAll(){
      unset($_SESSION['carrito']);
      header('Location:'.BASE_URL.'/carrito/index');
    }
}