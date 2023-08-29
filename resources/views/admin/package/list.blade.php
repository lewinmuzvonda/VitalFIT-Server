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

                    <table id="packages" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <a href="/create-package"><button class="btn btn-primary">NEW PACKAGE</button></a>
                            </tr>

                            <tr>
                                <th>Coach</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>No. of Sessions</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packages as $package)
                            <tr>
                                <td>{{$package->coach}}</td>
                                <td>{{$package->name}}</td>
                                <td>
                                    @if($package->type == 1)
                                        <span style="color:green">1 ON 1</span>
                                    @elseif($package->type == 2)
                                        <span style="color:red">2 ON 1</span>
                                    @endif
                                </td>
                                <td>{{$package->price}} AED</td>
                                <td>{{$package->slots}}</td>
                                <td>
                                    <a href="/manage-package/{{$package->id}}"><button class="btn btn-primary">EDIT PACKAGE</button></a>
                                </td>
                                <td>
                                    <a href="/delete-package/{{$package->id}}"><button class="btn btn-danger">DELETE PACKAGE</button></a>
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
            $('#packages').DataTable({
                dom: 'Bfrtip',
                buttons: [ 'colvis', 'pdf', 'print'  ]
            });
        });
    </script>

</x-app-layout>