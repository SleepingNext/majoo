<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() == "get") {
            $data = [
                "title" => "Login",
            ];

            return view("user/login", $data);
        } else if ($this->request->getMethod() == "post") {
            $session = session();

            $userModel = new UserModel();
            $username = $this->request->getVar("username");
            $password = hash( "sha256", $this->request->getVar("password"));

            $data = $userModel->where("username", $username)->first();

            if (isset($data)) {
                if ($data["password"] == $password) {
                    $session->set([
                        "user_id" => $data["id"],
                        "username" => $data["username"],
                    ]);

                    return redirect()->to("/product/index");
                } else {
                    $session->setFlashdata("error_message", "Password is incorrect.");
                    return redirect()->to("/user/login", null, "get");
                }
            } else {
                $session->setFlashdata("error_message", "Email does not exist.");
                return redirect()->to("/user/login", null, "get");
            }
        }
    }

    public function logout()
    {
        session()->remove(["user_id", "username"]);
    }
}
