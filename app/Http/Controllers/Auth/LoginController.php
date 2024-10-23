<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function checkPassword(Request $request)
{
    $request->validate([
        'phone' => 'required|string|size:10|regex:/^[0-9]+$/',
        'password' => 'required|string|min:6',
    ]);

    // Vérifiez si l'utilisateur existe
    $user = \App\Models\User::where('telephone', $request->phone)->first();
    
    if ($user) {
        if (Auth::attempt(['telephone' => $request->phone, 'password' => $request->password])) {
            return response()->json(['valid' => true]);
        } else {
            return response()->json(['valid' => false, 'message' => 'Mot de passe incorrect.']);
        }
    } else {
        return response()->json(['valid' => false, 'message' => 'Numéro de téléphone non trouvé.']);
    }
}

}
