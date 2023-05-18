<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class SupplierController extends BaseController
{
    // Models
    protected $supplierModel;

    //Property

    public function __construct()
    {
        //Initialize Models
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        return view('pages/home');
    }

    public function list()
    {
        $per_page = 5;
        $suppliers = $this->supplierModel->paginate($per_page);

        return view('pages/data/supplierlist', [
            'suppliers' => $suppliers,
            'pager' => $this->supplierModel->pager,
            'per_page' => $per_page,
        ]);
    }

    public function view($id)
    {
        $supplier = $this->supplierModel->find($id);

        return view('pages/view', [
            'supplier' => $supplier,
        ]);
    }

    public function create()
    {
        $supplier = $this->supplierModel->findAll();
        return view('pages/data/supplierCreate', [
            "title" => "Tambah Supplier",
            "action" => "create/save",
        ]);
    }

    public function save()
    {
        $supplier = $this->request->getVar();

        $this->supplierModel->insert([
            'name' => $supplier['name'],
            'nohp' => $supplier['nohp'],
            'address' => $supplier['address'],
        ]);

        return redirect()->to(url_to('list_supplier'));
    }

    public function edit($id)
    {
        $supplier = $this->supplierModel->find($id);

        return view('pages/create', [
            "title" => "Edit Supplier",
            "action" => "$id/edit/update",
            'supplier' => $supplier,
        ]);
    }

    public function update($id)
    {
        $supplier = $this->request->getVar();
        $this->supplierModel->update($id, [
            'name' => $supplier['name'],
            'nohp' => $supplier['nohp'],
            'address' => $supplier['address'],
        ]);

        return redirect()->to(url_to('view_supplier', $id));
    }

    public function delete($id)
    {
        $this->supplierModel->delete($id);

        return redirect()->to(url_to('list_supplier'));
    }
}
