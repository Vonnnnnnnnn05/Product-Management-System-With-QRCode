<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        
        // Get the current page from the URL (default to 1 if not specified)
        $page = $this->request->getGet('page') ?? 1;
        $perPage = 5; // 5 items per page
        
        // Calculate offset
        $offset = ($page - 1) * $perPage;
        
        // Get products with pagination
        $data['products'] = $model->findAll($perPage, $offset);
        
        // Get total count for pagination calculation
        $data['totalProducts'] = $model->countAll();
        $data['currentPage'] = $page;
        $data['perPage'] = $perPage;
        $data['totalPages'] = ceil($data['totalProducts'] / $perPage);
        
        return view('product_view', $data);
    }
    public function cards(){
        $model = new ProductModel();

    // "all the cards" = show all products
    $data['products'] = $model->findAll();
    $data['totalProducts'] = $model->countAll();

    return view('product_card', $data);
        
    }
    public function add()
    {
        return view('add_product');
    }
    public function editForm($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->getProduct($id);
        return view('edit_product', $data);
    }

    public function create()
    {
        $model = new ProductModel();
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price')
        ];
        $model->createProduct($data);
        session()->setFlashdata('message', 'Product created successfully!');
        return redirect()->to('/dashboard');
    }
    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->getProduct($id);
        return view('edit_product', $data);
    }
    public function update($id)
    {
        $model = new ProductModel();
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'price' => $this->request->getPost('price')
        ];
        $model->updateProduct($id, $data);
        session()->setFlashdata('message', 'Product updated successfully!');
        return redirect()->to('/dashboard');
    }
    public function delete($id)
    {

        $model = new ProductModel();
        $model->deleteProduct($id);
        session()->setFlashdata('message', 'Product deleted successfully!');
        return redirect()->to('/dashboard');
    }
}
