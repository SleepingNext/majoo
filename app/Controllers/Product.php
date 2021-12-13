<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    protected productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $session = session();

        if ($session->get("user_id") == null) {
            $session->setFlashdata("error_message", "You have to login first.");
            return redirect()->to("/user/login", null, "get");
        }

        return view("product", [
            "product" => $this->productModel->findAll(),
        ]);
    }
}
