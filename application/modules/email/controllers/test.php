<?php defined('BASEPATH') or exit('No direct script access allowed');

class test extends MY_Controller
{
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
    }
    function index()
    {
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'iqbal.agyan@students.amikom.ac.id';
        $mail->Password = 'iqbalagy';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Konfigurasi email
        $mail->setFrom('iqbal.agyan@students.amikom.ac.id');
        $mail->addAddress('iqbal.agyan@gmail.com');
        $mail->Subject = 'Tes Su';
        $mail->isHTML(true);
        $mail->Body = 'Dear <zhillan>, <br><br>
        Ini adalah kode otp mu untuk verifikasi register pada aplikasi Kaku. <h1><b>Jangan pernah memberikan kode otp pada siapapun</b></h1>
        <br><br><br>
        <123456>';

        // Kirim email
        if ($mail->send()) {
            echo 'Email berhasil dikirim.';
        } else {
            echo 'Gagal mengirim email: ' . $mail->ErrorInfo;
        }
    }
}