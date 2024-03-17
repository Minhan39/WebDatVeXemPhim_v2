<x-app-layout>
    <style>
        .active{
            border-radius: 0.375rem;
        }
        table{
            width: 100% !important;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vouchers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:flex">
                <ul 
                    class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0" 
                    id="default-tab" 
                    data-tabs-toggle="#default-tab-content" 
                    role="tablist"
                    data-tabs-active-classes="active bg-gradient-to-r from-green-400 via-green-500 to-green-600 text-white hover:text-white focus:outline-none hover:bg-gradient-to-br focus:ring-4 focus:ring-green-300 font-medium text-sm px-5 py-2.5 me-0 mb-0 dark:bg-gradient-to-r dark:from-green-600 dark:via-green-500 dark:to-green-400 dark:focus:ring-green-800 dark:hover:bg-gradient-to-bl dark:hover:from-green-600 dark:hover:to-green-500 dark:hover:border-green-600 dark:focus:ring-green-700"
                    data-tabs-inactive-classes="text-gray-500 bg-white focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-0 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                >
                <!-- inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600 -->
                <!-- w-4 h-4 me-2 text-white -->
                    <li role="presentation">
                        <a href="#" id="vouchers-tab" aria-current="page" data-tabs-target="#vouchers" role="tab" aria-controls="vouchers" aria-selected="false" class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 5a2 2 0 0 0-2 2v2.5c0 .6.4 1 1 1a1.5 1.5 0 1 1 0 3 1 1 0 0 0-1 1V17a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2.5a1 1 0 0 0-1-1 1.5 1.5 0 1 1 0-3 1 1 0 0 0 1-1V7a2 2 0 0 0-2-2H4Z"/>
                            </svg>
                            Vouchers
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#" id="gifts-tab" aria-current="page" data-tabs-target="#gifts" role="tab" aria-controls="gifts" aria-selected="false" class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 7h-.7a3.4 3.4 0 0 0-.7-4c-.6-.6-1.5-1-2.4-1-1.8 0-3.3 1.2-4.4 2.5C10.4 2.8 9 2 7.5 2a3.5 3.5 0 0 0-3.1 5H4a2 2 0 0 0-2 2v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9a2 2 0 0 0-2-2ZM10 7H7.6a1.5 1.5 0 0 1 0-3c.9 0 2 .8 3 2.1l-.4.9Zm6.2 0h-3.8c1-1.4 2.4-3 3.8-3a1.5 1.5 0 0 1 0 3ZM13 14h-2v8h2v-8Zm-4 0H4v6a2 2 0 0 0 2 2h3v-8Zm6 0v8h3a2 2 0 0 0 2-2v-6h-5Z"/>
                            </svg>
                            Gifts
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#" id="ticket-prices-tab" aria-current="page" data-tabs-target="#ticket-prices" role="tab" aria-controls="ticket-prices" aria-selected="false" class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M12.3 3.3a1 1 0 0 1 1.4 0L16.4 6h-2.8l-1.3-1.3a1 1 0 0 1 0-1.4Zm.1 2.7L9.7 3.3a1 1 0 0 0-1.4 0L5.6 6h6.8ZM4.6 7A2 2 0 0 0 3 9v10c0 1.1.9 2 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.5-2h-13Z" clip-rule="evenodd"/>
                            </svg>
                            Ticket Prices
                        </a>
                    </li>
                </ul>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full" id="vouchers">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between mb-4">
                            <div>
                                <a href="{{ route('vouchers.create') }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Voucher</a>
                            </div>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="i-table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Country
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Code
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Discount
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Active
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full" id="gifts">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between mb-4">
                            <div>
                                <a href="{{ route('gifts.create') }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Gift</a>
                            </div>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="z-table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Country
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Min Total Expenditure
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Value
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full" id="ticket-prices">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex justify-between mb-4">
                            <div>
                                <a href="{{ route('ticket-prices.create') }}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Ticket Price</a>
                            </div>
                        </div>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="x-table">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Country
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        City
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Cinema
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Always/Child
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Active
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
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
    </div>
    <script>
        $(document).ready(function() {
            if(window.location.hash){
                let tab = window.location.hash.substring(1);
                console.log(tab);
                $('#' + tab + '-tab').attr('aria-selected', 'true').prop('selected', true);
            }
            $('#z-table').DataTable({
                data: @json($gifts),
                searchPanes: {
                    initCollapsed: true
                },
                columnDefs: [
                    {
                        searchPanes: {
                            show: true
                        },
                        targets: [0]
                    },
                    {orderable: false, targets: 4}
                ],
                dom: 'P<"flex flex-row justify-between"lf><rt><"flex flex-row justify-between"ip>',
                fixedColumns: true,
                columns: [
                    {
                        data: null,
                        render: function(data, type, row){
                            return row.country_name + ' (' + row.country_symbol + ')';
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row){
                            return row.limit_total_expenditure.toLocaleString('pl-PL');
                        }
                    },
                    {data: 'description'},
                    {
                        data: null,
                        render: function(data, type, row){
                            return row.value.toLocaleString('pl-PL') + ' ' + row.unit;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<a href="/gifts/' + row.id + '/edit" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</a><form action="/gifts/' + row.id + '" method="POST" class="inline">@csrf @method("DELETE") <button type="submit" onclick="return confirm(\'Are you sure you want to delete this gift?\')" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button></form>';
                        }
                    }
                ]
            });
            $('#i-table').DataTable({
                data: @json($vouchers),
                searchPanes: {
                    initCollapsed: true
                },
                columnDefs: [
                    {
                        searchPanes: {
                            show: true
                        },
                        targets: [0, 3]
                    },
                    {orderable: false, targets: 4}
                ],
                dom: 'P<"flex flex-row justify-between"lf><rt><"flex flex-row justify-between"ip>',
                fixedColumns: true,
                columns: [
                    {
                        data: null,
                        render: function(data, type, row){
                            return row.country_name + ' (' + row.country_symbol + ')';
                        }
                    },
                    {data: 'code'},
                    {
                        data: null,
                        render: function(data, type, row){
                            return row.discount.toLocaleString('pl-PL') + ' ' + (row.percent == '1' ? '%' : row.unit);
                        }
                    },
                    {
                        data:null,
                        render: function(data, type, row){
                            return row.active == '1' ? '<span class="text-green-500">Yes</span>' : '<span class="text-red-500">No</span>';
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<a href="/vouchers/' + row.id + '/edit" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</a><form action="/vouchers/' + row.id + '" method="POST" class="inline">@csrf @method("DELETE") <button type="submit" onclick="return confirm(\'Are you sure you want to delete this voucher?\')" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button></form>';
                        }
                    }
                ]
            });
            let ticketPriceMap = {};
            @foreach($ticketPrices as $ticketPrice)
                ticketPriceMap[{{ $ticketPrice->id }}] = @json($ticketPrice);
            @endforeach
            const ticket_prices = @json($ticketPrices);
            ticket_prices.forEach(ticket_price => {
                if(ticket_price.root_id === null) return;
                let root_ticket_price = ticketPriceMap[ticket_price.root_id];
                if(root_ticket_price){
                    ticket_price.root_name = root_ticket_price.name;
                }
            })
            $('#x-table').DataTable({
                data: ticket_prices,
                searchPanes: {
                    initCollapsed: true
                },
                columnDefs: [
                    {
                        searchPanes: {
                            show: true
                        },
                        targets: [0, 2, 3, 4, 6]
                    },
                    {orderable: false, targets: 7}
                ],
                dom: 'P<"flex flex-row justify-between"lf><rt><"flex flex-row justify-between"ip>',
                fixedColumns: true,
                columns: [
                    {
                        data: null,
                        render: function(data, type, row){
                            return row.country_name + ' (' + row.country_symbol + ')';
                        }
                    },
                    {data: 'city_name'},
                    {data: 'cinema_name'},
                    {
                        data: null,
                        render: function(data, type, row){
                            return row.is_always_available == '1' ? 'Always' : row.root_name;
                        }
                    },
                    {data: 'name'},
                    {
                        data: null,
                        render: function(data, type, row){
                            return row.price.toLocaleString('pl-PL') + ' ' + row.unit;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row){
                            return row.is_active == '1' ? '<span class="text-green-500">Yes</span>' : '<span class="text-red-500">No</span>';
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<a href="/ticket-prices/' + row.id + '/edit" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</a><form action="/ticket-prices/' + row.id + '" method="POST" class="inline">@csrf @method("DELETE") <button type="submit" onclick="return confirm(\'Are you sure you want to delete this ticket price?\')" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Delete</button></form>';
                        }
                    }
                ]
            });
            console.log(@json($vouchers));
        });
    </script>
</x-app-layout>
