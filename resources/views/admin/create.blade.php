<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    </head>

    <body class="antialiased font-sans bg-gray-200">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="py-8">
                <div class="container mx-auto px-4 sm:px-8 max-w-3xl">
                    <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                            <div class="md:flex">
                                <div class="w-full px-4 py-6 ">
                                    <div class="card-text">
                                        <h1 class="text-xl md:text-2xl font-bold leading-tight text-gray-500 mb-8">Creating a new game register</h1>
                                    </div>
                                    @error('name')
                                        <span class="text-red-700 font-bold"> {{ $message }}</span>
                                    @enderror
                                    <div class="mb-1"> 
                                        <span class="text-sm">Name</span> 
                                        <input type="text" name="name" class="h-12 px-3 w-full border-gray-400 border-2 rounded focus:outline-none focus:border-gray-600"> 
                                    </div>
                                    <div class="mb-1"> 
                                        <span class="text-sm">Developer</span> 
                                        <input type="text" name="developer" class="h-12 px-3 w-full border-gray-400 border-2 rounded focus:outline-none focus:border-gray-600"> 
                                    </div>
                                    <div class="mb-1"> 
                                        <span class="text-sm">Protagonist</span> 
                                        <input type="text" name="protagonist" class="h-12 px-3 w-full border-gray-400 border-2 rounded focus:outline-none focus:border-gray-600"> 
                                    </div>
                                    <div class="mb-1"> 
                                        <span class="text-sm">Description</span> 
                                        <textarea name="description" cols="30" rows="10" class="h-20 px-3 w-full border-gray-400 border-2 rounded focus:outline-none focus:border-gray-600"></textarea> 
                                    </div>
                                    <div class="mb-1 flex justify-between"> 
                                        <div class="w-1/5">
                                            <span class="text-sm">Set In</span> 
                                            <input type="text" name="set_in" class="h-12 px-3 w-full border-gray-400 border-2 rounded focus:outline-none focus:border-gray-600">     
                                        </div>
                                        <div class="w-3/4">
                                            <span class="text-sm">Location</span> 
                                            <input type="text" name="location" class="w-10 h-12 px-3 w-full border-gray-400 border-2 rounded focus:outline-none focus:border-gray-600"> 
                                        </div>
                                    </div>
                                    <div class="mb-1"> 
                                        <span>Image</span>
                                        <div class="relative border-dotted rounded-lg border-dashed border-2 border-gray-700 bg-gray-100 flex justify-center items-center">
                                            <input name='image' class="block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transitionease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file">
                                        </div>
                                    </div>
                                    <div class="mt-3 text-right"> 
                                        <a href="{{ url('/') }}">Cancel</a> 
                                        <button class="ml-2 h-10 w-32 bg-gray-600 rounded text-white hover:bg-gray-700">Create</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>