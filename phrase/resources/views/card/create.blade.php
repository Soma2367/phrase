<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Card
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="text-gray-600 body-font relative">
                <div class="container px-5 py-24 mx-auto bg-white border border-blue-300 rounded-lg shadow-md">
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-full">
                                <form action="{{ route('card.store', ['folder_id' => $folder->id]) }}" method="post">
                                    @csrf
                                    <div class="text-center pb-10">
                                        <h3 class="text-lg font-semibold pb-3">Front</h3>
                                        <textarea name="front_text" id="front_text" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                    </div>

                                    <div class="text-center font-semibold pb-20">
                                        <h3 class="text-lg pb-3">Back</h3>
                                        <textarea name="back_text" id="back_text" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-cyan-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                    </div>

                                    <div class="p-2 w-full">
                                        <button type="submit" class="flex mx-auto text-white bg-cyan-500 border-0 py-2 px-8 focus:outline-none hover:bg-cyan-700 rounded text-lg shadow-md transition-colors duration-200 ease-in-out">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
