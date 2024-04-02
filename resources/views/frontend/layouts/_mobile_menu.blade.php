<nav class="mobile-nav">
    <ul class="mobile-menu">
        <li class="active">
            <a href="{{route('home')}}">Home</a>
        </li>
        @php
            $categories = \App\Models\Category::getCategoriesForFront();
        @endphp
        @foreach ($categories as $category)    
        @if(!empty($category->subCategoriesForFront->count()))
        <li>
            <a href="{{route('home.category', $category->slug)}}">{{$category->name}}</a>
            <ul>
                @foreach ($category->subCategoriesForFront as $sub)
                    <li><a href="{{route('home.category', ['category' => $category->slug, 'subcategory' => $sub->slug])}}">{{$sub->name}}</a></li>
                @endforeach
            </ul>
        </li>
        @endif
        @endforeach
       
    </ul>
</nav><!-- End .mobile-nav -->