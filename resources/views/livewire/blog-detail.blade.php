<main>
    <section class="page-header bg-tertiary">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center">
                    <h2 class="mb-3 text-capitalize">{{ $article->game->name}}</h2>
                    <ul class="list-inline breadcrumbs text-capitalize" style="font-weight:500">
                        <li class="list-inline-item"><a href="{{route('blog')}}">News</a></li>
                        <li class="list-inline-item">/ &nbsp; <a href="">{{$article->title}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<main class="d-flex justify-content-center text-center">
    <div class="section w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <div class="mb-5">
                        <h2 class="mb-4" style="line-height:1.5">{{ $article->title }}</h2>
                        <span>{{ \Carbon\Carbon::parse($article->created_at)->format('Y M d')}} <span class="mx-2"></span> </span>
                        <br>
                        <p class="list-inline-item ml-1">Author: {{ $article->author }}</p>
                    </div>

                    @if ($article->image != "")
                    <div class="mb-5 text-center">
                        <div class="post-slider rounded overflow-hidden">
                            <img loading="lazy" decoding="async" src="{{$article->image}}" alt="{{ $article->title }}" class="img-fluid">
                        </div>
                    </div>
                    @endif

                    <div class="content text-center">
                        {!! $article->content !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>




<!--
blog-detail
show-blog
showblog
-->

