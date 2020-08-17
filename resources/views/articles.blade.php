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
            <div class="container"><a href="#/" class="navbar-brand router-link-exact-active router-link-active">
                    Oorth-Test
                </a>
                <ul class="nav navbar-nav pull-xs-right">
                    <li class="nav-item"><a href="#/" class="nav-link router-link-exact-active active">
                            Home
                        </a></li>
                    <li class="nav-item"><a href="#/login" class="nav-link"><i class="ion-compose"></i>Sign in
                        </a></li>
                    <li class="nav-item"><a href="#/register" class="nav-link"><i class="ion-compose"></i>Sign up
                        </a></li>
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
                                            <li data-test="page-link-1" class="page-item active"><a href="" class="page-link">1</a></li>
                                            <li data-test="page-link-2" class="page-item"><a href="" class="page-link">2</a></li>
                                            <li data-test="page-link-3" class="page-item"><a href="" class="page-link">3</a></li>
                                            <li data-test="page-link-4" class="page-item"><a href="" class="page-link">4</a></li>
                                            <li data-test="page-link-5" class="page-item"><a href="" class="page-link">5</a></li>
                                            <li data-test="page-link-6" class="page-item"><a href="" class="page-link">6</a></li>
                                            <li data-test="page-link-7" class="page-item"><a href="" class="page-link">7</a></li>
                                            <li data-test="page-link-8" class="page-item"><a href="" class="page-link">8</a></li>
                                            <li data-test="page-link-9" class="page-item"><a href="" class="page-link">9</a></li>
                                            <li data-test="page-link-10" class="page-item"><a href="" class="page-link">10</a></li>
                                            <li data-test="page-link-11" class="page-item"><a href="" class="page-link">11</a></li>
                                            <li data-test="page-link-12" class="page-item"><a href="" class="page-link">12</a></li>
                                            <li data-test="page-link-13" class="page-item"><a href="" class="page-link">13</a></li>
                                            <li data-test="page-link-14" class="page-item"><a href="" class="page-link">14</a></li>
                                            <li data-test="page-link-15" class="page-item"><a href="" class="page-link">15</a></li>
                                            <li data-test="page-link-16" class="page-item"><a href="" class="page-link">16</a></li>
                                            <li data-test="page-link-17" class="page-item"><a href="" class="page-link">17</a></li>
                                            <li data-test="page-link-18" class="page-item"><a href="" class="page-link">18</a></li>
                                            <li data-test="page-link-19" class="page-item"><a href="" class="page-link">19</a></li>
                                            <li data-test="page-link-20" class="page-item"><a href="" class="page-link">20</a></li>
                                            <li data-test="page-link-21" class="page-item"><a href="" class="page-link">21</a></li>
                                            <li data-test="page-link-22" class="page-item"><a href="" class="page-link">22</a></li>
                                            <li data-test="page-link-23" class="page-item"><a href="" class="page-link">23</a></li>
                                            <li data-test="page-link-24" class="page-item"><a href="" class="page-link">24</a></li>
                                            <li data-test="page-link-25" class="page-item"><a href="" class="page-link">25</a></li>
                                            <li data-test="page-link-26" class="page-item"><a href="" class="page-link">26</a></li>
                                            <li data-test="page-link-27" class="page-item"><a href="" class="page-link">27</a></li>
                                            <li data-test="page-link-28" class="page-item"><a href="" class="page-link">28</a></li>
                                            <li data-test="page-link-29" class="page-item"><a href="" class="page-link">29</a></li>
                                            <li data-test="page-link-30" class="page-item"><a href="" class="page-link">30</a></li>
                                            <li data-test="page-link-31" class="page-item"><a href="" class="page-link">31</a></li>
                                            <li data-test="page-link-32" class="page-item"><a href="" class="page-link">32</a></li>
                                            <li data-test="page-link-33" class="page-item"><a href="" class="page-link">33</a></li>
                                            <li data-test="page-link-34" class="page-item"><a href="" class="page-link">34</a></li>
                                            <li data-test="page-link-35" class="page-item"><a href="" class="page-link">35</a></li>
                                            <li data-test="page-link-36" class="page-item"><a href="" class="page-link">36</a></li>
                                            <li data-test="page-link-37" class="page-item"><a href="" class="page-link">37</a></li>
                                            <li data-test="page-link-38" class="page-item"><a href="" class="page-link">38</a></li>
                                            <li data-test="page-link-39" class="page-item"><a href="" class="page-link">39</a></li>
                                            <li data-test="page-link-40" class="page-item"><a href="" class="page-link">40</a></li>
                                            <li data-test="page-link-41" class="page-item"><a href="" class="page-link">41</a></li>
                                            <li data-test="page-link-42" class="page-item"><a href="" class="page-link">42</a></li>
                                            <li data-test="page-link-43" class="page-item"><a href="" class="page-link">43</a></li>
                                            <li data-test="page-link-44" class="page-item"><a href="" class="page-link">44</a></li>
                                            <li data-test="page-link-45" class="page-item"><a href="" class="page-link">45</a></li>
                                            <li data-test="page-link-46" class="page-item"><a href="" class="page-link">46</a></li>
                                            <li data-test="page-link-47" class="page-item"><a href="" class="page-link">47</a></li>
                                            <li data-test="page-link-48" class="page-item"><a href="" class="page-link">48</a></li>
                                            <li data-test="page-link-49" class="page-item"><a href="" class="page-link">49</a></li>
                                            <li data-test="page-link-50" class="page-item"><a href="" class="page-link">50</a></li>
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