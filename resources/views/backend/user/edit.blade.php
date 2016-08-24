@extends('backend.layout.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('backend.user.update',['id'=>$user->id])}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">编辑用户</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>用户角色</label>
                            <select class="form-control select2" multiple="multiple" name="role_id[]" style="width: 100%">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if(in_array($role->display_name,$displayNames)) selected @endif>{{$role->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">用户名称</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="用户名称" value="{{old('name',$user->name)}}">
                        </div>
                        <div class="form-group">
                            <label for="email">用户邮箱</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="用户邮箱" value="{{old('email',$user->email)}}">
                        </div>
                        <div class="form-group">
                            <label for="password">用户密码</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="用户密码">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">确认密码</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="确认密码">
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

