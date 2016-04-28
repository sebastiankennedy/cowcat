@extends('backend.layout.main')

@section('before.css')
<link rel="stylesheet" type="text/css" href="/assets/plugins/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="/assets/plugins/daterangepicker/daterangepicker-bs3.css">
@endsection

@section('content')
<div class="row">
	<div class="col-md-3">
		<a class="btn btn-box btn-success btn-flat">
			<i class="fa fa-plus"></i> 新增
		</a>
		<a class="btn btn-box btn-info btn-flat">
			<i class="fa fa-sort"></i> 排序
		</a>
	</div>
</div>

<div class="row">
	<form class="form-inline" action="/admin/menu/search" method="get">
		<div class="col-md-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">筛选条件</h3>
				</div>
				<div class="box-body table-responsive">
					<div class="form-group">
						<select class="form-control select2" name="parent_id">
							<option selected="selected" value="">所有分类</option>
							<option value="0">顶级分类</option>
						</select>
					</div>

					<div class="form-group">
						<input type="name" class="form-control" id="name" name="name" placeholder="菜单名称" >
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="created_at" name="created_at">
					</div>
				</div>
				<div class="box-footer">
					<div class="form-group">
						<button class="btn btn-success btn-flat" type="submit">
							<i class="fa fa-filter"></i>
							筛选
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
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
							<th>操作</th>
						</tr>
					@foreach($data as $item)
						<tr>
							<td>{{$item->id}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->url}}</td>
							<td>
								<a href="" class="btn bg-orange btn-flat">编辑</a>
								<a href="" class="btn btn-danger btn-flat">删除</a>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
			<div class="box-footer clearfix">
				{!! $data->render() !!}
            </div>
		</div>
	</div>
</div>
@endsection

@section('after.js')
<script type="text/javascript" src="/assets/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript" src="/assets/plugins/daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript">
$(function(){
	$('.select2').select2();
	$('#created_at').daterangepicker({timePickerIncrement: 30, format: 'YYYY/MM/DD HH:mm'});
});
</script>
@endsection
