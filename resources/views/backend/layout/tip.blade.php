@if($errors->has($field))
    @foreach ($errors->get($field) as $error)
        <button type="button" class="btn btn-danger col-sm-12 btn-flat" style="width: 100%;">
            <i class="fa fa-times-circle-o"></i> {{$error}}
        </button>
    @endforeach
@endif