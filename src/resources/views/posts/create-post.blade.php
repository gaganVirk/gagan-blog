<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>
    <h1>Create Post</h1>
    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
           
        <div class="form-group justify-center">
            <span class="text-gray-700">Title</span>
        <input type="text" class="form-input mt-1 block w-half"name="title" id="title" placeholder="Title" value="{{ old('title') }}">

        </div>
        <div class="form-group">
            <span class="text-gray-700">Textarea</span>
            <textarea class="form-textarea mt-1 block w-full" rows="3" name="body" id="body" {{ old('body') }}></textarea>
        </div>
        <input type="submit" name="send" value="Submit" class="btn btn-primary">      
    </form>

    <label class="block">
        <span class="text-gray-700">Input</span>
        <input type="email" class="form-input mt-1 block w-full" placeholder="john@example.com">
      </label>
        
</x-app-layout>