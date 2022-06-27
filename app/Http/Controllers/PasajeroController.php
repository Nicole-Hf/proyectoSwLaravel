<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Pasajero;

class PasajeroController extends Controller
{
    public function editarUser(Request $request, $user)
    {
        $user = User::find($user);
        $user->name = $request->has('name') ? $request->get('name') : $user->name;
        $user->email = $request->has('email') ? $request->get('email') : $user->email;
        $user->telefono = $request->has('telefono') ? $request->get('telefono') : $user->telefono;
        $user->password = $request->has('password') ? bcrypt($request->get('password')) : $user->password;
        $user->save();

        $pasajero = Pasajero::where(['user_id' => $user->id])->first();
        $pasajero->fechaNacimiento = $request->has('fechaNacimiento') ? $request->get('fechaNacimiento') : $pasajero->fechaNacimiento;
        $pasajero->save();

        $data = new \stdClass();
        $data->id = $user->id;
        $data->name = $user->name;
        $data->email = $user->email;
        $data->telefono = $user->telefono;
        $data->password = $user->password;
        $data->fechaNacimiento = $pasajero->fechaNacimiento;

        return response()->json($data, 200);
    }
}
