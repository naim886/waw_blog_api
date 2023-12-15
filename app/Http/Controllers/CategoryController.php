<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Seo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Throwable;

class CategoryController extends Controller
{
    /**
     * @return View
     */
    final public function index(): View
    {
        $cms_content = [
            'module_name'     => 'Category', // page title
            'module_route'    => route('category.index'),
            'sub_module_name' => 'List',
            'button_type'     => 'create', //create
            'button_route'    => route('category.create'),
        ];
        $categories  = (new Category())->get_category_list();
        return view('dashboard.modules.category.index',
            compact(
                'cms_content',
                'categories'
            )
        );
    }

    /**
     * @return View
     */
    final public function create(): View
    {
        $cms_content = [
            'module_name'     => 'Category', // page title
            'module_route'    => route('category.index'),
            'sub_module_name' => 'Create',
            'button_type'     => 'list', //create
            'button_route'    => route('category.index'),
        ];
        $categories  = (new Category())->get_category_assoc();
        return view('dashboard.modules.category.create', compact('cms_content', 'categories'));
    }

    /**
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    final public function store(StoreCategoryRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $category = (new Category())->storeCategory($request);
            (new Seo())->store_seo($request, $category);
            flash_alert('Category created successfully');
            DB::commit();
            return redirect()->route('category.index');
        } catch (Throwable $throwable) {
            DB::rollBack();
            flash_alert($throwable->getMessage(), 'danger');
            app_log('CATEGORY_CREATE_FAILED', $throwable);
            return redirect()->back();
        }
    }

    /**
     * @param Category $category
     * @return View
     */
    final public function show(Category $category): View
    {
        $cms_content = [
            'module_name'     => 'Category', // page title
            'module_route'    => route('category.index'),
            'sub_module_name' => 'Show',
            'button_type'     => 'list', //create
            'button_route'    => route('category.index'),
        ];
        return view('dashboard.modules.category.show', compact('cms_content', 'category'));
    }

    /**
     * @param Category $category
     * @return View
     */
    final public function edit(Category $category): View
    {
        $cms_content = [
            'module_name'     => 'Category', // page title
            'module_route'    => route('category.index'),
            'sub_module_name' => 'Edit',
            'button_type'     => 'list', //create
            'button_route'    => route('category.index'),
        ];
        $categories  = (new Category())->get_category_assoc();
        return view('dashboard.modules.category.edit',
            compact(
                'cms_content',
                'category',
                'categories'
            )
        );
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    final public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        try {
            DB::beginTransaction();
            (new Category())->updateCategory($request, $category);
            (new Seo())->update_seo($request, $category);
            flash_alert('Category updated successfully');
            DB::commit();
            return redirect()->route('category.index');
        } catch (Throwable $throwable) {
            DB::rollBack();
            flash_alert($throwable->getMessage(), 'danger');
            app_log('CATEGORY_UPDATE_FAILED', $throwable);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    final public function destroy(Category $category): RedirectResponse
    {
        try {
            DB::beginTransaction();
            (new Category())->delete_category($category);
            flash_alert('Category deleted successfully');
            DB::commit();
            return redirect()->route('category.index');
        } catch (Throwable $throwable) {
            DB::rollBack();
            flash_alert($throwable->getMessage(), 'danger');
            app_log('CATEGORY_DELETE_FAILED', $throwable);
            return redirect()->back();
        }
    }
}
