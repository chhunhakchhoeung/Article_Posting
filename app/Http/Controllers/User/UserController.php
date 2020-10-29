<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::get();

        return view('users.home')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = 0)
    {
        if($id == 0):
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'f_name' => 'devit',
                'l_name' => 'chan'
            ];
        else:
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'f_name' => 'devit',
                'l_name' => 'chan'
            ];
        endif;
        $createOrUpdate = User::updateOrCreate(['id' => $id], $data);

        return redirect('admin/users/lists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['object'] = User::find($id);

        return view('users.createOrUpdate')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $detete = User::where('id', $request->id)->delete();
        if($detete) {
            $request->session()->flash('success', 'Data has been deleted!');
            return redirect('admin/users/lists');
        }else {
            $request->session()->flash('error','Fail to save data, please check again!');
            return redirect('admin/users/lists');
        }
    }
}
