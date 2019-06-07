@extends('admins.layout.layout')
@section('title',"首页")
@section('css')
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                系统首页
                <small>系统首页</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin/index"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="/admin/index">系统首页</a></li>
                <li class="active">系统首页</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <button class="btn btn-primary"><i class="fa fa-plus"></i>添加角色</button>
            <table class="table table-hover" role="table">
                <tr>
                    <td>id</td>
                    <td>角色名称</td>
                    <td>管理</td>
                </tr>
                @foreach($roleList as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->role_name}}</td>
                        <td>
                            {{--<a class="btn btn-primary" href="{{url('/admin/role/edit?id='.$role->id)}}">编辑</a>--}}
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                编辑
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>

            <!-- 模态框（Modal） -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title" id="myModalLabel">
                                编辑角色
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form role="form">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">角色名称</label>
                                        <input type="text" class="form-control" id="roleName"
                                               name="roleName"
                                               placeholder="输入角色名称">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">选择权限
                                        </label>
                                        <div class="row">
                                            <div id="treeview-checkable" class=""></div>
                                        </div>
                                    </div>
                                    {{--<div class="form-group">--}}
                                    {{--<label for="exampleInputPassword1">权限列表</label>--}}
                                    {{--@foreach($permissionList as $permission)--}}
                                    {{--<div class="row">--}}
                                    {{--<div class="col-4">--}}
                                    {{--<label>--}}
                                    {{--{{$permission['permission_name']}}--}}
                                    {{--<input type="checkbox"--}}
                                    {{--name="permission[]"--}}
                                    {{--value="{{$permission['id']}}">--}}
                                    {{--</label>--}}
                                    {{--</div>--}}
                                    {{--@if(isset($permission['subList']))--}}
                                    {{--<div class="col-8">--}}
                                    {{--@foreach($permission['subList'] as $sub)--}}
                                    {{--<label class="checkbox-inline">--}}
                                    {{--<input type="checkbox"--}}
                                    {{--name="permission[]"--}}
                                    {{--value="{{$sub['id']}}"> {{$sub['permission_name']}}--}}
                                    {{--</label>--}}
                                    {{--@endforeach--}}
                                    {{--</div>--}}
                                    {{--@endif--}}

                                    {{--</div>--}}
                                    {{--@endforeach--}}
                                    {{--</div>--}}
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                            </button>
                            <button type="button" class="btn btn-primary">
                                提交更改
                            </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>


        </section>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <script src="/plugins/bootstrap-treeview/js/bootstrap-treeview.js"></script>
    <script type="text/javascript">

        $(function () {
            defaultData = JSON.parse('{!! $jsonStr !!}');
            var $checkableTree = $('#treeview-checkable').treeview({
                data: defaultData,
                showIcon: true,
                showCheckbox: true,
                onNodeChecked: function (event, node) {
                    console.log(node);
                    $('#checkable-output').prepend('<p>' + node.text + ' was checked</p>');
                },
                onNodeUnchecked: function (event, node) {
                    $('#checkable-output').prepend('<p>' + node.text + ' was unchecked</p>');
                }
            });

            var findCheckableNodess = function () {
                return $checkableTree.treeview('search', [$('#input-check-node').val(), {
                    ignoreCase: false,
                    exactMatch: false
                }]);
            };
            var checkableNodes = findCheckableNodess();

            // Check/uncheck/toggle nodes
            $('#input-check-node').on('keyup', function (e) {
                checkableNodes = findCheckableNodess();
                $('.check-node').prop('disabled', !(checkableNodes.length >= 1));
            });

            $('#btn-check-node.check-node').on('click', function (e) {
                $checkableTree.treeview('checkNode', [checkableNodes, {silent: $('#chk-check-silent').is(':checked')}]);
            });

            $('#btn-uncheck-node.check-node').on('click', function (e) {
                $checkableTree.treeview('uncheckNode', [checkableNodes, {silent: $('#chk-check-silent').is(':checked')}]);
            });

            $('#btn-toggle-checked.check-node').on('click', function (e) {
                $checkableTree.treeview('toggleNodeChecked', [checkableNodes, {silent: $('#chk-check-silent').is(':checked')}]);
            });

            // Check/uncheck all
            $('#btn-check-all').on('click', function (e) {
                $checkableTree.treeview('checkAll', {silent: $('#chk-check-silent').is(':checked')});
            });

            $('#btn-uncheck-all').on('click', function (e) {
                $checkableTree.treeview('uncheckAll', {silent: $('#chk-check-silent').is(':checked')});
            });

        });
    </script>
@endsection
