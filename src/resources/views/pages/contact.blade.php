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
        <input class="appearance-none block w-full bg-white-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Gagan" name="firstName">
    </div>
    <div class="px-4 pr-8 mb-6 md:mb-0">
        <label class="block uppercase text-xs font-bold mb-2 font-semibold" for="grid-last-name">
          Last Name 
        </label>
        <input class="appearance-none block w-full bg-white-200  border rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Virk" name="lastName">
    </div>
      <div class=" px-4">
        <label class="uppercase tracking-wide text-xs font-bold mb-2 font-semibold" for="grid-password">
          E-mail
        </label>
        <input class="appearance-none block w-full border border-gray-200 rounded py-3 px-4 mb-3" id="email" type="email" name="email">
      </div>
      <div class="px-4">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 font-semibold" for="grid-password">
          Message
        </label>
        <textarea id="body" class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message" name="message"></textarea>
      </div>
        <div class="text-center">
        <button class="px-4 text-xl border mt-8 p-8 font-semibold text-xl" type="submit">
          Send
        </button>
        </div>
  </form>
</div>

<link href='https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/js/froala_editor.pkgd.min.js'></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/css/froala_editor.css">

<script>
new FroalaEditor('#body', {
    pluginsEnabled: ['image', 'link']
  });
</script>

@endsection
