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
						<h4>Edit Article:</h4>
						<form class="form" action="/admin/articles/{{ $article->id }}/update" method="post">
							{{ csrf_field() }}
							<input type="hidden" name="article_id" value="{{ $article->id }}">
							<div>
								<label>Title</label>
							</div>
							<input type="text" name="title" value="{{ $article->title }}"><br>
							<div>
								<label>Body</label>
							</div>
							<textarea name="body" rows="4" cols="70" > {{ $article->body }} </textarea>
							<button class="btn btn-md btn-success" name="submit" value="submit">Submit</button>
						</form>
					</div>
				</div>				
			</div>
		</div>
	</div>
</body>
</html>