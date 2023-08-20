<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table id="bookings" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Client Name</th>
                                <th>Package</th>
                                <th>Coach</th>
                                <th>Start Date</th>
                                <th>Notes</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{$booking->client}}</td>
                                <td>{{$booking->package}}</td>
                                <td>{{$booking->coach}}</td>
                                <td>{{$booking->start_time}}</td>
                                <td>{{$booking->notes}}</td>
                                <td>
                                    @if($booking->status == 1)
                                        <span style="color:green">Confirmed</span>
                                    @else
                                        <span style="color:orange">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/manage-booking/{{$booking->id}}"><button class="btn btn-primary">MANAGE</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
         $(document).ready(function () {
            $('#bookings').DataTable({
                dom: 'Bfrtip',
                buttons: [ 'colvis', 'pdf', 'print'  ]
            });
        });
    </script>

</x-app-layout>
