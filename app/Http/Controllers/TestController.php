<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TestController extends Controller
{

    public function showHello()
    {
        $users = User::all(); // Eloquent
//      return $users;
        return response()->json(["utilisateurs" => $users, "message" => "Liste des utilisateurs"]);

    }

    public function userList()
    {
        $users = DB::select('select * from users');
        $usersEloquent = User::all();

        return $usersEloquent;
    }

    public function createUser(Request $request)
    {
//        $password = bcrypt($request->password);

//        $user = DB::insert("insert into users ( name , email , password , username) values ( '$request->name', '$request->email','$password','$request->username')");
        //   $user = DB::insert('insert into users (name , email , password , username) values (?, ?,?,?)', [$request->name,
//            $request->email, bcrypt($request->password), $request->username]);

        // first way
//
//        $user = new User();
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = bcrypt($request->password);
//        $user->username = $request->username;
//
//        $user->save();

        // second way

        $secondUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
        ]);
        return response()->json(["message" => "User has been created", "user" => $secondUser]);
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->id);

        if ($request->name)
            $user->name = $request->name;

        if ($request->email)
            $user->email = $request->email;

        if ($request->password)
            $user->password = $request->password;

        if ($request->username)
            $user->username = $request->username;

        $user->save;
        // Old way
//        $user = DB::update(
//            "update users set name = '$request->name' where id = ?",
//            [$request->id]
//        );

//        $password = bcrypt($request->password);
//
//        $user = DB::insert("insert into users ( name , email , password , username) values ( '$request->name', '$request->email','$password','$request->username')");
//        //   $user = DB::insert('insert into users (name , email , password , username) values (?, ?,?,?)', [$request->name,
////            $request->email, bcrypt($request->password), $request->username]);
//
        return $user;
    }

    public function deleteUser(Request $request)
    {

        User::where('id', $request->id)->delete();
//        User::whereId($request->id)->delete();
//        DB::delete(
//            "delete from users  where id = ?",
//            [$request->id]
//        );
        return response()->json(["message" => "User deleted successfully"]);
    }

}
