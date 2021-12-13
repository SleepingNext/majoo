<?php

namespace App\Controllers;

class User extends BaseController
{
    public function login()
    {
        $request = service('request');
        if ($request->getMethod() == "get") {
            $data = [
                "title" => "Login",
            ];

            return view("user/login", $data);
        } else if ($request->getMethod() == "post") {
            return "";
        }
    }
}
