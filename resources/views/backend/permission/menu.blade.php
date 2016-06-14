@extends("backend.layout.main")
@section('after.css')
    <link rel="stylesheet" href="/assets/css/zTreeStyle.css">
    <link rel="stylesheet" href="/assets/css/font-awesome-zTree.css">
@endsection
@section("content")
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">菜单权限</h3>
                    <div class="box-tools">
                        <button id="check-all-true" type="button" class="btn btn-sm btn-flat btn-info">全选</button>
                        <button id="check-all-false" type="button" class="btn btn-sm btn-flat btn-warning">全删</button>
                    </div>
                </div>
                <div class="box-body">
                    <ul id="treeDemo" class="ztree"></ul>
                </div>
                <div class="box-footer">
                    <button id="save-menu-permission" type="button" class="btn btn-flat btn-success">赋 权</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("after.js")
    <script src="/assets/js/jquery.ztree.all-3.5.min.js"></script>
    <script type="text/javascript">
        var zNodes = {!! $data !!};
        var setting = {
            check: {
                enable: true,
                chkboxType: {"Y": "ps", "N": "ps"}
            },
            data: {
                simpleData: {
                    enable: true
                }
            }
        };
        $(document).ready(function () {
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            var zTree = $.fn.zTree.getZTreeObj("treeDemo");
            $('#check-all-true').click(function () {
                zTree.checkAllNodes(true);
            });
            $('#check-all-false').click(function () {
                zTree.checkAllNodes(false);
            });
            $('#save-menu-permission').click(function () {
                Backend.ajax.request({
                    data: zNodes,
                    href: "{{route('role.save.permission')}}"
                });
            });
        });
    </script>
@endsection
