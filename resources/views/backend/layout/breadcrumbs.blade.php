<h1>
    {{ $title[$route]['name'] or "Page Title" }}
    <small>{{ $title[$route]['description'] or "Page Description" }}</small>
</h1>
{!! $mainPresenter->renderBreadcrumbs($menus,$route) !!}

