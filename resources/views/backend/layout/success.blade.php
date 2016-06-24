@if(Session::has('success'))
    <div id="success-message" class="alert alert-success alert-dismissible" style="background-color: #24ce7b !important;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> 成功提示!</h4>
        {{Session::get('success')}}
    </div>
@endif
