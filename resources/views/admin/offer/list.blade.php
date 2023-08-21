<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Offers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table id="bookings" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <a href="/create-offer"><button class="btn btn-primary">CREATE OFFER</button></a>
                            </tr>

                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offers as $offer)
                            <tr>
                                <td>{{$offer->title}}</td>
                                <td>
                                    @if($offer->status == 1)
                                        <span style="color:green">Active</span>
                                    @else
                                        <span style="color:red">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/manage-offer/{{$offer->id}}"><button class="btn btn-primary">EDIT</button></a>
                                </td>
                                <td>
                                    <a href="/delete-offer/{{$offer->id}}"><button class="btn btn-danger">DELETE</button></a>
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
            $('#offers').DataTable({
                dom: 'Bfrtip',
                buttons: [ 'colvis', 'pdf', 'print'  ]
            });
        });
    </script>

</x-app-layout>