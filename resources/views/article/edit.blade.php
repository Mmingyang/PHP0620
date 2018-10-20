@extends("layouts.main")

@section("title","文章编辑")
@section("content")
    <form class="form-horizontal" method="post">
        <div class="form-group">
            {{csrf_field()}}
            <label for="inputEmail3" class="col-sm-2 control-label">文章名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{$article->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">作者</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" placeholder="" name="author" value="{{$article->author}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">内容</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="content" placeholder="" name="content" value="{{$article->content}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-10">
            <select name="fenleis_id" id="">
                <option value="">请选择分类</option>
                @foreach($rows as $row)
                    <option value="{{$row->id}}" <?php if($row["id"]===$article["fenleis_id"]) echo "selected"?>>{{$row->fenleiN}}</option>
                @endforeach
            </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">编辑</button>
            </div>
        </div>
    </form>
@endsection

