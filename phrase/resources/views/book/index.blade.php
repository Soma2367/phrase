<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ブックマークしたカード
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <div class="container">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6" id="cardList">
                        @foreach($bookmarkedCards as $card)
                            <div class="flip-card w-full h-40 m-2" onclick="flipCard(this)" data-card-id="{{ $card->id }}">
                                <div class="flip-card-inner w-full h-full relative">
                                    <div class="flip-card-front bg-white border border-gray-300 rounded p-4 flex justify-center items-center relative">
                                        {{ $card->front_text }}
                                        <div class="absolute top-2 right-3">
                                            <div class="size-6 cursor-pointer" onclick="toggleBookmark({{ $card->id }}, event)">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="bookmark-icon stroke-cyan-700">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="absolute bottom-2 left-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 sound-icon" style="cursor: pointer;" data-text="{{ $card->front_text }}">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.114 5.636a9 9 0 0 1 0 12.728M16.463 8.288a5.25 5.25 0 0 1 0 7.424M6.75 8.25l4.72-4.72a.75.75 0 0 1 1.28.53v15.88a.75.75 0 0 1-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.009 9.009 0 0 1 2.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flip-card-back bg-white border border-gray-300 rounded p-4 flex justify-between items-center relative">
                                        <div class="flex-grow flex justify-center items-center">
                                            {{ $card->back_text }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function flipCard(card) {
           card.classList.toggle('flipped');
        }
        
        <!-- 修正: toggleBookmark 関数を更新 -->
        function toggleBookmark(cardId, event) {
            event.stopPropagation(); // イベントの伝播を停止

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
                if (data.bookmarked === false) {
                    let cardElement = event.target.closest('.flip-card');
                    if (cardElement) {
                        cardElement.remove();
                    }
                }
            })
            .catch(error => {
                console.error('ブックマークを解除する際にエラーが発生しました:', error);
            });
        }

        const soundIcons = document.querySelectorAll('.sound-icon');
        soundIcons.forEach(icon => {
        icon.addEventListener('click', function(e) {
            e.stopPropagation();

            const textToSpeak = icon.dataset.text;
            if ('speechSynthesis' in window) {
                const utterance = new SpeechSynthesisUtterance(textToSpeak);
                utterance.lang = 'en-US'; // 言語を設定（例：英語）
                speechSynthesis.speak(utterance);
            } else {
                console.error('Web Speech API is not supported in this browser.');
            }
        });
    });
    </script>
</x-app-layout>