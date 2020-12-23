@extends('layouts.wrapper')

@section('title', $post->title)

@section('content')

<a href="{{ route('posts.index') }}" class="ml-2 bg-gray-600 text-gray-100 text-sm rounded hover:bg-gray-500 px-3 py-3 focus:outline-none">Go Back</a>
    <section class="hero container max-w-screen-lg mx-auto pb-10">
        @foreach($post->images as $image)
            <img class="mx-auto" src="{{ $image->path }}" alt="screenshot" width="200" height="300" >
        @endforeach
    </section>
<<<<<<< HEAD
    <div class="m-auto px-4"> {!! $post->body !!}</div>
=======
    <div class="px-4"> {!! $post->body !!}</div>
>>>>>>> 885f84c97bfc82c2e2702b15dcd4726e250ee866
    @role('admin')
    <div class="p-4 flex gap-2">
        <a href="{{ route('posts.edit', $post) }}" class="bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="bg-red-500 text-gray-200 rounded hover:bg-red-400 px-4 py-2 focus:outline-none" value="Delete">
        </form>
    </div>
    @endrole
    <div id="disqus_thread"></div>
    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://gaganvirk-net.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

@endsection

