<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <form class="w-full max-w-lg pt-5">
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-7/10 md:w-1/4 px-4 pr-8 mb-6 md:mb-0">
            <label class="block uppercase text-xs font-bold mb-2 font-semibold" for="grid-first-name">
              First Name
            </label>
            <input class="appearance-none block w-full bg-white-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Gagan">
            <p class="text-red-500 text-xs italic">Please fill out this field.</p>
          </div>
          <div class="w-5/10 md:w-1/4 px-3">
            <label class="block uppercase text-xs font-bold mb-2 font-semibold" for="grid-last-name">
              Last Name 
            </label>
            <input class="appearance-none block w-full bg-white-200  border rounded py-3 px-4 focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Virk">
          </div>
        </div>
        <div class="flex flex-wrap pr-4">
          <div class="w-3/4 px-4">
            <label class="block uppercase tracking-wide text-xs font-bold mb-2 font-semibold" for="grid-password">
              E-mail
            </label>
            <input class="appearance-none block w-full border border-gray-200 rounded py-3 px-4 mb-3" id="email" type="email">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6 rows-5">
          <div class="w-3/4 px-4">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 font-semibold" for="grid-password">
              Message
            </label>
            <textarea id="body" class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message"></textarea>
          </div>
        </div>
        <div class="md:flex md:items-center">
          <div class="md:w-1/3">
            <button class="text-xl border m-8 p-8 font-semibold text-xl" type="button">
              Send
            </button>
          </div>
          <div class="md:w-2/3"></div>
        </div>
      </form>

<link href='https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/js/froala_editor.pkgd.min.js'></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/froala-editor@3.2.0/css/froala_editor.css">

<script>
new FroalaEditor('#body', {
    pluginsEnabled: ['image', 'link']
  });
</script>
</x-app-layout>