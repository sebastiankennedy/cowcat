@extends("backend.layout.main")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{route('backend.action.update',['id'=>$data->id])}}">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">编辑操作</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="group">操作分组</label>
                            <div class="form-group">
                                <select class="form-control select2" name="group">
                                    @foreach(config('cowcat.action-group') as $key => $group)
                                        <option value="{{$key}}"
                                                @if($key == $data->group) selected @endif
                                        >{{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">操作名称</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="操作名称" value="{{old('name',$data->name)}}">
                        </div>
                        <div class="form-group">
                            <label for="description">操作描述</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="操作描述" value="{{old('description',$data->description)}}">
                        </div>
                        <div class="form-group">
                            <label for="action">操作标识</label>
                            <select class="form-control select2" name="action">
                                @foreach($actions as $key => $action)
                                    <option value="{{$action}}"
                                            @if($action == $data->action) selected @endif
                                    >{{$action}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">是否禁用</label>
                            <div class="form-group">
                                <select class="form-control select2" name="state">
                                    <option selected="selected" value="0">禁用</option>
                                    <option value="1">启用</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">
                            <i class="fa fa-arrow-left"></i>
                            返回
                        </a>
                        <button type="submit" class="btn btn-success pull-right btn-flat">
                            <i class="fa fa-save"></i>
                            修改
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection