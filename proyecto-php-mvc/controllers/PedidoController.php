<?php

require_once 'models/Pedido.php';

class PedidoController{

    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }

    public function add(){
        if(isset($_SESSION['login'])){
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : null;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            if(!$provincia || !$ciudad || !$direccion){
                return false;
            }
            $pedido = new Pedido();
            $pedido->setUsuario_id($_SESSION['identity']->id);
            $pedido->setProvincia($provincia);
            $pedido->setDireccion($direccion);
            $pedido->setLocalidad($ciudad);
            $pedido->setCoste(Utils::statsCarrito()['total']);
            $save = $pedido->save();
            $linea = $pedido->saveLinea();
            if($save){
                $_SESSION['pedido'] = 'completed';
            }
            else{
                $_SESSION['pedido'] = 'failed';
            }
        }
        else {
            header('Location:'.BASE_URL);
        }
        header('Location:'.BASE_URL.'/pedido/confirm');
    }

    public function confirm(){
        if(!isset(($_SESSION['identity']))){
            return false;
        }
        $pedido = new Pedido();
        $pedido->setUsuario_id($_SESSION['identity']->id);
        $lineaPedido = $pedido->findbyUser();
        $pedidosProducto = new Pedido();
        $productosByPedido = $pedidosProducto->getProductsByPedidoId($lineaPedido->id);
        require_once 'views/pedido/confirm.php';
    }

    public function view(){
        Utils::isLogged();
        $pedidoRepository = new Pedido();
        $pedidoRepository->setUsuario_id($_SESSION['identity']->id);
        $allPedidos = $pedidoRepository->findAllbyUser();
        require_once 'views/pedido/view.php';
    }

    public function detail(){
        Utils::isLogged();
        if(!isset($_GET['id'])){
            header('Location:'.BASE_URL.'/pedido/view');
        }
        $id = $_GET['id'];
        $pedidoRepository = new Pedido();
        $pedidoRepository->setUsuario_id($_SESSION['identity']->id);
        $pedido = $pedidoRepository->findbyId($id);
        $productos = $pedidoRepository->getProductsByPedidoId($pedido->id);
        require_once 'views/pedido/detail.php';
    }

    public function updateStatus(){
        if(!isset($_POST)){
            return false;
        }
       $estado = $_POST['estado'];
       $idPedido = $_POST['pedidoId'];
       $pedidoRepository = new Pedido();
       $pedidoRepository->setEstado($estado);
       $pedidoRepository->setId($idPedido);
       $pedidoRepository->updateStatus();
       header('Location:'.BASE_URL.'views/pedido/view.php');
    }

    public function viewAll(){
        Utils::isAdmin();
        $pedidoRepository = new Pedido();
        $allPedidos = $pedidoRepository->getAll();
        require_once 'views/pedido/view.php';


    }
}