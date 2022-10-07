<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Wallet;

use Validator;

class UserController extends Controller
{

	public function register( Request $request ){

		$messages = [
            'name.required' => 'El nombre del cliente es obligatorio',
            'document.required' => 'El documento es obligatorio',
            'email.required' => 'El email es obligatorio',
            'phone.required' => 'El Número telefonico es obligatorio',
        ];

        $validate = Validator::make( $request->all(), [
            'name' => 'required',
            'document' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
        ], $messages );

        if( $validate->fails() ){

            $errors = $validate->errors()->all();
                
            return response()->json(['success' => false, 'cod_error' => 'campos obligatorios','message_error' => $errors], 200);
        }
        else{
            try{
                
                DB::beginTransaction();

                $userNew = new User;
                $userNew = $userNew->create( $request->all() );

                if (!$userNew) {
                    DB::rollback();

                    return response()->json(['success' => false, 'cod_error' => 'error al crear usuario','message_error' => 'error inesperado'], 200);
                }

                $walletNew = new Wallet;
                $walletNew->user_id = $userNew->id;
                $walletNew->save();

                if( $walletNew ){

                    DB::commit();

                    return response()->json(['success' => true, 'cod_error' => 00,'message_error' => 'Creación de usuario y wallet correctamente'], 200);
                }
                else{
                    DB::rollback();

                    return response()->json(['success' => false, 'cod_error' => 'error al crear usuario','message_error' => 'error inesperado'], 200);
                }
            }
            catch( Throwable $e ){

                return response()->json(['success' => false, 'cod_error' => 'error al crear usuario','message_error' => $e->getMessage()], 200);
            }
        }
	}
}