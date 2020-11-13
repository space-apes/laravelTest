@extends('testLayout')

@section('header')
<link href="/css/bulma/css/bulma.min.css" rel="stylesheet"> </link>
@endsection

@section('content')

<div id="wrapper">
<h1> create a new article </h1>
	<div id="page" class="container">
		<form action="/articles" method="POST">
			@csrf

			<label> title: <input type="text" name="title" required> </label>
			<br>
			<label> body:
				<textarea name="body" required></textarea>
			</label>
			<br>
			<label> excerpt: <input type="text" name="excerpt" required></label>
            <br>
            <!-- to pass in all the tags as options, we need to make
            an array of tag choices available from the controller. check ArticlesController@create
            -->

            <label> body:
                <select multiple name ="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </label>
            <br>


			<button type="submit">submit</button>
		</form>
	</div>
</div>
@endsection
