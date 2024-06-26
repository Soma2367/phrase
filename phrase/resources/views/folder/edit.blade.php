<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <a href="{{ route('folder.index') }}" class="flex items-center text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                フォルダ一覧へ戻る
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">フォルダ編集</h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('folder.update', $folder->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="folder_name" class="block text-sm font-medium text-gray-700">フォルダ名</label>
                            <input type="text" name="folder_name" id="folder_name" value="{{ old('folder_name', $folder->folder_name) }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-cyan-500">
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="px-4 py-2 bg-cyan-600 text-white rounded-md hover:bg-cyan-700 focus:outline-none focus:bg-cyan-700">
                                更新
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
