<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class Contact extends Controller
{
    public function showContactForm()
    {
        return view('contact-form');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        try {
            $to_name = $request->name;
            $to_email = 'octa.aks@gmail.com';
            $data = array('name'=>"Sam Jose", "body" => "Test mail");
            Mail::send('emails', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)->subject('Email dari jemaat');
                $message->from('$request->name', '$request->name');
            });

            $request->session()->flash('status', 'Terima kasih, kami sudah menerima email anda.');
            return view('contact-form');
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}