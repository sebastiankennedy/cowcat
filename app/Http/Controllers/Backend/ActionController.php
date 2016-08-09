<?php

namespace App\Http\Controllers\Backend;

use App\Facades\ActionRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Form\ActionCreateForm;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;


class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ActionRepository::paginate(config('repository.page-limit'));

        return view('backend.action.index', compact("data"));
    }

    /**
     * Display a listing of the resource by the search condition.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Router $router
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Router $router)
    {
        $actions = ActionRepository::getActionsByRoutes($router->getRoutes()->getRoutes());

        return view('backend.action.create', compact('actions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Form\ActionCreateForm $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ActionCreateForm $request)
    {
        try {
            if (ActionRepository::create($request->all())) {
                return $this->successRoutTo("backend.action.index", "新增操作成功");
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
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
     * @param  int    $id
     * @param  Router $router
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Router $router)
    {
        $data = ActionRepository::find($id);
        $actions = ActionRepository::getActionsByRoutes($router->getRoutes()->getRoutes());

        return view('backend.action.edit', compact('data', 'actions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Form\ActionCreateForm $request
     * @param  int                                     $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ActionCreateForm $request, $id)
    {
        $data = $request->except(['_token', '_method']);

        try {
            if (ActionRepository::updateById($id, $data)) {
                return $this->successRoutTo("backend.action.index", "编辑操作成功");
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
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
        try {
            if (ActionRepository::destroy($id)) {
                return $this->successRoutTo("backend.action.index", "删除操作成功");
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }
}
