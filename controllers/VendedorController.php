<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController
{
    public static function crear(Router $router)
    {
        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Crear nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
            //Validar que no haya campos vacios
            $errores = $vendedor->validar();
            if (empty($errores)) {
                //Guarda en la base de datos
                $vendedor->guardar();
            }
        }
        $router->render('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        //Validar id valido
        $id = validarORedireccionar('/admin');
        //Obtener los datos de la propiedad
        $vendedor = Vendedor::find($id);
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Asignar los valores
            $args = $_POST['vendedor'];
            //Sincronizar objeto en memoria con lo que el usuario escribio
            $vendedor->sincronizar($args);
            //Validación
            $errores = $vendedor->validar();
            if (empty($errores)) {
                //Guarda en la base de datos
                $vendedor->guardar();
            }
        }
        $router->render('/vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar()
    {
        $tipo = $_POST['tipo'];
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if ($id) {
            if (validarTipoContenido($tipo)) {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            }
        }
    }
}
