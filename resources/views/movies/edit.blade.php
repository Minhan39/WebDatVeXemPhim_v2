<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Movie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('movies.update', $movie->id) }}" method="POST" class="max-w-sm mx-auto" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                            <input type="text" name="name" id="name" value="{{$movie->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        
                        <!-- <div class="mb-5">
                            <label for="movie_genre_ids" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genres:</label>
                            <input type="text" name="movie_genre_ids" id="movie_genre_ids" value="{{$movie->movie_genre_ids}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div> -->

                        <div class="mb-5">
                            <label for="movie_genre_ids" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genres:</label>
                            <select name="movie_genre_ids[]" id="movie_genre_ids" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <!-- Add options for countries here -->
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" {{str_contains($movie->movie_genre_ids, $genre->id) ? "selected" : ""}} >{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="movie_rating_system_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating Systems:</label>
                            <select name="movie_rating_system_id" id="movie_rating_system_id" value="{{$movie->movie_rating_system_id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <!-- Add options for countries here -->
                                @foreach ($ratingSystems as $ratingSystem)
                                    <option {{$ratingSystem->id == $movie->movie_rating_system_id ? "selected" : ""}} value="{{ $ratingSystem->id }}">{{ $ratingSystem->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
                            <textarea type="text" name="description" id="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" rows="6">{{$movie->description}}</textarea>
                        </div>

                        <div class="mb-5">
                            <label for="studioes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Studioes:</label>
                            <input type="text" name="studioes" id="studioes" value="{{$movie->studioes}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-5">
                            <label for="directors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Directors:</label>
                            <input type="text" name="directors" id="directors" value="{{$movie->directors}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-5">
                            <label for="actors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Actors:</label>
                            <input type="text" name="actors" id="actors" value="{{$movie->actors}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        
                        <div class="mb-5">
                            <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration:</label>
                            <input type="text" name="duration" id="duration" value="{{$movie->duration}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-5">
                            <label for="primary_color_background" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primary color background:</label>
                            <input type="text" name="primary_color_background" value="{{$movie->primary_color_background}}" id="primary_color_background" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-5">
                            <label for="primary_color_text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primary color text:</label>
                            <input type="text" name="primary_color_text" value="{{$movie->primary_color_text}}" id="primary_color_text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <!-- <div class="mb-5">
                            <label for="trailer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trailer:</label>
                            <input type="text" name="trailer" id="trailer" value="{{$movie->trailer}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div> -->

                        <div class="mb-5">
                            <label for="poster" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poster:</label>
                            <input type="file" name="poster" id="poster" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>

                        <div class="mb-5">
                            <label for="trailer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trailer:</label>
                            <input type="file" name="trailer" id="trailer" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
