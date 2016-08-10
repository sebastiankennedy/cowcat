<?php

namespace App\Http\Controllers\Backend;

use App\Facades\MenuRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Form\MenuCreateForm;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MenuRepository::paginate(config('repository.page-limit'));

        return view('backend.menu.index', compact('data'));
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
        $data = MenuRepository::paginateWhere($request->get('where'), config('repository.page-limit'));

        return view('backend.menu.search', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tree = create_level_tree(MenuRepository::getAllDisplayMenus());

        return view('backend.menu.create', compact('tree'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Form\MenuCreateForm $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MenuCreateForm $request)
    {
        try {
            if(MenuRepository::create($request->all())){
                return $this->successRoutTo('backend.menu.index', "新增菜单成功");
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
        $data = MenuRepository::find($id);
        $tree = create_level_tree(MenuRepository::getAllDisplayMenus());

        return view('backend.menu.edit', compact('tree', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Form\MenuCreateForm $request
     * @param  int                                    $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(MenuCreateForm $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        try {
            if(MenuRepository::saveById($id, $data)){

                return $this->successRoutTo('backend.menu.index', '编辑菜单成功');
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
        $childMenus = MenuRepository::getChildMenusById($id);

        if( ! empty($childMenus)){
            return $this->errorBackTo("请先删除其下级分类");
        }

        try {
            if(MenuRepository::destroy($id)){

                return $this->successBackTo('删除菜单成功');
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }
}
