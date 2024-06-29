<x-app-layout>
    <x-slot name="header">
    <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('folder.index') }}" class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $folder_name }}
                </h2>
            </div>
            <div class="flex items-center">
            <form action="{{ route('card.search', ['folder_id' => $folder->id]) }}" method="GET" class="max-w-full mx-auto">
                <label for="default-search" class="sr-only">Search</label>
                <div class="relative flex items-center border border-gray-300 rounded-lg overflow-hidden bg-white dark:bg-gray-700">
                    <input type="search" id="default-search" name="query" value="{{ old('query') }}" class="block w-full py-3 px-4 sm:px-6 text-sm text-gray-900 border-0 focus:ring-blue-500 focus:border-blue-500 dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="キーワード" required>
                    <button type="submit" class="text-white bg-cyan-500 hover:bg-cyan-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 cyan-700">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11ZM2 9a7 7 0 1 1 12.452 4.391l3.328 3.329a.75.75 0 1 1-1.06 1.06l-3.329-3.328A7 7 0 0 1 2 9Z"/>
                        </svg>
                    </button>
                </div>
            </form>
            </div>

    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        @foreach($cards as $card)
            <div class="flip-card w-full h-40 m-2" onclick="flipCard(this)">
                <div class="flip-card-inner w-full h-full relative">
                    <div class="flip-card-front bg-white border border-gray-300 rounded p-4 flex justify-center items-center relative">
                        {{ $card->front_text }}
                        <div class="absolute top-2 right-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bookmark-icon size-6" data-card-id="{{ $card->id }}" style="cursor: pointer;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flip-card-back bg-white border border-gray-300 rounded p-4 flex justify-between items-center relative">
                        <div class="flex-grow flex justify-center items-center">
                            {{ $card->back_text }}
                        </div>
                        <div class="absolute bottom-4 right-4 flex space-x-2">
                            <a href="{{ route('card.edit', $card->id) }}" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-cyan-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                            <form action="{{ route('card.destroy', $card->id) }}" method="POST" class="text-gray-500 hover:text-gray-700">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-cyan-700">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <!-- plusボタン -->
        <div class="absolute bottom-7 right-7 p-4">
            <a href="{{ route('card.create', ['folder_id' => $folder->id]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 stroke-1 hover:stroke-2 stroke-cyan-700 transition-transform transform hover:scale-125">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        </div>
    </div>

    <script>
        function flipCard(card) {
           card.classList.toggle('flipped');
        }

    //    document.addEventListener('DOMContentLoaded', function(){
    //       const bookmarkIcons = document.querySelectorAll('.bookmark-icon');

    //       bookmarkIcons.forEach(icon => {
    //         let filled = false;

    //         icon.addEventListener('click', function(e) {
    //             e.stopPropagation();
    //             filled = !filled;
    //             if(filled) {
    //                 icon.querySelector('path').setAttribute('fill', 'currentColor');
    //             } else {
    //                 icon.querySelector('path').setAttribute('fill', 'none');
    //             }
    //         })
    //       })
    //    })

    //   document.addEventListener('DOMContentLoaded', function() {
    //     const bookIcons = document.querySelectorAll('.bookmark-icon');

    //     bookIcons.forEach(icon => {
    //         let filled = icon.querySelector('path').getAttribute('fill') === 'currentColor';

    //         icon.addEventListener('click', function(e) {
    //             e.stopPropagation();
    //             const cardId = icon.dataset.cardId;

    //             fetch('{{ route('book.bookmarks.toggle') }}', {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json',
    //                 'X-CSRF-TOKEN': '{{ csrf_token() }}'
    //             },
    //             body: JSON.stringify({ card_id: cardId })
    //         })
    //         .then(response => response.json())
    //         .then(data => {
    //             if (data.bookmarked) {
    //                 icon.querySelector('path').setAttribute('fill', 'currentColor');
    //             } else {
    //                 icon.querySelector('path').setAttribute('fill', 'none');
    //             }
    //         })
    //         .catch(error => console.error('Error:', error));
    //         });
    //     });
    //   });

    document.addEventListener('DOMContentLoaded', function() {
            const bookmarkIcons = document.querySelectorAll('.bookmark-icon');

            bookmarkIcons.forEach(icon => {
                const cardId = icon.dataset.cardId;

                fetch(`{{ route('book.bookmarks.check', ['card_id' => ':card_id']) }}`.replace(':card_id', cardId))
                    .then(response => response.json())
                    .then(data => {
                        if (data.bookmarked) {
                            icon.querySelector('path').setAttribute('fill', 'currentColor');
                        } else {
                            icon.querySelector('path').setAttribute('fill', 'none');
                        }
                    })
                    .catch(error => console.error('Error:', error));

                icon.addEventListener('click', function(e) {
                    e.stopPropagation();

                fetch('{{ route('book.bookmarks.toggle') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            card_id: cardId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.bookmarked) {
                            icon.querySelector('path').setAttribute('fill', 'currentColor');
                        } else {
                            icon.querySelector('path').setAttribute('fill', 'none');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>

</x-app-layout>
