@if(Session::has('errors'))
	<div id="errors-message" class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			&times;
		</button>
		<h4><i class="icon fa fa-ban"></i> 错误提示!</h4>
		@foreach($errors->all() as $error)
			{{$error}}!&nbsp;&nbsp;&nbsp;&nbsp;
		@endforeach
	</div>
@endif
