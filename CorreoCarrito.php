<?php
require("./phpmailer/src/PHPMailer.php");
require("./phpmailer/src/SMTP.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('tcpdf/tcpdf.php');

//Se obtiene el valor del correo desde el formulario
$correo = $_POST['correo'];
session_start();

// var_dump($correo);
// Crear un nuevo objeto TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Establecer información básica del documento
$pdf->SetCreator('R&B OPTICAL');
$pdf->SetTitle('Compra');
// Agregar una página
$pdf->AddPage();
// Obtener la información del carrito almacenada en la variable de sesión
$carrito = $_SESSION['carrito'];
// Iterar sobre los componentes del carrito
foreach ($carrito as $componente) {
    $nombre = $componente['nombre'];
    $img = $componente['img'];
    $precio = $componente['precio'];

    // Agregar contenido al PDF
    $pdf->Cell(0, 20, "Nombre: $nombre", 0, 1);
    $pdf->Cell(0, 20, "Precio: $precio", 0, 1);
    // $pdf->Image($img, 10, 50, 50, 0, 'JPEG');
    // $pdf->Cell(0, 20, "Imagen: $img", 0, 1);
    $pdf->Ln(10); // Agregar espacio entre componentes
}
// Generar el PDF y guardarlo en un archivo
$pdf_path = __DIR__ . '/pdf/carrito.pdf';
$pdf->Output($pdf_path, 'F');

// Crear un objeto PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor de correo
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'prueba2.jopaka@gmail.com';
    $mail->Password = 'cmipjyxmscuxtudv';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Configuración del correo
    $mail->setFrom('prueba2.jopaka@gmail.com', 'R&B OPTICAL');
    $mail->addAddress($correo);
    $mail->Subject = 'Carrito';
    $mail->Body = 'Gracias por tu compra :D.';

    // Adjuntar el archivo PD
    $mail->addAttachment($pdf_path, 'carrito.pdf');

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado correctamente.';
    session_destroy();
    header("Location: http://localhost/DW/index.php");
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
?>