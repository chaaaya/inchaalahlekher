<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccessMail;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Responsable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AuthController extends Controller
{
    use RegistersUsers;

    public function showLoginForm($role = null)
    {
        if ($role === null) {
            return redirect()->route('login', ['role' => 'client']);
        }
        return view('auth.login', ['role' => $role]);
    }

    public function showRegisterForm($role)
    {
        return view('auth.register', ['role' => $role]);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $request->only('email', 'password');
        $role = $request->input('role');

        if (Auth::guard($role)->attempt($credentials)) {
            $user = Auth::guard($role)->user();
            return $this->redirectBasedOnRole($user);
        }

        return back()->withErrors(['email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.']);
    }

    public function register(Request $request, $role)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . $role . 's',
            'password' => 'required|string|confirmed|min:8',
            'numero_telephone' => 'required|string',
        ]);

        $model = $this->getModel($role);

        $user = $model::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'numero_telephone' => $request->numero_telephone,
            'status' => $role === 'client' ? 'pending' : 'accepted',
        ]);

        Mail::to($user->email)->send(new RegistrationSuccessMail($user->name));

        if ($role !== 'client') {
            Auth::guard($role)->login($user);
            return $this->redirectBasedOnRole($user);
        }

        return redirect()->route('login')->with('status', 'Votre compte a été créé. Veuillez attendre l\'approbation de l\'administrateur.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    protected function redirectBasedOnRole($user)
    {
        switch (get_class($user)) {
            case Admin::class:
                return redirect()->route('admin.manage-users');
            case Responsable::class:
                return redirect()->route('respo.welcome');
            case Client::class:
                return redirect()->route('abonne.index');
            default:
                return redirect('/');
        }
    }

    protected function getModel($role)
    {
        switch ($role) {
            case 'admin':
                return Admin::class;
            case 'respo':
                return Responsable::class;
            case 'client':
                return Client::class;
            default:
                throw new \Exception("Rôle invalide : $role");
        }
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'role' => 'required|string|in:admin,respo,client',
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'numero_telephone' => ['required', 'string', 'max:20'],
        ]);
    }
}
