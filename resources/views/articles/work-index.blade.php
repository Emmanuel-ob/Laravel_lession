<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Document</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    
                        
                        <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Article Title</th>
                                            <th>Article ID</th>
                                            <th>Edit</th>
                                            <th>Action 1</th
                                        </tr>
                                    </thead>
                                    @foreach($articles as $article)
                                    <tbody>
                                    
                                        <tr>
                                            <td>{{ $article->title }}</td>
                                            <td>{{ $article->id }}</td>
                                            <td><a href="/admin/articles/{{$article->id}}/edit">EDIT</a></td>
                                            <td><a href="/admin/articles/{{$article->id}}/delete">DELETE</a></td>
                                        </tr>
                                        
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                           
                </div>

               <div>
                        @if (\Session::has('message'))
                            <div class="alert alert-success">{{ \Session::get('message') }}</div>
                        @endif
                        <p></p>
                        
                        <div style="width: 50%; margin: auto;">
                        <h4>Create New Article:</h4>
                        <form class="form" action="/admin/articles/new" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="article_id" value="">
                            <div>
                                <label>Title</label>
                            </div>
                            <input type="text" class="form-control" name="title" value=""><br>
                            <div>
                                <label>Body</label>
                            </div>
                            <textarea name="body" class="form-control" rows="4" cols="70" > </textarea>
                            <br>
                            <button class="btn btn-md btn-primary" name="submit" value="submit">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>          

            </div>
        </div>
    </body>
</html>
               