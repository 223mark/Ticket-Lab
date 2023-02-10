@php
    $ticketTableHeader = ['TicketCode', 'Related Operator', 'Route', 'Date', 'Tickets', ''];
    $allTicketsTableHeader = ['Seat Number', 'Status', 'From', 'To', 'Price', 'Class', 'Departure Time', ''];
    $locationTableHeader = ['location'];
    $operatorTableHeader = ['Operator', 'TicketCodes', 'Phone1', 'Phone2', 'Description', ''];
    $routeTableHeader = ['From', 'To', 'Class', 'Departure Time', 'Arrive Time', 'Export Tickets', ''];
    
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

    @default
@endswitch
