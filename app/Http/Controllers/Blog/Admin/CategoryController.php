<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BLogCategoryUpdateRequest;
use App\Models\BlogCategory;

use App\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $paginator = BlogCategory::paginate(5);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $item = new BlogCategory();
        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BLogCategoryUpdateRequest $request)
    {
        //

        $data = $request->input();
        //$data = $request->except('_method', '_token');
        //dd($request->input());
        if(empty($data['slug'])){
            $data['slug'] = Str::slug($data['title']);
        }

        $item = new BlogCategory($data);

//        $result = $item
//            ->fill($data)
//            ->save();

        $item->save();

        if($item){
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Successfully created'] );
        }else{
            return back()
                ->withErrors(['msg' => "Creation error"])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  BlogCategoryRepository $categoryRepository
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $blogCategoryRepository)
    {
//        $item = $categoryRepository->getEdit($id);
//        $categoryList = $categoryRepository->getForComboBox();

        $item = BlogCategory::find($id);
        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BLogCategoryUpdateRequest $request, $id)
    {
        //


        $item = BlogCategory::find($id);
        if(empty($item)){
            return back()
                ->withErrors(['msg' => "Note id=[{$id}] not found"])
                ->withInput();
        }
        $data = $request->input();
        //$data = $request->except('_method', '_token');
        //dd($request->input());

        $result = $item
            ->update($data);


        if($result){
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Successfully created'] );
        }else{
            return back()
                ->withErrors(['msg' => "Creation error"])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
