@extends('backend.layout.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('backend.permission.update',['id'=>$data->id])}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">权限编辑</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">权限标识</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="权限标识" value="{{old('name',$data->name)}}">
                        </div>
                        <div class="form-group">
                            <label for="type">权限分类</label>
                            <select name="type" id="type" class="select2 form-control" style="width:100%;">
                                @foreach(config('cowcat.permission-type') as $key => $value)
                                    <option value="{{$key}}"
                                            @if($key == $data->type) selected @endif
                                    >{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="display_name">权限名称</label>
                            <input type="text" class="form-control" id="display_name" name="display_name" placeholder="权限名称" value="{{old('display_name',$data->display_name)}}">
                        </div>
                        <div class="form-group">
                            <label for="description">权限描述</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="权限描述" value="{{old('description',$data->description)}}">
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">
                            <i class="fa fa-arrow-left"></i>
                            返回
                        </a>
                        <button type="submit" class="btn btn-success pull-right btn-flat">
                            <i class="fa fa-save"></i>
                            修 改
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

