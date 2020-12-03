@extends('layouts.wrapper')

@section('title', $book->title)

@section('content')

<form method="post" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="px-4 form-group justify-center">
    <input type="text" class="px-4 form-input mt-1 block mr-8 w-full"name="title" id="title" placeholder="Title" value="{!! old('title', $book->title) !!}">
    </div>

    <div class="px-4 mt-8 form-group justify-center">
        <input id="x" type="hidden" name="content" value="{!! old('content', $book->content) !!}" />
        <trix-editor input="x"></trix-editor>
    </div>

    <div class="text-center">
        <input class="h-10 px-5 m-2 text-pink-100 transition-colors duration-150 bg-pink-600 rounded-lg focus:shadow-outline hover:bg-pink-700" type="submit" name="send" value="Submit"> 
    </div>
</form>
<script src="{{ asset('js/trix.js') }}"></script>
<script>
    (function() {
        
    var HOST = "{{ route('books.upload-bookImage') }}"; //pass the route

    addEventListener("trix-attachment-add", function(event) {
        if (event.attachment.file) {
            uploadFileAttachment(event.attachment)
        }
    })
  
    function uploadFileAttachment(attachment) {
        uploadFile(attachment.file, setProgress, setAttributes)
  
        function setProgress(progress) {
            attachment.setUploadProgress(progress)
        }
  
        function setAttributes(attributes) {
            attachment.setAttributes(attributes)
        }
    }
  
    function uploadFile(file, progressCallback, successCallback) {
        var formData = createFormData(file);
        var xhr = new XMLHttpRequest();
         
        xhr.open("POST", HOST, true);
        xhr.setRequestHeader( 'X-CSRF-TOKEN', getMeta( 'csrf-token' ) );
  
        xhr.upload.addEventListener("progress", function(event) {
            var progress = event.loaded / event.total * 100
            progressCallback(progress)
        })
  
        // xhr.addEventListener("load", function(event) {
        //     var attributes = {
        //         url: xhr.responseText,
        //         href: xhr.responseText + "?content-disposition=attachment"
        //     }
        //     successCallback(attributes)
        // })
        // xhr.send(formData)
    }

    function createFormData(file) {
        var data = new FormData()
       data.append("Content-Type", file.type)
       data.append("file", file)
        return data
    }

    function getMeta(metaName) {
        const metas = document.getElementsByTagName('meta');
       
        for (let i = 0; i < metas.length; i++) {
          if (metas[i].getAttribute('name') === metaName) {
            return metas[i].getAttribute('content');
          }
        }
       
        return '';
      }
  
})();
     
</script>

@endsection
