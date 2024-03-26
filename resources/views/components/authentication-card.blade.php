
<div {{ $attributes->merge(['class'=>'min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 px-1']) }} >
  <div {{ $attributes->merge(['class'=>'w-full sm:max-w-md mt-6 px-2 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg']) }} >
      {{ $slot }}
  </div>
</div>
