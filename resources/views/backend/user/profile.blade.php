@extends('backend.layout.main')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="box" style="border-top-color: #333;">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="/assets/backend/images/user4-128x128.jpg" alt="User profile picture">
                    <h3 class="profile-username text-center">{{$userInfo->name}}</h3>
                    <p class="text-muted text-center">Software Engineer</p>
                    {{--<a href="#" class="btn btn-primary btn-block"><b>关注</b></a>--}}
                </div>
            </div>

            <div class="box" style="border-top-color: #333;">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Introduction</strong>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab">个人信息</a></li>
                    <li><a href="#community" data-toggle="tab">网络社区</a></li>
                    <li><a href="#avatar" data-toggle="tab">修改头像</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="settings">
                        <form class="form-horizontal" method="post" action="{{route('backend.user.update-profile')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" id="user_id" value="{{$id}}">
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">验证邮箱</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nick_name" class="col-sm-2 control-label">显示昵称</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nick_name" name="nick_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="real_name" class="col-sm-2 control-label">真实姓名</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="real_name" name="real_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="job" class="col-sm-2 control-label">职业名称</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="job" name="job">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="province" class="col-sm-2 control-label">所在省份</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="province" name="province">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-sm-2 control-label">所在城市</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="city" name="city">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">详细地址</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="education" class="col-sm-2 control-label">教育经历</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="education" name="education"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="introduction" class="col-sm-2 control-label">自我介绍</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="introduction" name="introduction"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-black">确定</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="community">
                        <form class="form-horizontal" method="post" action="{{route('backend.user.update-profile')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" id="user_id" value="{{$id}}">
                            <div class="form-group">
                                <label for="weibo" class="col-sm-2 control-label">微博</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="weibo" name="weibo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="github" class="col-sm-2 control-label">Github</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="github" name="github">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="twitter" class="col-sm-2 control-label">Twitter</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="twitter" name="twitter">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="skills" class="col-sm-2 control-label">技能兴趣</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="skills" name="skills">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location" class="col-sm-2 control-label">当前位置</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="location" name="location">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-black">确定</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="avatar">
                        <form class="form-horizontal" method="post" action="{{route('backend.user.update-profile')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" id="user_id" value="{{$id}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection