@extends('layouts.wrapper')

@section('title', 'Book Review')

@section('content')

<form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="px-4 form-group justify-center">
    <input type="text" class="px-4 form-input mt-1 block mr-8 w-full"name="title" id="title" placeholder="Title" value="{{ old('title') }}">
    <p class="text-red-500 text-xs italic">{{ $errors->first('title') }}</p>
    </div>

    <div class="px-4 mt-8 form-group justify-center">
        <input id="x" type="hidden" name="content" value="" />
        <trix-editor input="x"></trix-editor>
        <p class="text-red-500 text-xs italic">{{ $errors->first('content') }}</p>
    </div>

    {{-- <div class="px-4 mt-8 form-group">
        <textarea class="px-4 form-textarea block w-full" name="body" id="body" value="{{ old('body') }}"></textarea>
        <p class="text-red-500 text-xs italic">{{ $errors->first('body') }}</p>
    </div> --}}


    {{-- <div class="px-4 mt-8 form-group">
        <trix-editor input="body" name="body" value="{{ old('body') }}"></trix-editor>
    </div> --}}

    <div class="text-center">
        <input class="px-4 text-xl border mt-8 p-8 font-semibold text-xl" type="submit" name="send" value="Submit"> 
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
  
        xhr.addEventListener("load", function(event) {
            var attributes = {
                url: xhr.responseText,
                href: xhr.responseText + "?content-disposition=attachment"
            }
            successCallback(attributes)
        })
        xhr.send(formData)
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