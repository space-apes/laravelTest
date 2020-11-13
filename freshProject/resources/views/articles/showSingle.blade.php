@extends('testLayout')



@section ('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">

                        <h2>{{ $article->title }}</h2>
                        <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                </div>
                {{ $article->body }}
                <p style="margin-top: 1em">
                    @foreach($article->tags as $tag)
                        <!-- another way to link to all articles associated with specific tag
                        would be to create a /tags/ endpoint and controller and
                        associate /tags/ and /tags/article
                        with index/get single

                        -->
                        <!-- this method involves inserting data into the URL / query string
                        then you must change the controller to register 'tag' in the request
                        -->
                        <a href="/articles/?tag={{$tag->name}}"> {{ $tag->name }}</a>
                    @endforeach
                </p>
            </div>
        </div>
@endsection
