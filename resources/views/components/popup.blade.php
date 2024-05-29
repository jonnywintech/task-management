@props(['popup'])

@if ($popup)
<div class="relative"></div>
    <div {{ $attributes->merge(['class' => 'absolute top-28 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 font-medium  text-sm text-white popup w-64 z-50 p-2']) }}>
        {{ $popup }}
        <button onclick="this.parentElement.remove()" class="absolute right-0 top-0 bottom-0 text-red-500 me-1">&#10006;</button>
        <script>
            setTimeout(() => {
                document.querySelector('.popup').remove()
            }, 3000)
        </script>
    </div>
@endif
