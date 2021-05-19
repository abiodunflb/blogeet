<x-tailwind-layout>


        <div class="md:flex jusitfy-center px-10 bg-indigo-800 text-indigo-200 items-center h-screen w-screen">
<!--   https://images.unsplash.com/photo-1516247897763-0f4ad94c2668?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1299&q=80 -->

<!--   left -->
  <div class="md:w-1/2">
    <h2 class="text-2xl md:text-4xl lg:text-6xl  text-white mb-6">Welcome to Blogeet</h2>
    <p class="mb-6 text-red-400 italic">Just football</p>
    <p class="mb-6">Developed by Afolabi Abiodun</p>
    <div class="flex sm:flex-nowrap">
        <a href="{{route('login')}}" class="inline-block  md:text-sm py-2 md:px-1 text-white bg-blue-400 rounded mr-2">Admin Login</a>
    <a href="{{route('register')}}" class="inline-block   md:text-sm py-2 md:px-1 text-white bg-blue-400 rounded mr-2">Admin Register</a>

       <a href="{{route('page.index')}}" class="inline-block  md:text-sm py-2 sm:px-1 md:px-1  text-yello-700 bg-red-400 transition ease-in duration-150">All Posts</a>
    </div>


  </div>
  <div class="md:w-1/2 mt-20">
    <img src="{{asset('/images/darkguy.jpg')}}" alt="Saddest mice" class=" rounded shadow-xl w-full">
  </div>
</div>
</x-tailwind-layout>
