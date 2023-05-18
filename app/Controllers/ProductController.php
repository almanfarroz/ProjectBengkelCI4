<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{

    protected $productModel;

    //Property

    public function __construct()
    {
        //Initialize Models
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        return view('pages/home');
    }

    public function create()
    {

        $product = $this->productModel->findAll();
        return view('pages/data/productCreate', [
            "title" => "Tambah Product",
            "action" => "create/save",
        ]);
    }

    public function list()
    {
        $per_page = 5;
        $products = $this->productModel->paginate($per_page);

        return view('pages/data/productList', [
            'products' => $products,
            'pager' => $this->productModel->pager,
            'per_page' => $per_page,
        ]);
    }

    public function view($id)
    {
        $product = $this->productModel->find($id);

        return view('pages/view', [
            'product' => $product,
        ]);
    }

    public function save()
    {
        $product = $this->request->getVar();

        $this->productModel->insert([
            'product_name' => $product['product_name'],
            'product_image' => $product['product_image'],
            'product_qty' => $product['product_qty'],
            'product_price' => $product['product_price'],
        ]);

        return redirect()->to(url_to('list_product'));
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);

        return view('pages/create', [
            "title" => "Edit Product",
            "action" => "$id/edit/update",
            'product' => $product,
        ]);
    }

    public function update($id)
    {
        $product = $this->request->getVar();
        $this->productModel->update($id, [
            'product_name' => $product['product_name'],
            'product_image' => $product['product_image'],
            'product_qty' => $product['product_qty'],
            'product_price' => $product['product_price'],
        ]);

        return redirect()->to(url_to('view_product', $id));
    }

    public function delete($id)
    {
        $this->productModel->delete($id);

        return redirect()->to(url_to('list_product'));
    }
}
