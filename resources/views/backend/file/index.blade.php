@extends('backend.layout.main')

@section('after.css')
    <link rel="stylesheet" type="text/css" href="/assets/backend/plugins/dropzone/dropzone.min.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-box btn-success btn-flat"
                    data-toggle="modal"
                    data-target="#upload-modal">
                <i class="fa fa-upload"></i>
                上传
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">文件列表</h3>

                    <div class="box-tools"></div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>用户编号</th>
                            <th>用户邮箱</th>
                            <th>用户名称</th>
                            <th>操作</th>
                        </tr>
                    </table>
                </div>
                <div class="box-footer clearfix">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after.js')
    @include('backend.components.modal.upload')
@endsection