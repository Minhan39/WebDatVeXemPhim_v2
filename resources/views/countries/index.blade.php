@php 
    session_start();
    if(!isset($_SESSION["language"])){
        $_SESSION["language"] = "en";
    }
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["title_countries_cities"])</script>' @endphp
        </h2>
        <select id="language_selected">
            <option value="en" {{$_SESSION["language"] == "en" ? "selected" : ""}}>English</option>
            <option value="vi" {{$_SESSION["language"] == "vi" ? "selected" : ""}}>Vietnamses</option>
        </select>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <div>
                            <a href="{{ route('countries.create') }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">@php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["button_add_country"])</script>' @endphp</a>
                        </div>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="i-table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["name"])</script>' @endphp
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["name_national_origin"])</script>' @endphp
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["symbol"])</script>' @endphp
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["monetary_units"])</script>' @endphp
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["actions"])</script>' @endphp
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3 max-w-7xl mx-auto sm:px-6 lg:px-8" id="cities">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <div>
                            <a href="{{ route('cities.create') }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">@php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["button_add_city"])</script>' @endphp</a>
                        </div>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="y-table">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["name"])</script>' @endphp
                                </th>
                                <th scope="col" id="col_country" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["actions"])</script>' @endphp
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Main modal -->
    <div id="units" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white" id="country_name">
                        <!-- @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["title_popup_units"])</script>' @endphp -->
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="units">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <!-- <ul class="space-y-4 mb-4">
                        <li>
                            <input type="radio" id="job-1" name="job" value="job-1" class="hidden peer" required />
                            <label for="job-1" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">                           
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">UI/UX Engineer</div>
                                    <div class="w-full text-gray-500 dark:text-gray-400">Flowbite</div>
                                </div>
                                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg>
                            </label>
                        </li>
                    </ul> -->
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="table-units">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["name"])</script>' @endphp
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["symbol"])</script>' @endphp
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["actions"])</script>' @endphp
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{route('units.store')}}" method="POST">
                                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-1 py-2 font-medium whitespace-nowrap dark:text-white">
                                        @csrf
                                        <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                    </th>
                                    <td class="px-1 py-2">
                                        <input type="text" name="symbol" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        <input disable hidden name="country_id" id="input_country_id"/>
                                    </td>
                                    <td class="px-1 py-2">
                                        <button class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">
                                            @php echo '<script>document.write(lang["' . $_SESSION["language"] . '"]["add"])</script>' @endphp
                                        </button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    <script>
        function setCountry(id, name) {
            console.log(id, name);
            $('#country_name').text(lang[@json($_SESSION["language"])]["title_popup_units"] + name);
            $('#input_country_id').val(id);
            const data = @json($units);
            const arr = data.filter(unit => unit.country_id == id);
            let htmlUnits = '';
            arr.forEach(value => {
                htmlUnits += `
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                        ${value.name}
                    </th>
                    <td class="px-6 py-4">
                        ${value.symbol}
                    </td>
                    <td class="px-6 py-4">
                        <form action="/units/${value.id}" method="POST" class="inline">
                        @csrf 
                        @method("DELETE") 
                            <button type="submit" onclick="return confirm(\'Are you sure you want to delete this unit?\')" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                ${lang[@json($_SESSION["language"])]["delete"]}
                            </button>
                        </form>
                    </td>
                </tr>
                `;
            });
            $("#table-units").find("tr:gt(1)").remove();
            $('#table-units').append(htmlUnits);
            htmlUnits = '';
        }
        $(document).ready(function() {
            $('#col_country').html(lang[@json($_SESSION["language"])]["country"]);
            $('#i-table').DataTable({
                data: @json($countries),
                dom: '<rt><"flex flex-row justify-between"ip>',
                fixedColumns: true,
                columnDefs: [
                    {orderable: false, targets: 3}
                ],
                columns: [
                    {data: 'name'},
                    {data: 'name_national_origin'},
                    {data: 'symbol'},
                    { 
                        data: null,
                        render: function(data, type, row){
                            let unit_list = '';
                            row.units.forEach(unit => {
                                if(unit_list !== ''){
                                    unit_list += ', ';
                                }
                                unit_list += unit.name + ' (' + unit.symbol + ')';
                            });
                            return unit_list;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button data-modal-target="units" data-modal-toggle="units" data-id="' + row.id + '" data-name="' + row.name + '" onclick="setCountry(this.getAttribute(`data-id`), this.getAttribute(`data-name`))" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">' + lang[@json($_SESSION["language"])]["units"] + '</button><a href="/countries/' + row.id + '/edit" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">' + lang[@json($_SESSION["language"])]["edit"] + '</a><form action="/countries/' + row.id + '" method="POST" class="inline">@csrf @method("DELETE") <button type="submit" onclick="return confirm(\'Are you sure you want to delete this country?\')" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">' + lang[@json($_SESSION["language"])]["delete"] + '</button></form>';
                        }
                    }
                ]
            });
            $('#y-table').DataTable({
                data: @json($cities),
                searchPanes: {
                    initCollapsed: true
                },
                columnDefs: [
                    {
                        searchPanes: {
                            show: true
                        },
                        targets: [1]
                    },
                    {orderable: false, targets: 2}
                ],
                dom: 'P<"flex flex-row justify-between"lf><rt><"flex flex-row justify-between"ip>',
                fixedColumns: true,
                columns: [
                    {data: 'name'},
                    {
                        data: null,
                        render: function(data, type, row) {
                            return row.country_name + ' (' + row.country_symbol + ')'
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<a href="/cities/' + row.id + '/edit" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">' + lang[@json($_SESSION["language"])]["edit"] + '</a><form action="/cities/' + row.id + '" method="POST" class="inline">@csrf @method("DELETE") <button type="submit" onclick="return confirm(\'Are you sure you want to delete this city?\')" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">' + lang[@json($_SESSION["language"])]["delete"] + '</button></form>';
                        }
                    }
                ]
            });
            console.log(@json($countries));
            console.log('lang session loading: ', @json($_SESSION["language"]));
            $('#language_selected').on('change', function(e){
                valueSelected = this.value;
                // console.log('lang: ', valueSelected);
                @php
                    if($_SESSION["language"] == "en"){
                        $_SESSION["language"] = "vi";
                    }else{
                        $_SESSION["language"] = "en";
                    }
                @endphp
                // console.log('lang session: ', @json($_SESSION["language"]));
                setTimeout(() => {
                    location.reload();
                }, 500);
            });
        });
    </script>
</x-app-layout>
