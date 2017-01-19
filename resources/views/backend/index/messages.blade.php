@extends('backend.layout.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">留言面板</h3>

                    <div class="box-tools"></div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>称呼</th>
                            <th>邮箱</th>
                            <th>信息</th>
                        </tr>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->message}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                @if($messages->render())
                    <div class="box-footer clearfix">
                        {!! $messages->render() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section("after.js")
    @include('backend.components.modal.delete',['title'=>'操作提示','content'=>'你确定要删除这条菜单吗?'])
@endsection
