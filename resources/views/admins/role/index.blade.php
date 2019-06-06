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
                        <td><a class="btn btn-primary" href="{{url('/admin/role/edit?id='.$role->id)}}">编辑</a></td>
                    </tr>
                @endforeach
            </table>
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('js')

@endsection
