@extends('backend.layout.main')

@section('content')
    @include('backend.components.handle',$handle)
    @include('backend.components.search',$search)

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">用户列表</h3>

                    <div class="box-tools">{!! $data->appends($params)->render() !!}</div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>用户编号</th>
                            <th>用户邮箱</th>
                            <th>用户名称</th>
                            <th>管理操作</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="{{route('user.edit',['id'=>$item->id])}}" class="btn btn-primary btn-flat">编辑</a>
                                    <a href="" class="btn btn-danger btn-flat">删除</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                @if($data->appends($params)->render())
                    <div class="box-footer clearfix">
                        {!! $data->appends($params)->render() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
