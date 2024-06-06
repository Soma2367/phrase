<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Phrase
        </h2>
    </x-slot>
        <section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">User Name</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Edit</p>
        </div>
        
          <form action="{{ route('phrase_user.update', ['id' => $user->id]) }}" method="POST">
            <div>
                <div class="flex justify-center">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col items-center space-y-3">
                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                        <input type="text" id="user_name" name="user_name" class="w-96 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                
                <div class="p-2 w-full mt-10">
                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                </div>
            </div>
          </form>
        </div>
    </div>
    </section>
    </div>
</x-app-layout>