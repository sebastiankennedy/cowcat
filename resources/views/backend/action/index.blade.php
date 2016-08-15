@extends("backend.layout.main")

@inject('actionPresenter','App\Presenters\ActionPresenter')

@section("content")
    @include('backend.components.handle',$handle = $actionPresenter->getHandle())
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">操作列表</h3>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>操作ID</th>
                            <th>操作名称</th>
                            <th>操作描述</th>
                            <th>操作分组</th>
                            <th>操作标识</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->group}}</td>
                                <td>{{$item->action}}</td>
                                <td>
                                    <a href="{{route('backend.action.edit',['id'=>$item->id])}}" class="btn btn-primary btn-flat">编辑</a>
                                    <button class="btn btn-danger btn-flat"
                                            data-url="{{URL::to('backend/action/'.$item->id)}}"
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
    @include('backend.components.modal.delete',['title'=>'操作提示','content'=>'你确定要删除这个操作吗?'])
@endsection
