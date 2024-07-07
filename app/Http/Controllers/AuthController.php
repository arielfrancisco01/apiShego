<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserImg;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request -> validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'phone' => 'required|integer',
            'genre' => '
            ',
            'birthday' => 'required|integer',
            'password' => 'required|string|confirmed'
        ]);

        $users = User::create([
            'name' => $fields['name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'genre' => $fields['genre'],
            'birthday' => $fields['birthday'],
            // 'password' => $fields['password'],
            'password' => bcrypt($fields['password'])
        ]);

        // $token = $users -> createToken($request -> nameToken)->plainTextToken;

        $response = [
            'user' => $users,
            // 'token' => $token,
            'message' => "Usuário cadastrado com sucesso"
        ];

        return response($response, 201);
    }


    public function login(Request $request)
    {
        $fields = $request -> validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $users = User::where(['email' => $fields['email']])->first();

        if(!$users || !Hash::check($fields['password'], $users -> password))
        {
            return response([
                'message' => "Email ou senha inválida"
            ], 400);
        }

        $token = $users -> createToken('UsuarioLogado')->plainTextToken;
        if($users){
            $response = [
                'user' => $users,
                'token' => $token,
                'message' => "Login"
            ];
        }
        else{
            $response = [
                'message' => "Email ou senha inválida"
            ];}

        return response($response, 200);
    }


    public function show(string $id)
    {
        $user = User:: findorfail($id);

        $code_user = $user -> id;

        $img = UserImg:: where("code_user", $code_user)->firstOrFail();

        $response = [
            "user" => $user,
            "user_img" => $img
        ];

        return $response;
    }

    public function update(Request $request, string $id)
    {
        $user = User:: findorfail($id);

        $user -> update($request -> all());

        return $user;
    }

    public function updateImg(Request $request, string $id)
    {
        if ($request->hasFile('img')) {
            $imagem = $request->file('img');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $path = $imagem->move(public_path('uploads'), $nomeImagem);

            return UserImg:: create(['code_user' => $id,'img' => $path]);

            return response()->json(['mensagem' => 'Upload bem-sucedido']);
        }
        return response()->json(['mensagem' => 'Nenhum arquivo foi enviado'], 400);
    }
}
