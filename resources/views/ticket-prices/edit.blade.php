<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Ticket Price') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('ticket-prices.update', $ticketPrice->id) }}" method="POST" class="max-w-sm mx-auto">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label for="country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country:</label>
                            <select id="country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <!-- Add options for cities here -->
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{$city->country_id == $country->id ? 'selected' : ''}}>{{ $country->name }} ({{$country->symbol}})</option>
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
                            <select id="cinema_id" name="cinema_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </select>
                        </div>

                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                            <input id="is_active" name="is_active" type="checkbox" value="1" {{$ticketPrice->is_active ? 'checked="checked"' : ''}} class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" />
                            </div>
                            <label for="is_active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active this price to customer</label>
                        </div>

                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                            <input id="is_always_available" name="is_always_available" type="checkbox" value="1" {{$ticketPrice->is_always_available ? 'checked="checked"' : ''}} class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" />
                            </div>
                            <label for="is_always_available" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">This is the ticket price always</label>
                        </div>

                        <div class="mb-5" id="root">
                            <label for="root_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket Price Always:</label>
                            <select id="root_id" name="root_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
                            <input type="text" value="{{$ticketPrice->name}}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>

                        <div class="mb-5">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price:</label>
                            <input type="text" value="{{$ticketPrice->price}}" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>

                        <div class="mb-5">
                            <label for="unit_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit:</label>
                            <select name="unit_id" id="unit_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" require>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            const ticket_price = @json($ticketPrice);
            const city_selected = @json($city);
            const units = @json($units);
            const cities = @json($cities);
            const cinemas = @json($cinemas);
            const roots = @json($ticketPricesAlways);

            const refresh_units = (country_id) => {
                const units_order_by_country = units.filter(unit => unit.country_id == country_id);
                $('#unit_id').find('option').remove();
                units_order_by_country.forEach(unit => {
                    $('#unit_id').append(`<option value="${unit.id}" ${unit.id == ticket_price.unit_id ? 'selected' : ''}>${unit.name} (${unit.symbol})</option>`);
                });
            }

            const refresh_cities = (country_id) => {
                if(country_id == null){
                    $('#city_id').find('option').remove();
                    return [false, null];
                }
                let has_selected = false;
                const cities_order_by_country = cities.filter(city => city.country_id == country_id);
                $('#city_id').find('option').remove();
                cities_order_by_country.forEach(city => {
                    $('#city_id').append(`<option value="${city.id}" ${city.id == city_selected.id ? 'selected' : ''}>${city.name}</option>`);
                    if (city.id == city_selected.id) {
                        has_selected = true;
                    }
                });
                if(cities_order_by_country.length == 0){
                    return [has_selected, null];
                }
                return [has_selected, cities_order_by_country[0].id];
            }

            const refresh_cinemas = (city_id) => {
                if(city_id == null){
                    $('#cinema_id').find('option').remove();
                    return [false, null];
                }
                let has_selected = false;
                const cinemas_order_by_city = cinemas.filter(cinema => cinema.city_id == city_id);
                $('#cinema_id').find('option').remove();
                cinemas_order_by_city.forEach(cinema => {
                    $('#cinema_id').append(`<option value="${cinema.id}" ${cinema.id == ticket_price.cinema_id ? 'selected' : ''}>${cinema.name}</option>`);
                    if (cinema.id == ticket_price.cinema_id) {
                        has_selected = true;
                    }
                });
                if(cinemas_order_by_city.length == 0){
                    return [has_selected, null];
                }
                return [has_selected, cinemas_order_by_city[0].id];
            }

            const refresh_root = (cinema_id) => {
                // console.log('c_id: ', cinema_id);
                if(cinema_id == null){
                    $('#root_id').find('option').remove();
                    return;
                }
                const root_order_by_cinema = roots.filter(ticketPrice => ticketPrice.cinema_id == cinema_id);
                $('#root_id').find('option').remove();
                root_order_by_cinema.forEach(ticketPrice => {
                    $('#root_id').append(`<option value="${ticketPrice.id}" ${ticketPrice.id == ticket_price.root_id ? 'selected' : ''}>${ticketPrice.name}</option>`);
                });
            }

            $('#country_id').on('change', function(e){
                // let optionSelected = $("option:selected", this);
                let valueSelected = this.value;

                refresh_units(valueSelected);
                const [has_city_selected, first_city_id] = refresh_cities(valueSelected);
                const [has_cinema_selected, first_cinema_id] = refresh_cinemas(has_city_selected ? city_selected.id : first_city_id);
                refresh_root(has_cinema_selected ? ticket_price.cinema_id : first_cinema_id);
            });

            $('#city_id').on('change', function(e){
                // let optionSelected = $("option:selected", this);
                let valueSelected = this.value;

                const [has_cinema_selected, first_cinema_id] = refresh_cinemas(valueSelected);
                refresh_root(has_cinema_selected ? ticket_price.cinema_id : first_cinema_id);
            });

            $('#cinema_id').on('change', function(e){
                // let optionSelected = $("option:selected", this);
                let valueSelected = this.value;

                refresh_root(valueSelected);
            });

            $('#is_always_available').on('change', function(e){
                if (this.checked) {
                    $('#root').hide();
                    $('#is_active').prop('checked', true);
                } else {
                    $('#root').show();
                }
            });

            $('#country_id').trigger('change');
            $('#cities').trigger('change');
            $('#cinema_id').trigger('change');
            $('#is_always_available').trigger('change');
        });
    </script>
</x-app-layout>
