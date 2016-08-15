@extends("backend.layout.main")

@inject("userPresenter","App\Presenters\UserPresenter")

@section("content")
    @include('backend.components.handle',$handle = $userPresenter->getHandle())
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">用户列表</h3>

                    <div class="box-tools">{!! $data->render() !!}</div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>用户编号</th>
                            <th>用户邮箱</th>
                            <th>用户名称</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @if(Auth::user()->id == $item->id)
                                        <a href="{{route('backend.user.edit',['id'=>$item->id])}}" class="btn btn-primary btn-flat">编辑</a>
                                    @endif
                                    {{--<button class="btn btn-danger btn-flat"--}}
                                            {{--data-url="{{URL::to('backend/user/'.$item->id)}}"--}}
                                            {{--data-toggle="modal"--}}
                                            {{--data-target="#delete-modal"--}}
                                    {{-->--}}
                                        {{--删除--}}
                                    {{--</button>--}}
                                    {{--<a href="{{route('backend.email.send',['id'=>$item->id])}}" class="btn bg-orange btn-flat">测试发送文字邮件</a>--}}
                                    {{--<a href="{{route('backend.email.sendPicture',['id'=>$item->id])}}" class="btn btn-info btn-flat">测试发送图文邮件</a>--}}
                                    {{--<a href="{{route('backend.email.sendFile',['id'=>$item->id])}}" class="btn btn-facebook btn-flat">测试发送附件邮件</a>--}}
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
    @include('backend.components.modal.delete',['title'=>'操作提示','content'=>'你确定要删除这名用户吗?'])
@endsection
