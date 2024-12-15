<ul>
    <li><span>Category</span></li>
    @forelse ($categories as $category)
        <li class="{{ active('category/'.$category->slug) }}"><a href="{{ route('category.list', $category->slug) }}">{{ $category->name }}</a></li>
    @empty
        <li>Empty</li>
    @endforelse
</ul>