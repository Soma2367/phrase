<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('folder.index') }}" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$folder_name}}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach($cards as $card)
                <div class="flip-card w-full h-40 m-2">
                    <div class="flip-card-inner w-full h-full relative">
                        <div class="flip-card-front bg-white border border-gray-300 rounded p-4 flex justify-center items-center">
                            {{ $card->front_text }}
                        </div>
                        <div class="flip-card-back bg-white border border-gray-300 rounded p-4 flex justify-between items-center relative">
                            <div class="flex-grow flex justify-center items-center">
                                {{ $card->back_text }}
                            </div>
                            <div class="absolute bottom-4 right-4 flex space-x-2">
                                <a href="{{route('card.edit', $card->id)}}" class="text-gray-500 hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>
                                <form action="{{route('card.destroy', $card->id) }}" method="POST" class="text-gray-500 hover:text-gray-700">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </a>
        </div>
    </div>
</x-app-layout>

