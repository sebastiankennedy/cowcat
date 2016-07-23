@if(!empty($title[$route]['name']))
<h1>
    {{ trans($title[$route]['name']) }}
    <small>{{ trans($title[$route]['description']) }}</small>
</h1>
@endif
{!! $mainPresenter->renderBreadcrumbs($menus,$route) !!}

