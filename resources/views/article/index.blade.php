@extends("layouts.main")
@section("title","文章列表")
@section("content")
    <a href="/article/add" class="btn btn-info">添加</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>文章名称</th>
            <th>作者</th>
            <th>内容</th>
            <th>分类</th>
            <th>操作</th>
        </tr>
        @foreach($rows as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->author}}</td>
            <td>{{$row->content}}</td>
            <td>{{$row->fenleiN}}</td>
            <td>
                <a href="edit/{{$row->id}}" class="btn btn-info">编辑</a>
                <a href="del/{{$row->id}}" class="btn btn-info">删除</a>
            </td>
        </tr>
        @endforeach

    </table>

    {{--<div class="pull-right">--}}
        {{--{{$articles->links()}}--}}
    {{--</div>--}}

@endsection
