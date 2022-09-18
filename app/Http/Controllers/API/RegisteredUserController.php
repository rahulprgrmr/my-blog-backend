<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisteredUserRequest;
use App\Libraries\Response;
use App\Models\User;
use App\Repositories\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    public function store(StoreRegisteredUserRequest $request)
    {
        $name       = $request->post('name');
        $email      = $request->post('email');
        $password   = $request->post('password');

        $authorRole = Roles::getAuthorRole();

        if (!$authorRole)
        {
            return Response::error('Something went wrong');
        }

        $registeredUser = new User();

        $registeredUser->name           = trim($name);
        $registeredUser->email          = trim($email);
        $registeredUser->password       = Hash::make($password);
        $registeredUser->role_id        = $authorRole->id;
        $registeredUser->remember_token = Str::random(10);

        $registeredUser->save();

        return Response::success('Registered Successfully', $registeredUser);
    }
}
