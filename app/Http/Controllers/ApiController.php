<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Models\User;



class ApiController extends Controller
{


    public function login(Request $request)
    {
        if ($request->email == env('ADMIN_EMAIL') && $request->password == env('ADMIN_PASS')) {
            return response()->json([
                "message" => "logged"
            ], 200);
        } else {
            return response()->json([
                "message" => "Not authorized"
            ], 401);
        }
    }
    public function createUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json([
            "message" => "user record created"
        ], 201);
    }



    public function getAllUsers()
    {
        $users = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function updateUser(Request $request, $id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->save();

            return response()->json(["message" => "User update successafully"], 200);
        } else {
            return response()->json([
                "message" => "user not found"
            ], 404);
        }
    }

    public function deleteUser(Request $request, $id)
    {
        if (User::where('id', $id)->exists() && $request->password == env('ADMIN_PASS')) {
            $user = User::find($id);
            $user->delete();
            return response()->json(["message" => "User deleted successafully"], 200);
        } else {
            return response()->json([
                "message" => "user not found or bad passoword"
            ], 404);
        }
    }
}
