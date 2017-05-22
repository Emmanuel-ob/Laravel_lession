<!DOCTYPE html>
<html>
<head>
	<title>{{ $article->title }} | Blog</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>{{ $article->title }}</h1>
				<div class="col-md-6">
					<div style="max-width: 450px; ">						
						<p>{{ $article->body }}</p>
					</div>
					<div>
						@if (\Session::has('message'))
							<div class="alert alert-success">{{ \Session::get('message') }}</div>
						@endif
						<h4>comments:</h4>
						<form class="form" action="/articles/{{ $article->id }}/comment" method="post">
							{!! csrf_field() !!}
							<input type="hidden" name="article_id" value="{{$article->id}}">
							<input type="text" name="name"><br>
							<textarea name="comment" rows="4" cols="70"></textarea>
							<button class="btn btn-md btn-success" name="submit" value="submit">Submit</button>
						</form>
					</div>
				</div>				
			</div>
		</div>
	</div>
</body>
</html>