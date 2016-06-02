<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Facades\UserRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Form\UserForm;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserRepository::paginate(config('repository.page-limit'));
        return view("backend.user.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Form\UserForm $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserForm $request)
    {
        $data = [
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => bcrypt($request['password'])
        ];

        try {
            if (User::create($data)) {
                return redirect()->route('user.index')->withSuccess('新增用户成功');
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
