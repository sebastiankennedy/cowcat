@extends("backend.layout.main")
@section("content")
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$menus}}</h3>

                    <p>菜单管理</p>
                </div>

                <div class="icon">
                    <i class="fa fa-list-alt"></i>
                </div>

                <a href="{{route('backend.menu.index')}}" class="small-box-footer">更多信息
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$roles}}</h3>

                    <p>角色管理</p>
                </div>

                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>

                <a href="{{route('backend.role.index')}}" class="small-box-footer">更多信息
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$permissions}}</h3>

                    <p>权限管理</p>
                </div>

                <div class="icon">
                    <i class="fa fa-key"></i>
                </div>

                <a href="{{route('backend.permission.index')}}" class="small-box-footer">更多信息
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$actions}}</h3>

                    <p>操作管理</p>
                </div>

                <div class="icon">
                    <i class="fa fa-keyboard-o"></i>
                </div>

                <a href="{{route('backend.action.index')}}" class="small-box-footer">更多信息
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
