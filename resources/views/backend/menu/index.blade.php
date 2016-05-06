@extends('backend.layout.main')
@inject('menuPresenter','App\Presenters\MenuPresenter')

@section('content')
<div class="row">
	<div class="col-md-12">
		@foreach($actionFields as $item)
			{!! Html::decode(Html::link($item['url'],$item['title'],$item['attr'])) !!}
		@endforeach
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body table-responsive">
				{!! Form::open(['route'=>'menu.search','method'=>'get','class'=>'form-inline']) !!}
					<div class="form-group">
						{!! Form::select('parent_id',[''=>'所有分类','0'=>'顶级分类'],'',['class'=>'form-control select2','style'=>'width:100%']) !!}
					</div>
					<div class="form-group">
						{!! Form::text('name','',['class'=>'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::text('created_at','',['class'=>'form-control','id'=>'created_at']) !!}
					</div>
					<div class="form-group">
						{!! Form::button('<i class="fa fa-filter"></i> 筛选',['class'=>'btn btn-success btn-flat','type'=>'submit']) !!}
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">菜单列表</h3>

				<div class="box-tools">{!! $data->render() !!}</div>
			</div>

			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
						<tr>
							<th>菜单编号</th>
							<th>菜单名称</th>
							<th>菜单地址</th>
							<th>是否显示</th>
							<th>操作</th>
						</tr>
					@foreach($data as $item)
						<tr>
							<td>{{$item->id}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->route}}</td>
							<td>{{$item->hide}}</td>
							<td>
								<a href="{{route('menu.edit',['id'=>$item->id])}}" class="btn bg-orange btn-flat">编辑</a>
								<a href="" class="btn btn-danger btn-flat">删除</a>
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
