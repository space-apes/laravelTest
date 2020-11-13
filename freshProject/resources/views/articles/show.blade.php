@extends('testLayout')



	@section ('content')
	<div id="wrapper">
        <div id="page" class="container">
                <div id="content">
			<div class="title">
			@foreach($articles as $currentArticle)
                                <a href="{{ route('articles.showSingle', $currentArticle) }}">
                                    <h2>{{ $currentArticle->title }}</h2>
                                </a>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			{{ $currentArticle->body }}
			@endforeach
		</div>
        </div>
</div>
@endsection
