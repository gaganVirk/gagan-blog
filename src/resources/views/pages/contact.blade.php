@extends('layouts.wrapper')

@section('title', 'Contact Me')

@section('content')

<div class="flex flex-wrap justify-center">
<form class="w-full max-w-lg pt-5" action="{{ route('pages.sendingEmail') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="px-4 pr-8 mb-6 md:mb-0">
        <label class="block uppercase text-xs font-bold mb-2 font-semibold" for="grid-first-name">
          First Name
        </label>
        <input class="appearance-none block w-full bg-white-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Gagan" name="firstName" value="{{ old('firstName') }}">
        <p class="text-red-500 text-xs italic">{{ $errors->first('firstName') }}</p>
    </div>
   
    <div class="px-4 pr-8 mb-6 md:mb-0">
        <label class="block uppercase text-xs font-bold mb-2 font-semibold" for="grid-last-name">
          Last Name 
        </label>
        <input class="appearance-none block w-full bg-white-200  border rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Virk" name="lastName" value="{{ old('lastName') }}">
        <p class="text-red-500 text-xs italic">{{ $errors->first('lastName') }}</p>
    </div>
      <div class=" px-4">
        <label class="uppercase tracking-wide text-xs font-bold mb-2 font-semibold" for="grid-password">
          E-mail
        </label>
        <input class="appearance-none block w-full border border-gray-200 rounded py-3 px-4 mb-3" id="email" type="email" name="email" value="{{ old('email') }}">
        <p class="text-red-500 text-xs italic">{{ $errors->first('email') }}</p>

      </div>
      
      <div class="px-4 mt-8 form-group justify-center">
        <input id="x" type="hidden" name="content" value="" />
        <trix-editor input="x"></trix-editor>
        <p class="text-red-500 text-xs italic">{{ $errors->first('content') }}</p>
      </div>

      <div class="text-center">
      <button class="px-4 text-xl border mt-8 p-8 font-semibold text-xl" type="submit">
          Send
      </button>
      </div>
  </form>
</div>

<script src="{{ asset('js/trix.js') }}"></script>
<script>
    (function() {
        
    var HOST = "{{ route('pages.upload') }}"; //pass the route

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
