<x-app-layout class="relative">
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Folder</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($folders as $folder)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg cursor-pointer" onclick="window.location='{{ route('folder.show', ['id' => $folder->id]) }}'">
                    <div class="p-5 text-gray-900 flex justify-center items-center"> <!-- ここを修正 -->
                        <div class="text-lg font-semibold">{{ $folder->folder_name }}</div>
                    </div>
                </div>
            @endforeach
        </div>
            <div class="absolute bottom-7 right-7 p-4">
                <a href="{{ route('folder.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

