@extends('backend.layout.main')
@inject('menuPresenter','App\Presenters\MenuPresenter')

@section('content')
    @include('backend.components.handle', ['handle' => $menuPresenter->getHandleParams()])
    @include('backend.components.search', ['search' => $menuPresenter->getSearchParams()])
    @include('backend.components.table',  ['table'  => $menuPresenter->getTableParams()])
@endsection
