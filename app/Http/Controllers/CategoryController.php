<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::get();

        return view('admins.categories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.categories.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = 0)
    {
        $this->validate($request, [
            'title' => 'required|min:10',
            'description' => 'required|min:100',
        ]);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'slug' => 'slug_name'
        ];

        $createOrUpdate = Category::updateOrCreate(['id' => $id], $data);

        return redirect('admin/category')->with('success','Category '.($id != '0'? 'Updated' : 'Created') .' successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['object'] = Category::find($id);

        return view('admins.categories.createOrUpdate')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detete = Category::where('id', $request->id)->delete();
        if($detete) {
            return redirect('admin/category')->with('success', 'Category has been deleted!');
        }else {
            return redirect('admin/category')->with('error','Fail to save data, please check again!');
        }
    }
}
