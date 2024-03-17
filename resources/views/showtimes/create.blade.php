<x-app-layout>
    <style>
        .cover-film{
            height: 46rem !important;
            width: 64rem;
            /* background-color: #ccc; */
        }
        .save-movie{
            height: 12rem !important;
            width: 100% !important;
            background-color: rgb(249 250 251);
            border: 1px dashed #d2d6dc;
        }
        .image-movie:hover{
            cursor: grab !important;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Showtime') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-row">
            <div class="h-100 me-2 md:flex cover-film flex flex-col">
                <div class="flex flex-row">
                    <div class="mb-5 mr-2">
                        <label for="genres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre:</label>
                        <select id="genres" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <!-- Add options for countries here -->
                            <option value="0">*</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="rating_sytems" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating System:</label>
                        <select id="rating_sytems" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <!-- Add options for countries here -->
                            <option value="0">*</option>
                            @foreach ($rating_systems as $rating_system)
                                <option value="{{ $rating_system->id }}">{{ $rating_system->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap overflow-scroll" id="film">
                    <!-- foreach($movies as $movie)
                        <img draggable="true" class="image-movie me-2 mb-2 rounded-lg w-auto h-48" src="asset('storage/' . $movie->poster)"/>
                    endforeach -->
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-96">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('showtimes.store') }}" method="POST" class="max-w-sm mx-auto" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-5">
                            <label for="country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country:</label>
                            <select id="country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <!-- Add options for countries here -->
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }} ({{$country->symbol}})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="city_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City:</label>
                            <select id="city_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="cinema_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cinema:</label>
                            <select name="cinema_id" id="cinema_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="movie_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Movie:</label>
                            <input type="hidden" name="movie_id" id="movie_id" />
                            <div draggable="true" id="save-movie" class="save-movie rounded-lg flex justify-center items-center"><p class="text-gray-500">Drag & Drop</p></div>
                        </div>

                        <div class="mb-5">
                            <label for="screening_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Screening Date:</label>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="screening_date" name="screening_date" datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>
                        </div>

                        <div>
                            <label for="screening_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Screening Time:</label>
                            <input type="time" name="screening_time" id="screening_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            const countries = @json($countries);
            const cities = @json($cities);
            const cinemas = @json($cinemas);
            const movies = @json($movies);
            const genres = @json($genres);
            const rating_systems = @json($rating_systems);
            let div_movies = document.getElementById('film');
            let div_movie_selected = document.getElementById('save-movie');

            const drag_and_drop = () => {
                let lists = document.getElementsByClassName('image-movie');
                for (const list of lists) {
                    list.addEventListener('dragstart', function(e) {
                        let selected = e.target;
                        let guide = `<p class="text-gray-500">Drag & Drop</p>`;

                        div_movies.addEventListener('dragover', function(e) {
                            e.preventDefault();
                        });
                        div_movies.addEventListener('drop', function(e) {
                            div_movies.append(selected);
                            div_movie_selected.replaceChildren();
                            div_movie_selected.insertAdjacentHTML('beforeend', guide);
                            $('#movie_id').val(null);
                            // selected = null;
                        });

                        div_movie_selected.addEventListener('dragover', function(e) {
                            e.preventDefault();
                        });
                        div_movie_selected.addEventListener('drop', function(e) {
                            e.preventDefault();
                            div_movie_selected.replaceChildren();
                            div_movie_selected.append(selected);
                            console.log(selected.id.split('-')[1]);
                            $('#movie_id').val(selected.id.split('-')[1]);
                            // selected = null;
                        });
                    });
                }
            }

            const refresh_cities = (country_id) => {
                if(!city_id){
                    $('#cinema_id').find('option').remove();
                    return;
                }
                const cities_order_by_country = cities.filter(city => city.country_id == country_id);
                $('#city_id').find('option').remove();
                cities_order_by_country.forEach(city => {
                    $('#city_id').append(`<option value="${city.id}">${city.name}</option>`);
                });
                return cities_order_by_country.length > 0 ? cities_order_by_country[0].id : null;
            }

            const refresh_cinemas = (city_id) => {
                if(!city_id){
                    $('#cinema_id').find('option').remove();
                    return;
                }
                const cinemas_order_by_city = cinemas.filter(cinema => cinema.city_id == city_id);
                $('#cinema_id').find('option').remove();
                cinemas_order_by_city.forEach(cinema => {
                    $('#cinema_id').append(`<option value="${cinema.id}">${cinema.name}</option>`);
                });
            }

            const refresh_movies_by_genres = (genre_id, rating_system_id) => {
                let movies_order_by_genre_and_rating = movies;
                if(genre_id != 0){
                    movies_order_by_genre_and_rating = movies_order_by_genre_and_rating.filter(movie => movie.movie_genre_ids.includes(genre_id));
                }
                if(rating_system_id != 0){
                    movies_order_by_genre_and_rating = movies_order_by_genre_and_rating.filter(movie => movie.movie_rating_system_id == rating_system_id);
                }
                // console.log(genre_id, rating_system_id, movies_order_by_genre_and_rating);
                div_movies.replaceChildren();
                for (let movie of movies_order_by_genre_and_rating) {
                    div_movies.insertAdjacentHTML('beforeend', `<img id="img-` + movie.id + `" draggable="true" class="image-movie me-2 mb-2 rounded-lg w-auto h-48" src="{{asset('storage/` + movie.poster + `')}}" />`);
                }

                drag_and_drop();
            }

            $('#genres').on('change', function(e){
                let genre_id = this.value;
                let rating_system_id = $('#rating_sytems').val();
                refresh_movies_by_genres(genre_id, rating_system_id);
            });

            $('#rating_sytems').on('change', function(e){
                let rating_system_id = this.value;
                let genre_id = $('#genres').val();
                refresh_movies_by_genres(genre_id, rating_system_id);
            });

            $('#country_id').on('change', function(e){
                // let optionSelected = $("option:selected", this);
                let valueSelected = this.value;

                const city_selected_id = refresh_cities(valueSelected);
                refresh_cinemas(city_selected_id);
            });

            $('#city_id').on('change', function(e){
                let valueSelected = this.value;
                refresh_cinemas(valueSelected);
            });

            $('#genres').trigger('change');
            $('#rating_sytems').trigger('change');
            $('#country_id').trigger('change');
            $('#city_id').trigger('change');

            drag_and_drop();
        });
    </script>
</x-app-layout>
