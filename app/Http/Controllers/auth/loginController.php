<?php
namespace App\Http\Controllers\Auth;





use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers; // Assurez-vous d'importer ce trait
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
       
    }

    public function username()
    {
        return 'email'; // Utilisation du champ 'email' pour l'authentification
    }
}
