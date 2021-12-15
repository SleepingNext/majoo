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
            "success_message" => $session->getFlashdata("success_message"),
        ]);
    }

    public function create()
    {
        $session = session();
        $user_id = $session->get("user_id");

        if ($user_id == null) {
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
            $requestData = $this->request->getVar();

            try {
                $this->productModel->save([
                    "name" => $requestData["name"],
                    "description" => $requestData["description"],
                    "price" => $requestData["price"],
                    "image" => $requestData["image"],
                    "category" => $requestData["category"],
                    "created_by" => $user_id,
                ]);

                $session->setFlashdata("success_message", "Successfully created a product.");
                return redirect()->to("/product/index", null, "get");
            } catch (\Exception $e) {
                $session->setFlashdata("error_message", $e);
                return redirect()->to("/product/create", null, "get");
            }
        }
    }

    public function upload()
    {
        $session = session();

        if ($session->get("user_id") == null) {
            $session->setFlashdata("error_message", "You have to login first.");
            return redirect()->to("/user/login", null, "get");
        }

        $file_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . "/img/" . $file_name);
    }
}
