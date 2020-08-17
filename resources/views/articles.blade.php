<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href=//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css rel=stylesheet type=text/css> <link href="//fonts.googleapis.com/css?family=Titillium+Web:700|Source+Serif+Pro:400,700|Merriweather+Sans:400,700|Source+Sans+Pro:400,300,600,700,300italic,400italic,600italic,700italic" rel=stylesheet type=text/css> <link rel=stylesheet href=https://demo.productionready.io/main.css> </head> <body>
    <div id="app">
        <nav class="navbar navbar-light">
            <div class="container"><a href="/" class="navbar-brand router-link-exact-active router-link-active">
                    Oorth-Test
                </a>
                <ul class="nav navbar-nav pull-xs-right">
                    <li class="nav-item"><a href="/" class="nav-link router-link-exact-active active">Back to Home</a></li>
                </ul>
            </div>
        </nav>
        <div class="home-page">
            <div class="container page">
                <div class="row">
                    <div class="col-md-12">
                        <div class="feed-toggle">
                            <ul class="nav nav-pills outline-active">
                                <!---->
                                <li class="nav-item"><a href="#/" class="nav-link router-link-exact-active active">
                                        Global Feed
                                    </a></li>
                                <!---->
                            </ul>
                        </div>
                        <div class="home-global">
                            <div>
                                <div>
                                    <!--List Articles-->
                                    @foreach($articles as $article)
                                    <div class="article-preview">
                                        <div class="article-meta" ispreview=""><a href="user/{{ $article->author->username }}" class=""><img src="{{ $article->author->image }}"></a>
                                            <div class="info"><a href="user/{{ $article->author->username }}" class="author">
                                                    {{ $article->author->username }}
                                                </a><span class="date">{{ $article->createdAt }}</span></div><button class="btn btn-sm pull-xs-right btn-outline-primary"><i class="ion-heart"></i><span class="counter"> {{ $article->favoritesCount }} </span></button>
                                        </div><a href="#/articles/lorem-ipsum-142ei8" class="preview-link">
                                            <h1>{{ $article->title }}</h1>
                                            <p>{{ $article->body }}</p><span>Read more...</span>
                                            <ul class="tag-list">
                                                @foreach($article->tagList as $tag)
                                                <li class="tag-default tag-pill tag-outline"><span>{{ $tag }}</span></li>
                                                @endforeach
                                            </ul>
                                        </a>
                                    </div>
                                    @endforeach
                                    <nav>
                                        <ul class="pagination">
                                            @for($i=1; $i<=$pageCount; $i++) 
                                                @if($pageCurrent == $i)
                                                    <li data-test="page-link-1" class="page-item active"><a href="#" class="page-link">{{$i}}</a></li>
                                                @else
                                                    <li data-test="page-link-1" class="page-item"><a href="?page={{$i}}" class="page-link">{{$i}}</a></li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container"><a href="#/" class="logo-font router-link-exact-active router-link-active">
                    Oorth-Test
                </a><span class="attribution">
                    Test for PHP developer position
                </span></div>
        </footer>
    </div>
    </body>

</html>