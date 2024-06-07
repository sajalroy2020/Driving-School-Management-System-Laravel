<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Services\CategoryService;

class CategoryController extends Controller
{
    public $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->categoryService->list($request);
        }
        $data['pageTitle'] = __("Category List");
        $data['activeCategoryMenu'] = "active";
        return view('admin.category.list', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Category Edit");
        $data['category'] = $this->categoryService->getById(decrypt($id));
        return view('admin.category.edit', $data);
    }

    public function store(CategoryRequest $request)
    {
        return $this->categoryService->store($request);
    }

    public function destroy($id)
    {
        return $this->categoryService->destroy(decrypt($id));
    }

}
