<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規フォルダ名
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font relative">
                        <form method="post" action="{{ route('folder.store') }}">
                            @csrf
                            <div class="container px-5 py-20 mx-auto">
                                <div class="flex flex-col text-center w-full mb-12">
                                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">新規フォルダ作成</h1>
                                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">フォルダ名を入力してください</p>
                                </div>
                                <div class="flex flex-wrap -m-2 justify-center">
                                    <div class="p-2">
                                        <label for="name" class="leading-7 text-sm text-gray-600">フォルダ名</label>
                                        <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        @error('name')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="p-2 w-full mt-8 text-center">
                                    <button class="flex mx-auto text-white bg-cyan-500 border-0 py-3 px-10 focus:outline-none hover:bg-indigo-600 rounded-lg text-xl transition-colors duration-200 ease-in-out">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
