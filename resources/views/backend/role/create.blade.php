@extends("backend.layout.main")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{route('backend.role.store')}}">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">新增角色</h3>
                    </div>
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">角色标识</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="角色标识" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="display_name">角色名称</label>
                            <input type="text" class="form-control" id="display_name" name="display_name" placeholder="角色名称" value="{{old('display_name')}}">
                        </div>
                        <div class="form-group">
                            <label for="description">角色描述</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="角色描述" value="{{old('description')}}">
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