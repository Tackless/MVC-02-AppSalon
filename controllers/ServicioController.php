<?php 

namespace Controllers;

use Model\Servicio;
use MVC\Router;

class ServicioController {
    public static function index(Router $router) {
        
        if (!isset($_SESSION)) {
            session_start();
        }

        $servicios = Servicio::all();

        $router->render('/servicios/index', [
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios
        ]);

        
    }
    
    public static function crear(Router $router) {
        
        if (!isset($_SESSION)) {
            session_start();
        }

        $servicio = new Servicio;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);
            
            $alertas = $servicio->validar();

            if (empty($alertas)) {
                $servicio->guardar();
                header('location: /servicios');
            }
        }

        $router->render('/servicios/crear', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
        
    }
    
    public static function actualizar(Router $router) {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }

        $router->render('/servicios/actualizar', [
            'nombre' => $_SESSION['nombre']
        ]);
        
    }
    
    public static function eliminar(Router $router) {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
        }

        
    }
}