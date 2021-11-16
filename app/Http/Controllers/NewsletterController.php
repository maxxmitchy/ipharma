<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\NewsletterInterface;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(NewsletterInterface $newsletter)
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'please provide a valid email address and try again'
            ]);
        }

        return redirect('/')
            ->with('success', 'you are now subscribed to our mailing list');
    }
}
