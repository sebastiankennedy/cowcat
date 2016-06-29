@extends("backend.layout.main")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('backend.user.store')}}">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">新增用户</h3>
                    </div>
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label>用户角色</label>
                            <select class="form-control select2" multiple="multiple" name="role_id[]" style="width: 100%;">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">用户名称</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="用户名称" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">用户邮箱</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="用户邮箱" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="password">用户密码</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="用户密码" value="{{old('password')}}">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">确认密码</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="确认密码" value="{{old('password_confirmation')}}">
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">
                            <i class="fa fa-arrow-left"></i>
                            返回
                        </a>
                        <button type="submit" class="btn btn-success pull-right btn-flat">
                            <i class="fa fa-plus"></i>
                            新 增
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection