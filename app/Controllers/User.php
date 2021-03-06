<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $session = session();

        if ($session->get("user_id") != null) {
            return redirect()->to("/product/index", null, "get");
        }

        if ($this->request->getMethod() == "get") {
            return view("user/login", [
                "title" => "Login",
                "error_message" => $session->getFlashdata("error_message"),
            ]);
        } else if ($this->request->getMethod() == "post") {
            $username = $this->request->getVar("username");
            $password = hash( "sha256", $this->request->getVar("password"));

            $data = $this->userModel->where("username", $username)->first();

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
}
