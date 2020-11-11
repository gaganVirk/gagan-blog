@if(count($errors) > 0) 
    @foreach($errors->all() as $error)
    <div role="alert">
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
          <p class="text-red-500">{{ $error }}</p>
        </div>
      </div>
    @endforeach
@endif

@if(session('success')) 
<div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
    <p>{{session('success')}}</p>
  </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif