<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Voucher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('vouchers.update', $voucher->id) }}" method="POST" class="max-w-sm mx-auto">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label for="country_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country:</label>
                            <select id="country_id" name="country_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <!-- Add options for cities here -->
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{$country->id == $voucher->country_id ? 'selected' : ''}}>{{ $country->name }} ({{$country->symbol}})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code:</label>
                            <input type="text" name="code" value="{{$voucher->code}}" id="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>

                        <div class="mb-5">
                            <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount value:</label>
                            <input type="text" name="discount" value="{{$voucher->discount}}" id="discount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>

                        <div class="mb-5">
                            <label for="unit_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit:</label>
                            <select name="unit_id" id="unit_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </select>
                        </div>

                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                            <input id="percent" name="percent" type="checkbox" value="1" {{$voucher->percent ? 'checked="checked"' : ''}} class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" />
                            </div>
                            <label for="percent" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">discount with percent unit.</label>
                        </div>

                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                            <input id="active" name="active" type="checkbox" value="1" {{$voucher->active ? 'checked="checked"' : ''}} class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" />
                            </div>
                            <label for="active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">active this voucher</label>
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
            let optionSelected = "";
            let valueSelected = "";
            $('#country_id').on('change', function(e){
                optionSelected = $("option:selected", this);
                valueSelected = this.value;

                const units = @json($units);
                const voucher = @json($voucher);
                const units_order_by_country = units.filter(unit => unit.country_id == valueSelected);
                $('#unit_id').find('option').remove();
                units_order_by_country.forEach(unit => {
                    $('#unit_id').append(`<option value="${unit.id}" ${unit.id == voucher.unit_id ? 'selected' : ''}>${unit.name} (${unit.symbol})</option>`);
                });
            })

            $('#country_id').trigger('change');
        });
    </script>
</x-app-layout>
