@extends('layouts.wrapper')

@section('title', 'Certifications')
@section('content')
    
    <div class="px-4 flex flex-wrap bg-white-200">
        @foreach($certs as $cert)
          <div class="flex-1 bg-white-300">
            <embed src="{{ $cert->filepath }}#toolbar=1" alt="Certs" height="600" width="400"/>
          </div>
        @endforeach
    </div>
   
   <div class="">
   <hr/>
  <div class="flex flex-wrap px-4">
    <form action="{{route('certifications.upload-certs')}}" method="post" enctype="multipart/form-data">
      <p class="text-red-500 text-xs italic">{{ $errors->first('filepath') }}</p>
      <h3 class="text-xl text-center">Upload certificates</h3>
    @csrf
      <div class="bg-white-200">
      <input class="ml-7 border" type="file" name="file" id="chooseFile">
      </div>
      <div class="text-center mt-5 py-2 border">
      <input type="submit" name="send" value="Upload Certification"/>
      </div>
      </form>
  </div>
  </div>

@endsection