<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ProductCategoryModel;

class Product extends BaseController
{
    protected $productModel;
    protected $productCategoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productCategoryModel = new ProductCategoryModel();
    }

    public function index()
    {
        $session = session();

        if ($session->get("user_id") == null) {
            $session->setFlashdata("error_message", "You have to login first.");
            return redirect()->to("/user/login", null, "get");
        }

        return view("product/index", [
            "title" => "Product",
            "products" => $this->productModel->findAll(),
        ]);
    }

    public function create()
    {
        $session = session();

        if ($session->get("user_id") == null) {
            $session->setFlashdata("error_message", "You have to login first.");
            return redirect()->to("/user/login", null, "get");
        }

        if ($this->request->getMethod() == "get") {
            return view("product/create", [
                "title" => "Create Product",
                "product_categories" => $this->productCategoryModel->findAll(),
                "error_message" => $session->getFlashdata("error_message"),
            ]);
        } else if ($this->request->getMethod() == "post") {

        }
    }

    public function upload()
    {
        $file_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . "/img/" . $file_name);
    }
}
