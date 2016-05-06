<?php

namespace App\Http\Controllers\Backend;

use App\Facades\MenuRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Form\MenuForm;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actionFields = [
            [
                'url'=>route('menu.create'),
                'attr'=>[
                    'class'=>'btn btn-box btn-success btn-flat'
                ],
                'title'=>'<i class="fa fa-plus"></i> 新增',

            ],
            [
                'url'=>'',
                'attr'=>[
                    'class'=>'btn btn-box btn-info btn-flat'
                ],
                'title'=>'<i class="fa fa-sort"></i> 排序',
            ]
        ];
        $searchForm = [
            'route'=>route('menu.search'),
            'method'=>'get',
            'class'=>'form-inline',
            'inputs'=>[
                [
                    'type'=>'select',
                    'name'=>'parent_id',
                    'value'=>[
                        ''=>'所有分类',
                        '0'=>'顶级分类'
                    ],
                    'selected'=>'',
                    'attributes'=>[
                        'class'=>'form-control select2',
                        'style'=>'width:100%'
                    ]
                ],
                [
                    'type'=>'text',
                    'name'=>'name',
                    'value'=>'',
                    'attributes'=>[
                        'placeholder'=>'菜单名称',
                        'class'=>'form-control',
                    ]
                ],
                [
                    'type'=>'text',
                    'name'=>'created_at',
                    'value'=>'',
                    'attributes'=>[
                        'class'=>'form-control',
                        'id'=>'created_at'
                    ]
                ],
                [
                    'type'=>'button',
                    'value'=>'<i class="fa fa-filter"></i> 筛选',
                    'attributes'=>[
                        'class'=>'btn btn-success btn-flat',
                        'type'=>'submit'
                    ]
                ],
            ]
        ];
        // $html = [];
        // foreach ($actionFields as  $item) {
        //    array_push($html,Html::decode(Html::link($item['url'],$item['title'],$item['attr'])));
        // }
        // dd($html);
        $data = MenuRepository::paginate(config('repository.page-limit'));
        return view('backend.menu.index', compact('data', 'actionFields', 'searchForm'));
    }

    /**
     * Display a listing of the resource by the search condition.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuForm $request)
    {
        try {
            if (MenuRepository::create($request->all())) {
                MenuRepository::clearAllMenusCache();
                return redirect()->route('menu.index')->withSuccess("新增菜单成功");
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        unset($data['_token']);
        unset($data['_method']);

        try {
            if (MenuRepository::updateById($id, $data)) {
                return redirect()->route('menu.index')->withSuccess('编辑菜单成功');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('error' => $e->getMessage()))->withInput();
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
