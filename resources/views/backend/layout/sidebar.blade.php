<aside class="main-sidebar">
    <section class="sidebar">
        {{--<div class="user-panel">--}}
            {{--<div class="pull-left image">--}}
                {{--<img src="/assets/images/user2-160x160.jpg" class="img-circle" alt="User Image"/>--}}
            {{--</div>--}}
            {{--<div class="pull-left info">--}}
                {{--<p>{{$userInfo['name']}}</p>--}}
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat">
                        <i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        {!! $mainPresenter->renderSidebar($menus,$route) !!}
    </section>
</aside>
