<div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-jet-banner />
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="w-full flex justify-between sm:px-6 lg:px-8 py-2">
          <div>
              <input wire:model="search" type="search" placeholder="Search by title" class="p-2 m-2 rounded">
          </div>



          <div class="m-2 p-2">
              <x-jet-button class="bg-blue-500 hover:bg-black-500" wire:click="showCreateModal">Create</x-jet-button>
          </div>

      </div>
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Title
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Category
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                image
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Like(s)
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Actions</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
              @forelse ($posts as $post)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                      {{$post->title}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                      {{$post->category}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">



                      <img src="{{asset('storage/images')}}/{{$post->image}}" alt="" width="200">
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                {{$post->like}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                <x-jet-button wire:click="showEditModal({{$post->id}})" class="bg-green-500 hover:bg-black-500">Edit</x-jet-button>
                <x-jet-button wire:click="deletePost({{$post->id}})" class="bg-red-500 hover:bg-black-500">Delete</x-jet-button>
              </td>

            </tr>
              @empty

              <tr>
                  <td class="px-6 py-4 whitespace-nowrap">No Results</td>
              </tr>

              @endforelse


            <!-- More people... -->
          </tbody>
        </table>
        <div class="p-5 m-5">
            {{$posts->links()}}
        </div>

      </div>
    </div>
  </div>
</div>

<x-jet-dialog-modal wire:model="showModal">
    <x-slot name="title">
        @if ($editMode)
            Edit
        @else

            Create
        @endif
    </x-slot>
    <x-slot name="content">
            <div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form>
                        <div class="shadow sm:rounded-md sm:overflow-hidden">
                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-3 sm:col-span-2">
                                        <label for="title" class="block text-sm font-medium text-gray-700">
                                            Title*
                                        </label>
                                        <div class="mt-1 flex rounded-md shadow-sm">

                                            <input type="text" id="title" wire:model="title"
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

                                                @if($newImage)
                                                <span class="px-8">Photo:</span>
                                                <img src="{{asset('storage/images')}}/{{$this->newImage}}" alt="Blog Image">
                                                @endif

                                                @if ($image)
                                                    New Photo:
                                                    <img src="{{ $image->temporaryUrl() }}" alt="Blog Image">
                                                @endif


                                                upload Image
                                                <input type="file" id="image" wire:model="image"
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

                                                <select name="category" id="category" wire:model="category" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300">
                                                    <option value="Uncategorized">Pick Category</option>
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
                                                <textarea name="body" id="body" wire:model="body" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" cols="30" rows="10"></textarea>
                                        </div>


                                        @error('body') <span class="text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </x-slot>
    <x-slot name="footer">

        @if($editMode)
            <x-jet-button wire:click="updatePost">Update</x-jet-button>
        @else
            <x-jet-button wire:click="createList">Create</x-jet-button>
        @endif

    </x-slot>
</x-jet-dialog-modal>

</div>

