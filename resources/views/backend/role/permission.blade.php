@extends("backend.layout.main")
@section('after.css')
    <link rel="stylesheet" href="/assets/css/zTreeStyle.css">
    <link rel="stylesheet" href="/assets/css/font-awesome-zTree.css">
@endsection
@section("content")
    <div class="row">
        <div class="col-md-6">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">权限管理</h3>
                    <div class="box-tools">
                        <button id="check-all-true" type="button" class="btn btn-flat btn-info">全选</button>
                        <button id="check-all-false" type="button" class="btn btn-flat btn-warning">全删</button>
                    </div>
                </div>
                <div class="box-body">
                    <ul id="treeDemo" class="ztree"></ul>
                </div>
                <div class="box-footer">
                    <button id="save-permission" type="button" class="btn btn-flat btn-success">赋 权</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("after.js")
    <script src="/assets/js/jquery.ztree.all-3.5.min.js"></script>
    <script type="text/javascript">
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
        var zNodes = [
            {id: 1, pId: 0, name: "随意勾选 1", open: true, checked: true,value:'1'},
            {id: 11, pId: 1, name: "随意勾选 1-1", open: true, checked: true},
            {id: 111, pId: 11, name: "随意勾选 1-1-1"},
            {id: 112, pId: 11, name: "随意勾选 1-1-2"},
            {id: 12, pId: 1, name: "随意勾选 1-2", open: true},
            {id: 121, pId: 12, name: "随意勾选 1-2-1"},
            {id: 122, pId: 12, name: "随意勾选 1-2-2"},
            {id: 2, pId: 0, name: "随意勾选 2", checked: true, open: true},
            {id: 21, pId: 2, name: "随意勾选 2-1"},
            {id: 22, pId: 2, name: "随意勾选 2-2", open: true},
            {id: 221, pId: 22, name: "随意勾选 2-2-1", checked: true},
            {id: 222, pId: 22, name: "随意勾选 2-2-2"},
            {id: 23, pId: 2, name: "随意勾选 2-3"}
        ];

        $(document).ready(function () {
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            var zTree = $.fn.zTree.getZTreeObj("treeDemo");
            $('#check-all-true').click(function () {
                zTree.checkAllNodes(true);
            });
            $('#check-all-false').click(function () {
                zTree.checkAllNodes(false);
            });
            $('#save-permission').click(function () {
                Backend.ajax.request({
                    data: zNodes,
                    href: "{{route('role.save.permission')}}"
                });
            });
        });
    </script>
@endsection
