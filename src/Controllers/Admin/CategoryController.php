<?php 

namespace Tdc\Buoi10\Controllers\Admin;

use Tdc\Buoi10\Commons\Controller;
use Tdc\Buoi10\Models\Category;
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
        $categories = $this->category->all();

        $this->renderViewAdmin('categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $this->renderViewAdmin('categories.create');
    }

    public function store()
    {
        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make($_POST, [
            'name' => 'required|max:100',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/categories/create'));
            exit;
        } else {
            $data = [
                'name' => $_POST['name'],
            ];

            $this->category->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url('admin/categories'));
            exit;
        }
    }

    public function edit($id)
    {
        $category = $this->category->findByID($id);

        $this->renderViewAdmin('categories.edit', [
            'category' => $category,
        ]);
    }

    public function update($id)
    {
        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make($_POST, [
            'name' => 'required|max:100',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/categories/$id/edit"));
            exit;
        } else {
            $data = [
                'name' => $_POST['name'],
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->category->update($id, $data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url('admin/categories'));
            exit;
        }
    }

    public function delete($id)
    {
        try {
            $this->category->delete($id);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/categories'));
        exit();
    }
}
