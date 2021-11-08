<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Rules\SpecificDomainsOnly;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;

class Register extends Component
{
    public $first_name = '';

    public $last_name = '';

    public $email = '';

    public $password = '';

    public $phone = '';

    public function rules()
    {
        return [
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:80','unique:users',new SpecificDomainsOnly],
            'phone' => ['required','regex:/^(\+234)[0-9]{10}$/'],
            'password' => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function store()
    {
        $this->validate();

        Auth::login($user = User::Create([
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]));

        $user->assignRole('user');

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
