<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Part\TextPart;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;

class MessageController extends Controller
{
    public function create()
    {
        return view('create'); // Assurez-vous que cette vue existe
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
            'photo' => 'nullable|image|max:2048',
        ]);

        $token = Str::random(10);
        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        DB::table('messages')->insert([
            'email' => $request->email,
            'message' => $request->message,
            'photo' => $photoPath,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Configuration de Symfony Mailer pour l'envoi d'e-mails
        $transport = new EsmtpTransport('smtp.gmail.com', 587);
        $transport->setUsername(env('MAIL_USERNAME'));
        $transport->setPassword(env('MAIL_PASSWORD'));

        $mailer = new Mailer($transport);

        // Création de l'e-mail avec Symfony Mime
        $email = (new Email())
            ->from(env('MAIL_FROM_ADDRESS'))
            ->to($request->email)
            ->subject('Nouveau message temporaire')
            ->text("Vous avez reçu un message temporaire. Cliquez sur le lien pour le voir: " . url('/message/' . $token));

        // Envoi de l'e-mail
        $mailer->send($email);

        return redirect('/')->with('success', 'Message envoyé avec succès!');
    }

    public function show($token)
    {
        $message = DB::table('messages')->where('token', $token)->first();
    
        if (!$message) {
            // Si le message n'est pas trouvé, redirige vers la page de consultation
            return view ('consulter');
        }
    
        // Supprime le message et la photo après affichage
        DB::table('messages')->where('token', $token)->delete();
    
        if ($message->photo) {
            Storage::disk('public')->delete($message->photo);
        }
    
        return view('show', ['message' => $message]);
    }
    


}
