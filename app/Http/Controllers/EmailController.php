<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessEmail;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::orderBy('id', 'desc')->get();
        return view('email', ['emails' => $emails]);
    }

    public function store(Request $request)
    {
        $separar = explode(',', $request->email);
        for($i = 0; $i < count($separar); $i++) {
            $emailData = [
                'email' => trim($separar[$i]),
                'subject' => $request->subject,
                'message' => $request->message,
            ];

            Email::create($emailData);
            dispatch(new ProcessEmail($emailData));
        }

        return back()->with('success', 'E-mail enviado com sucesso.');
    }
}