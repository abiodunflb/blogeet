<x-app-layout>
<div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="title" class="block text-sm font-medium text-gray-700">
                                            Title*
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">

                                            <input type="text" id="title" name="title"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300"
                                                placeholder="Post Title">
                                        </div>
                                        @error('title') <span class="text-red-400">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="title" class="block text-sm font-medium text-gray-700">
                                            Image*
                                        </label>
                                        <div class="mt-1  rounded-md shadow-sm">

                                                {{-- @if($newImage)
                                                <span class="px-8">Photo:</span>
                                                <img src="{{asset('storage/images')}}/{{$this->newImage}}" alt="Blog Image">
                                                @endif --}}

                                                {{-- @if ($image)
                                                    New Photo:
                                                    <img src="{{ $image->temporaryUrl() }}" alt="Blog Image">
                                                @endif --}}


                                                upload Image
                                                <input type="file" id="image" name="image"
                                                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300 mt-4">
                                        </div>
                                        @error('image') <span class="text-red-400">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="category" class="block text-sm font-medium text-gray-700">
                                            Category*
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">

                                                <select name="category" id="category" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                                                    <option value="">Pick Category</option>
                                                    <option value="EPL">EPL</option>
                                                    <option value="La Liga">La Liga</option>
                                                    <option value="Serie A">Serie A</option>
                                                    <option value="Bundesliga">Bundesliga</option>
                                                    <option value="Ligue 1">Ligue 1</option>
                                                </select>
                                        </div>
                                        @error('category') <span class="text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="company_website" class="block text-sm font-medium text-gray-700">
                                            Body
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                                <textarea name="body" id="body" cols="80" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" cols="30" rows="10"></textarea>
                                        </div>


                                        @error('body') <span class="text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <x-jet-button>Create</x-jet-button>
                            </div>
                        </div>
                    </form>
                </div>
</x-app-layout>
