<?php

namespace Thanhnt84\Duan1\Controllers\Admin;

use Thanhnt84\Duan1\Commons\Controller;
use Thanhnt84\Duan1\Models\Category;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{
    private Category $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $category = $this->category->all();

        $this->renderViewAdmin('category.index', [
            'category' => $category
        ]);
    }

    public function create()
    {
        $this->renderViewAdmin('category.create');
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/category/create'));
            exit;
        } else {
            $data = [
                'name'      => $_POST['name'],
                
            ];

            

            $this->category->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/category'));
            exit;
        }
    }

    public function show($id)
    {
        $category = $this->category->findByID($id);

        $this->renderViewAdmin('category.show', [
            'category' => $category
        ]);
    }

    public function edit($id)
    {
        $category = $this->category->findByID($id);

        $this->renderViewAdmin('category.edit', [
            'category' => $category
        ]);
    }

    public function update($id)
    {
        $category = $this->category->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/category/{$category['id']}/edit"));
            exit;
        } else {
            $data = [
                'name'      => $_POST['name'],
                
            ];

          
          

            $this->category->update($id, $data);

            

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url("admin/category/{$category['id']}/edit"));
            exit;
        }
    }

    public function delete($id)
    {
        try {
            $user = $this->category->findByID($id);

            $this->category->delete($id);

            

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/category'));
        exit();
    }
}
