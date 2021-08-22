@foreach($tags as $tag)
    <p>{{ $tag->name }}</p>

    @foreach($tag->posts as $post)
        <p>{{ $post->title }}</p>
    @endforeach
@endforeach