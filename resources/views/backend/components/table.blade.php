<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$table['title']}}</h3>
            </div>

            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    @if(!empty($table['fields']) && is_array($table['fields']))
                        <tr>
                            @foreach($table['fields'] as $field)
                                <th>{{$field}}</th>
                            @endforeach
                            <th>管理操作</th>
                        </tr>
                    @endif
                    @foreach($data as $item)
                        <tr>
                            @foreach($table['fields'] as $key =>$field)
                                <td>{{$item->$key}}</td>
                            @endforeach
                            <td>
                                @foreach($table['handle'] as $button)
                                    @if($button['type'] == 'edit')
                                        <a href="{{route($button['route'],['id'=>$item->id])}}"
                                           class="btn btn-info btn-flat">
                                            {{$button['title']}}
                                        </a>
                                    @endif
                                    @if($button['type'] == 'delete')
                                        <a class="btn btn-danger btn-flat"
                                           data-url="{{route($button['route'],['id'=>$item->id])}}"
                                           data-toggle="modal"
                                           data-target="#delete-modal"
                                        >
                                            删除
                                        </a>
                                        @section("after.js")
                                            @include('backend.components.modal.delete',['title'=>'操作提示','content'=>'你确定要删除这条菜单吗?'])
                                        @endsection
                                    @endif
                                @endforeach
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
