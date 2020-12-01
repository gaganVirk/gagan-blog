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
      <h3 class="font-serif text-xl text-center">Upload certificates</h3>
    @csrf
      <div class="">
      <input class="font-serif border border-gray-200 bg-gray-200 text-gray-700 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-300 focus:outline-none focus:shadow-outline" type="file" name="file" id="chooseFile">
      </div>
      <div class="text-center">
      <input class="font-serif border border-teal-500 bg-teal-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-teal-600 focus:outline-none focus:shadow-outline" type="submit" name="send" value="Upload Certification"/>
      </div>
      </form>
  </div>
  </div>

@endsection