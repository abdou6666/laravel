<x-layout>
    <section class="px-6 py-8">
        <x-pannel class="max-w-sm mx-auto">
         <form method="POST" action="/admin/posts" class="mt-10" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="title"
                    >
                        title
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="title"
                           id="title"
                           required
                           value="{{old('title')}}"
                    >
                     @error('title')
                       <p class="text-red-500  text-xs">{{$message}}</p>
                      @enderror

                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="slug"
                    >
                        Slug
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="slug"
                           id="slug"
                           required
                            value="{{old('slug')}}"
                    >
                      @error('slug')
                               <p class="text-red-500  text-xs"> {{$message}}</p>

                     @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="excerpt">
                        Excerpt
                    </label>


                  <textarea name="excerpt" id="excerpt" cols="30" rows="10" required class="border border-gray-400 p-2 w-full"
                  >{{old('excerpt')}}</textarea>
                     @error('excerpt')
                        <p class="text-red-500  text-xs"> {{$message}}</p>

                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="thumbnail"
                    >
                        Thumbnail
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="file"
                           name="thumbnail"
                           id="thumbnail"
                           required
                           value="{{old('thumbnail')}}"
                    >
                     @error('thumbnail')
                       <p class="text-red-500  text-xs">{{$message}}</p>
                      @enderror

                </div>



                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="body"
                    >
                        Body
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                           type="body"
                           name="body"
                           id="body"
                           required



                    > {{old('body')}}</textarea>
                      @error('body')
                               <p class="text-red-500  text-xs"> {{$message}}</p>

                           @enderror
                </div>

                <select name="category_id" id="category_id">
                    @php
                    $categories = \App\Models\Category::all();

                     @endphp


                    @foreach ($categories as $cateogry)

                    <option value="{{$cateogry->id}}"
                        {{old('category_id') == $cateogry->id ? 'selected' : ''}}>

                        {{ucwords($cateogry->name)}}</option>

                    @endforeach
                </select>
                @error('category_id')
                  <p class="text-red-500  text-xs"> {{$message}}</p>
                @enderror
                <div class="mt-10">
                    <x-submit-button> Post </x-submit-button>
                </div>
            </form>
        </x-pannel>
    </section>
</x-layout>
