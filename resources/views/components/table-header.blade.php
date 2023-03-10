@php
    $adminListTableHeader = ['Photo', 'Name', 'Email', 'Phone', 'Created_Date', ''];
    $ticketTableHeader = ['TicketCode', 'Related Operator', 'Route', 'Tickets'];
    $allTicketsTableHeader = ['Seat Number', 'From', 'To', 'Price', 'Class', 'Departure Time'];
    $locationTableHeader = ['location'];
    $operatorTableHeader = ['Operator', 'TicketCodes', 'Phone1', 'Phone2', 'Description', ''];
    $routeTableHeader = ['From', 'To', 'Departure Time', 'Arrive Time', 'Export Tickets', ''];
    $orderTableHeader = ['Ticket Id', 'Customer Name', 'Email', 'Related Operator', 'Payment', 'Departuare Date', '', ''];
    
@endphp


@switch($slot)
    @case('ticket')
        <thead class="bg-gray-50">
            <tr>
                @foreach ($ticketTableHeader as $d)
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{ $d }} </th>
                @endforeach

            </tr>
        </thead>
    @break

    @case('alltickets')
        <thead class="bg-gray-50">
            <tr>
                @foreach ($allTicketsTableHeader as $d)
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{ $d }} </th>
                @endforeach

            </tr>
        </thead>
    @break

    @case('location')
        <thead class="bg-gray-50">
            <tr>
                @foreach ($locationTableHeader as $d)
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{ $d }} </th>
                @endforeach

            </tr>
        </thead>
    @break

    @case('operator')
        <thead class="bg-gray-50">
            <tr>
                @foreach ($operatorTableHeader as $d)
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{ $d }} </th>
                @endforeach

            </tr>
        </thead>
    @break

    @case('route')
        <thead class="bg-gray-50">
            <tr>
                @foreach ($routeTableHeader as $d)
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{ $d }} </th>
                @endforeach

            </tr>
        </thead>
    @break

    @case('order')
        <thead class="bg-gray-50">
            <tr>
                @foreach ($orderTableHeader as $d)
                    <th scope="col" class="px-6 py-4 font-medium ">{{ $d }} </th>
                @endforeach

            </tr>
        </thead>
    @break

    @case('adminlist')
        <thead class="bg-gray-50">
            <tr>
                @foreach ($adminListTableHeader as $d)
                    <th scope="col" class="px-6 py-4 font-medium ">{{ $d }} </th>
                @endforeach

            </tr>
        </thead>
    @break

    @default
@endswitch
