      @auth
                        <x-pannel>
                        <form method="post" action="/posts/{{$post->slug}}/comments">
                            @csrf
                            <header class="flex items-center">
                                <img src="https://i.pravatar.cc/60?u{{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">
                                <h2 class="ml-3">Want to participate?</h2>
                            </header>
                            <div class="mt-6">
                                <textarea name="body" id="" rows="5" class="w-full text-sm focus:outline-none focus:ring" placeholder="Quick think of something!" required></textarea>
                                @error('body')
                                <span class="text-xs text-red-500">{{$message}}</span>
                                    
                                @enderror
                            </div>
                            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                               <x-submit-button> Post </x-submit-button>
                            </div>
                        </form>
                    </x-pannel>
                    @else   
                       <p class="font-semibold">
                           <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Login to leave a comment.</a>
                       </p>
                    @endauth