<?php 

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {
        
        $router->render('/auth/login', [

        ]);
    }
    
    public static function logout() {
        echo 'desde logout';
    }
    
    public static function recoverPassword(Router $router) {
        
        $router->render('/auth/recoverPassword', [

        ]);
    }
    
    public static function resetPassword() {
        echo 'desde resetPassword';
    }
    
    public static function crear(Router $router) {
        
        $usuario = new Usuario;

        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            // Revisar que alerta este vacio
            if (empty($alertas)) {
                // Verificar que el usuario no este registrado
            }
        }
        
        $router->render('/auth/crear-cuenta', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}