<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UtilisateurModel;
use Illuminate\Support\Facades\Hash;

class PasswordCheckController extends Controller
{
    public function check(Request $request)
    {
        $user = UtilisateurModel::where('phone', $request->phone)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Identifiants incorrects.']);
        }
    }
}
