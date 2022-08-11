<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ControlController extends Controller
{
    public function showHello()
    {
        $users = User::all();
        //return $users;
        //Comment créer les modèles et les relations
        return response()->json(["utilisateurs" => $users, "message" => "Liste des utilisateurs"]);

    }

    public function userList()
    {
        $users = DB::select('SELECT * FROM users');
        return $users;
    }

    public function userCreate()
    { //statique insert
        $user = DB::insert('INSERT INTO users(name,email,password) values("Miss","Miss@gmail.com","Miss")');
        return $user;
    }

    public function dinamiqUserCreate(Request $userRequest)
    {//dynamique insert
        $user1 = DB::insert('INSERT INTO users(name,email,password) values(?,?,?)', [$userRequest->name, $userRequest->email, $userRequest->password]);
        return $user1;
    }

    /*An other methode
    public function dinamiqUserCreate(Request $userRequest){//dynamique insert
        $user1=DB::insert('INSERT INTO users(name,email,password) values($userRequest->name, $userRequest->email,$userRequest->password)');
        return $user1;
    }
    */
    public function updateUser(Request $updateRequest)
    {
        $user2 = DB::update('UPDATE users SET name=$updateRequest->name,password=$updateRequest->password, WHERE email=$updateRequest->email');
        return $user2;
    }
}
