<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;


use App\Models\Cotizacion;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;


class MailController extends Controller
{
    public function sendEmail($cotizacionId)
    {
        // Obtén la cotización desde la base de datos según el ID
        $cotizacion = Cotizacion::find($cotizacionId);

        // Genera el PDF
        //$pdf = new \Barryvdh\DomPDF\PDF();
       // $pdf->loadView('cotizacion.pdf', compact('cotizacion'));

        // Crea una instancia de PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            // Configura el servidor SMTP y las credenciales de correo
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '5db9e8403addf4';
            $mail->Password = 'a646158f3a50f5';
            $mail->Port = 2525;

            // Establece el correo del remitente y del destinatario
            $mail->setFrom($cotizacion->email,$cotizacion->name);
            $mail->addAddress('serranoluizedil@gmail.com', 'edilson');

            // Adjunta el PDF al correo
           // $mail->addStringAttachment('hola', 'cotizacion.pdf');

            // Establece el cuerpo y asunto del correo
            $mail->isHTML(true);
            $mail->Subject = 'Cotizacion de Seguro de Automovil';
            $mail->Body = 'Adjunto encontrarás la cotización de seguro de automóvil solicitada.';

            // Envía el correo electrónico
            $mail->send();

            return redirect()->back()->with('success', 'Correo enviado correctamente.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al enviar el correo. Por favor, inténtalo de nuevo más tarde.');
        }
    }
}
