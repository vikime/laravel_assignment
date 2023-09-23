<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>

   <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style= "margin-top : 20px">
                <h4>Blog Page</h4>
                <hr>
                <form method="post" action="{{ route('bloger-post') }}" enctype="multipart/form-data">
                  @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('failed'))
                    <div class="alert alert-danger">{{Session::get('failed')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        <span class="text-danger">@error('title') {{$message}} @enderror</span>
                    </div>
                     <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="floatingTextarea" cols="30" rows="10"></textarea>
                        <span class="text-danger">@error('description') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img src="" alt="" class="img-blog">
                        <input type="file" class="form-control"  name="image" value="{{old('image')}}">
                        <span class="text-danger">@error('image') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Save</button>
                    </div>
                    
                    <br>
                       <button class="btn btn-block btn-primary"><a href="login" style="color:white"> logout</a></button>
                </form>
            </div>
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>