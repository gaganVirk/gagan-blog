@extends('layouts.wrapper')

@section('title', 'Home')
@section('content')

<div class="flex flex-wrap">
    <div class="w-full md:w-3/4 p-4 rounded-full flex items-center justify-center">            
        <img class="rounded-full h-36 w-36" src="{{ 'storage/images/gagan.png' }}" alt="Gagan"/>

    </div>
    <div class="w-full md:w-1/4 p-4 flex items-center justify-center">
        He is the author of the multi-volume work The Art of Computer Programming. He contributed to the development of the 
        rigorous analysis of the computational complexity of algorithms and systematized formal mathematical techniques for it. 
        In the process he also popularized the asymptotic notation. In addition to fundamental contributions in several branches 
        of theoretical computer science, Knuth is the creator of the TeX computer typesetting system, the related METAFONT font 
        definition language and rendering system, and the Computer Modern family of typefaces.        
    </div>
</div>

<div class="flex flex-wrap mt-8">
    <div class="w-full md:w-3/4 bg-gray-500 p-4 text-gray-200">

        <h3 class="text-xl">Latest posts</h3>
        <div class="grid grid-rows-auto grid-flow-col">
        @foreach($posts as $post)
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
        @endforeach
        </div>
           

    </div>
    <div class="w-full md:w-1/4 bg-gray-400 p-4 text-center text-gray-700">
        <h3 class="text-xl">Recent Projects</h3>
        Edward Vladimirovich Frenkel is a Russian-American mathematician working in representation theory, algebraic geometry, 
        and mathematical physics. He is a professor of mathematics at University of California, Berkeley, member of the 
        American Academy of Arts and Sciences, and author of the bestselling book Love and Math.
    </div>
</div>
@endsection
   
