@extends('layouts.wrapper')

@section('title', 'Certifications')
@section('content')
    
    <div class="grid grid-cols-3 col-g gap-2 mb-8">
        @foreach($certs as $cert)
          <div>
            <img class="m-auto" src="{{ $cert->filepath }}" alt="Certs" height="400" width="250">
            </a>
          </div>
        @endforeach
    </div>
    <hr/>

  @can('admin')
  <div class="flex flex-wrap px-4 mt-8">
    <form action="{{route('certifications.upload-certs')}}" method="post" enctype="multipart/form-data">
      <p class="text-red-500 text-xs italic">{{ $errors->first('filepath') }}</p>
      <h3 class="font-serif text-xl text-center">Upload certificates</h3>
    @csrf
      <div class="">
      <input class="font-serif border border-gray-200 bg-gray-200 text-gray-700 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-gray-300 focus:outline-none focus:shadow-outline" type="file" name="file" id="chooseFile">
        @error('file')
        <p class="text-red-500 text-xs italic">{{ $errors->first('file') }}</p>
        @enderror
    </div>
      <div class="text-center">
      <input class="font-serif border border-teal-500 bg-teal-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-teal-600 focus:outline-none focus:shadow-outline" type="submit" name="send" value="Upload Certification"/>
      </div>
      </form>
  </div>
  @endcan

@endsection