@extends("backend.layout.main")

@inject("permissionPresenter","App\Presenters\PermissionPresenter")

@section("content")
    @include('backend.components.handle',$handle = $permissionPresenter->getHandle())
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">权限列表</h3>

                    <div class="box-tools">{!! $data->render() !!}</div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>权限ID</th>
                            <th>权限标识</th>
                            <th>权限类型</th>
                            <th>权限名称</th>
                            <th>权限描述</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->display_name}}</td>
                                <td>{{$item->description}}</td>
                                <td>
                                    <a href="{{route('backend.permission.associate',['id'=>$item->id])}}" class="btn btn-info btn-flat">关联</a>
                                    <a href="{{route('backend.permission.edit',['id'=>$item->id])}}" class="btn btn-primary btn-flat">编辑</a>
                                    <button class="btn btn-danger btn-flat"
                                            data-url="{{URL::to('backend/permission/'.$item->id)}}"
                                            data-toggle="modal"
                                            data-target="#delete-modal"
                                    >
                                        删除
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                @if($data->render())
                    <div class="box-footer clearfix">
                        {!! $data->render() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section("after.js")
    @include('backend.components.modal.delete',['title'=>'操作提示','content'=>'你确定要删除这个权限吗?'])
@endsection
