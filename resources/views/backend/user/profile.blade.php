@extends('backend.layout.main')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="box" style="border-top-color: #333;">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{$user->profile->avatar or '/assets/backend/images/user4-128x128.jpg'}}" alt="User profile picture">
                    <h3 class="profile-username text-center">{{$user->name}}</h3>
                    <p class="text-muted text-center">{{$user->profile->job or ""}}</p>
                    {{--<a href="#" class="btn btn-primary btn-block"><b>关注</b></a>--}}
                </div>
            </div>

            <div class="box" style="border-top-color: #333;">
                <div class="box-header with-border">
                    <h3 class="box-title">自我描述</h3>
                </div>
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> 教育经历</strong>

                    <p class="text-muted">
                        {{$user->profile->education or ""}}
                    </p>

                    <hr>


                    <strong><i class="fa fa-pencil margin-r-5"></i> 技能兴趣</strong>

                    <p>
                        @if(!empty($user->profile->skills))
                            @foreach(explode(',',$user->profile->skills) as $key => $value)
                                <span class="label {{$color[$key % count($color)]}}">{{$value}}</span>
                            @endforeach
                        @endif
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> 自我介绍</strong>

                    <p>{{$user->profile->introduction or ""}}</p>
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
                                <label for="nick_name" class="col-sm-2 control-label">显示昵称</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nick_name" name="nick_name" value="{{$user->profile->nick_name or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="real_name" class="col-sm-2 control-label">真实姓名</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="real_name" name="real_name" value="{{$user->profile->real_name or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="job" class="col-sm-2 control-label">职业名称</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="job" name="job" value="{{$user->profile->job or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="province" class="col-sm-2 control-label">所在省份</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="province" name="province" value="{{$user->profile->province or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-sm-2 control-label">所在城市</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="city" name="city" value="{{$user->profile->city or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">详细地址</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="address" name="address" value="{{$user->profile->address or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="education" class="col-sm-2 control-label">教育经历</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="education" name="education">{{$user->profile->education or ''}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="introduction" class="col-sm-2 control-label">自我介绍</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="introduction" name="introduction">{{$user->profile->introduction or ''}}</textarea>
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
                                    <input type="text" class="form-control" id="weibo" name="weibo" value="{{$user->profile->weibo or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="github" class="col-sm-2 control-label">Github</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="github" name="github" value="{{$user->profile->github or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="twitter" class="col-sm-2 control-label">Twitter</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{$user->profile->twitter or ''}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="skills" class="col-sm-2 control-label">技能兴趣</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="skills" name="skills" value="{{$user->profile->skills or ''}}" placeholder="使用逗号进行分割">
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
                        <form id="uploadForm" class="form-horizontal" method="post" action="{{route('backend.user.update-profile')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="user_id" id="user_id" value="{{$id}}">
                            <div class="form-group">
                                <label for="file" class="col-sm-2 control-label">选择图片</label>

                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="file" name="file">
                                    <input type="hidden" id="image" name="avatar" value="{{$user->profile->avatar or ''}}">
                                    @if(!empty($user->profile->avatar))
                                        <img src="{{$user->profile->avatar}}" alt="{{$user->name}}" id="preview" style="margin-top: 10px;border-radius: 10px;">
                                    @else
                                        <img src="" alt="" id="preview" style="margin-top: 10px;border-radius: 10px;">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-black">确定</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('after.js')
    <script type="text/javascript">
        $(function () {
            $('#file').on('change', function () {
                $.ajax({
                    url: '{{route("backend.user.upload-avatar")}}',
                    type: 'POST',
                    cache: false,
                    data: new FormData($('#uploadForm')[0]),
                    processData: false,
                    contentType: false
                }).done(function (response) {
                    var url = response.data.url;
                    $('#image').attr('value', url);
                    $('#preview').attr('src', url);
                }).fail(function (response) {
                    console.log(response);
                });
            });
        });
    </script>
@endsection