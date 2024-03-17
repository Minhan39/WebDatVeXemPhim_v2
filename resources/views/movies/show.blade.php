<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Details of {{ $movie->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="">
                        <h4 class="text-lg font-bold">Movie Details</h4>
                        <div class="flex flex-row">
                            <div>
                                <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->name }}" class="w-48 h-auto">
                            </div>
                            <ul class="ml-2" style="width: 80%">
                                <li><h3 class="text-gray-900 dark:text-white uppercase"><strong>{{ $movie->name }}</strong></h3></li>
                                <li><strong>Genre:</strong>
                                    @foreach ($movie->genres as $genre)
                                        <button type="button" disabled class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-0 mb-1 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">{{$genre}}</button>
                                    @endforeach
                                </li>
                                <li><strong>Rating System:</strong> <button type="button" disabled class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-full text-sm px-5 py-2.5 text-center me-0 mb-1">{{$movie->rating_system_name}}</button></li>
                                <li><strong>Studioes:</strong> {{ $movie->studioes }}</li>
                                <li><strong>Directors:</strong> {{ $movie->directors }}</li>
                                <li><strong>Actors:</strong> {{ $movie->actors }}</li>
                                <li><strong>Duration:</strong> {{ $movie->duration }}</li>
                                <li class="text-wrap"><strong>Description:</strong> {{ $movie->description }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-6">
                        <h4 class="text-lg font-bold">Trailer</h4>
                        <video src="{{ asset('storage/' . $movie->trailer) }}" controls class="mt-2 w-full"></video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            console.log(@json($movie));
        });
    </script>
</x-app-layout>