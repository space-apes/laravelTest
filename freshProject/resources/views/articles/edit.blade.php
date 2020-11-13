@extends('testLayout')

@section('content')

<div id="wrapper">
<h1> {{ $article->title }}  </h1>
	<div id="page" class="container">
		<form action="/articles/{{$article->id}}" method="POST">
			@csrf
			@method('PUT')
			<label> title: <input type="text" value="{{$article->title }}" name="title" required> </label>
			<br>
			<label> body: 
				<textarea name="body" required>{{ $article->body }}</textarea> 
			</label>
			<br>
			<label> excerpt: <input type="text" value="{{$article->excerpt}}"name="excerpt" required></label>
			
			<br>
			<br>
			<button type="submit">submit</button>
		</form>
	</div>
</div>
@endsection
