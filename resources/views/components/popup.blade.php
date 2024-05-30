@props(['popup'])

@if ($popup)
<div class="relative"></div>
    <div {{ $attributes->merge(['class' => 'absolute top-28 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 font-medium  text-sm text-white popup w-64 z-50 p-2']) }}>
        {{ $popup }}
        <button onclick="this.parentElement.remove()" class="absolute right-0 top-0 bottom-0 me-1 hover:scale-105 transition-all "><span class=" text-red-500 font-extrabold text-3xl hover:text-red-600">&times;</span></button>
        <script>
            setTimeout(() => {
                document.querySelector('.popup')?.remove()
            }, 3000)
        </script>
    </div>
@endif
