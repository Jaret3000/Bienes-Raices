<?php

namespace Controllers;
use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades,
        ]);
    }

    public static function propiedad(Router $router){
        $id = validarORedireccionar('/propiedades');

        //buscar la propiedad por su id
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router){
        $router->render('paginas/blog');
    }

    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];

            //Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'c97f65f824048d';
            $mail->Password = 'b8215cc59d09d9';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //Configurar el contenido del mail
            $mail->setFrom('www.jaretitosayuso@gmail.com');
            $mail->addAddress('www.jaretitosayuso@gmail.com', 'Bienes Raices');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UFT-8';

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . ' </p>';
            
            //Enviar de forma condicional algunos campos de email/telefono
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Contacto por Telefono: </p>';
                $contenido .= '<p>Telefono: ' . $respuestas['telefono'] . ' </p>';
                $contenido .= '<p>Fecha de contacto: ' . $respuestas['fecha'] . ' </p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . ' </p>';
            } else{
                //Email
                $contenido .= '<p>Contacto por Email: </p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . ' </p>';
            }
            
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . ' </p>';
            $contenido .= '<p>Vende o compra: ' . $respuestas['tipo'] . ' </p>';
            $contenido .= '<p>Precio o presupuesto: $' . $respuestas['precio'] . ' </p>';
            $contenido .= '<p>Medio de contacto preferente: ' . $respuestas['contacto'] . ' </p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            
            //Enviar el email
            if($mail->send()){
                $mensaje = "Mensaje enviado";
            } else{
                $mensaje = "No se ha podido mandar el mensaje";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}