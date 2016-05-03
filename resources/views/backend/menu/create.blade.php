@extends('backend.layout.main')

@section('before.css')
<link rel="stylesheet" type="text/css" href="/assets/plugins/select2/select2.min.css">
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">新增菜单</h3>
			</div>
			<form>
				<div class="box-body">
					<div class="form-group">
						<label>菜单上级</label>
						<select class="form-control select2" style="width: 100%;">
							<option selected="selected">Alabama</option>
							<option>Alaska</option>
							<option>California</option>
							<option>Delaware</option>
							<option>Tennessee</option>
							<option>Texas</option>
							<option>Washington</option>
						</select>
					</div>
					<div class="form-group">
						<label for="name">菜单名称</label>
						<input type="email" class="form-control" id="name" name="name" placeholder="菜单名称">
					</div>
					<div class="form-group">
						<label for="route">菜单路由</label>
						<input type="password" class="form-control" id="route" name="route" placeholder="菜单路由">
					</div>
					<div class="form-group">
						<label for="description">菜单描述</label>
						<input type="password" class="form-control" id="description" name="description" placeholder="菜单描述">
					</div>
					<div class="form-group">
						<label for="icon">菜单图标</label>
						<input type="password" class="form-control" id="icon" name="icon" placeholder="菜单图标">
					</div>
					<div class="form-group">
						<label for="sort">菜单排序</label>
						<input type="password" class="form-control" id="sort" name="sort" placeholder="菜单排序">
					</div>
					<div class="form-group">
						<label for="hide">是否隐藏</label>
						<input type="password" class="form-control" id="hide" name="hide" placeholder="是否隐藏">
					</div>
				</div>
			</form>
			<div class="box-footer clearfix">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-plus"></i>
					新 增
				</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('after.js')
<script type="text/javascript" src="/assets/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript">
$(function(){
	$('.select2').select2();
});
</script>
@endsection
