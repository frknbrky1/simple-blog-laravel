@if(count($articles) > 0)
    <!-- Post preview-->
    @foreach($articles as $article)
        <div class="post-preview">
            <a href="{{route('single', [$article->getCategory->slug, $article->slug])}}">
                <h2 class="post-title">{{$article->title}}</h2>
                <img src="{{$article->image}}">
                <h3 class="post-subtitle">{!!\Illuminate\Support\Str::limit($article->content,75)!!}</h3>
            </a>
            <p class="post-meta"> Kategori :
                <a href="{{route('category', $article->getCategory->slug)}}">{{$article->getCategory->name}}</a>
                <span class="float-end">{{$article->created_at->diffForHumans()}}</span>
            </p>
        </div>
        @if(!$loop->last)
            <!-- Divider-->
            <hr class="my-4"/>
        @endif
    @endforeach
    <div class="pagination justify-content-center">
        {{$articles->links()}}
    </div>
@else
    <div class="alert alert-primary">
        Bu Kategoriye ait yazı bulunamadı.
    </div>
@endif
