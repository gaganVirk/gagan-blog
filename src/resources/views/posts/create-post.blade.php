<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>
    <h1 class="text-center font-semibold text-xl">Create Post</h1>
    <form method="post" action="{{ route('categories.storeCategory') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" class="form-input" name="categoryName" id="categoryName" placeholder="Create New Category" value="{{ old('categoryName') }}">
            <input class="border text-xl rounded" type="submit" name="send" value="Save"/>
        </div>
    </form>

    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-1">
            <span class="text-gray-700 mr-8 mt-1 w-full">Please choose category for the post:   </span>
    
            <select class="border m-8" name="category" id="category">
                    <option value="select">Select Category</option>
                    <option name="category" id="category">Docker</option>
            </select>
        </div>

        <div class="form-group justify-center">
            <span class="text-gray-700">Title</span>
        <input type="text" class="form-input mt-1 block mr-8 w-full"name="title" id="title" placeholder="Title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <span class="text-gray-700">Title</span>
            <textarea class="form-textarea block w-full" rows="30" name="body" id="body" {{ old('body') }}></textarea>
        </div>

        <div class="text-center">
            <input class="border font-semibold text-xl" type="submit" name="send" value="Submit"> 
        </div>
        
    </form>
    <script src="{{ asset('js/ckeditor/build/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
                .create( document.querySelector( '#body' ), {
                    toolbar: [ 'bold', 'italic', 'link', 'imageUpload' ],
                    simpleUpload: {
                        // The URL that the images are uploaded to.
                        uploadUrl: '{{ route('posts.upload-image') }}',

                        // Enable the XMLHttpRequest.withCredentials property.
                        withCredentials: true,

                        // Headers sent along with the XMLHttpRequest to the upload server.
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }
                } )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
   
</x-app-layout>