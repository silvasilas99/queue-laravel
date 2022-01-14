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
                <div class="container mx-auto px-4 sm:px-8 max-w-5xl">
                    @if(session('success'))
                        <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-1 shadow-md mb-10" role="alert">
                            <div class="flex">
                            <div class="py-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg></div>
                            <div>
                                <p class="font-bold">Good job</p>
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                            </div>
                        </div>
                    @endif
                    
                    <a href="{{ url('create') }}">
                        <button class="bg-purple-800 hover:bg-purple-600 text-white font-bold py-2 px-4 border-b-4 border-purple-900 hover:border-purple-800 rounded">
                            Create
                        </button>
                    </a>
                    <a href="{{ url('get_csv') }}">
                        <button class="bg-indigo-600 hover:bg-indigo-400 text-white font-bold py-2 px-4 border-b-4 border-indigo-700 hover:border-indigo-600 rounded">
                            Export CSV
                        </button>
                    </a>
            
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="main-images mb-8 ">
                            <div class="images grid grid-cols-1 md:grid-cols-3 gap-8">
                                @if (count($games) >= 0)
                                    @foreach ($games as $game)
                                        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                                            <img class="w-full" src="{{ asset($game->image) }}">
                                            <div class="px-3 py-2">
                                                <div class="font-bold text-xl mb-2">
                                                    {{ $game->name }} 
                                                </div>
                                                <p class="text-gray-700 text-base mb-3">
                                                    {{ $game->description }}
                                                </p>
                                                <p class="text-gray-700 text-base">
                                                    <span class="font-bold">Developer: </span>{{ $game->developer }}
                                                </p>
                                                <p class="text-gray-700 text-base">
                                                    <span class="font-bold">Protagonist: </span>{{ $game->protagonist }}
                                                </p>
                                                <p class="text-gray-700 text-base">
                                                    <span class="font-bold">Set In: </span>{{ $game->set_in }}
                                                </p>
                                                <p class="text-gray-700 text-base mb-4">
                                                    <span class="font-bold">Location: </span>{{ $game->location }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h1>
                                        I don't have any records!
                                    </h1>
                                @endif
                            </div>
                        </div>
                    </div>
            
                    <div class="px-5 py-5 border-t flex flex-col xs:flex-row items-center xs:justify-between">
                        {{ $games->links() }}
                    </div> 
                </div>
            </div>
        </div>
    </body>
</html>