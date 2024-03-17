<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('popcorn-and-soda.update', $popcornAndSoda->id) }}" method="POST" class="max-w-sm mx-auto" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label for="country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Countries:</label>
                            <select name="country_id" id="country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <!-- Add options for countries here -->
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{$country->id == $popcornAndSoda->country_id ? "selected" : ""}}>{{ $country->name }} ({{$country->symbol}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
                            <input type="text" value="{{$popcornAndSoda->description}}" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        
                        <div class="mb-5">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price of service:</label>
                            <input type="text" value="{{$popcornAndSoda->price}}" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        <div class="mb-5">
                            <label for="unit_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Monetary:</label>
                            <select name="unit_id" id="unit_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <!-- Add options for countries here -->
                                <!-- @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                @endforeach -->
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image:</label>
                            <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let optionSelected = "";
            let valueSelected = "";
            $('#country_id').on('change', function(e){
                optionSelected = $("option:selected", this);
                valueSelected = this.value;
                const units = @json($units);
                const service = @json($popcornAndSoda);
                const units_order_by_country = units.filter(unit => unit.country_id == valueSelected);
                $('#unit_id').find('option').remove();
                units_order_by_country.forEach(unit => {
                    $('#unit_id').append(`<option value="${unit.id}" ${service.unit_id == unit.id ? 'selected' : ''}>${unit.name} (${unit.symbol})</option>`);
                });
            });

            // Trigger the change event once the document is ready
            $('#country_id').trigger('change');
        });
    </script>
</x-app-layout>
