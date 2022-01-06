@isset($categories)
    <div class="col-md-3">
        <div class="card" style="border-radius: 5px">
            <div class="card-header">
                Kategoriler
            </div>
            <div class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item @if(Request::segment(2)==$category->slug) active @endif">
                        <a @if(Request::segment(2)!=$category->slug) href="{{route('category', $category->slug)}}" @endif>{{ $category->name }}</a>
                        @if($category->articleCount() > 0)
                            <span class="badge bg-success float-end" style="border-radius: 50px">{{$category->articleCount()}}</span>
                        @else
                            <span class="badge bg-danger float-end" style="border-radius: 50px">{{$category->articleCount()}}</span>
                        @endif
                    </li>
                @endforeach
            </div>
        </div>
    </div>
@endif
