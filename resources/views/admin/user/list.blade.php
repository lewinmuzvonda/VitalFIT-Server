<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="/create-user"><button class="btn btn-primary">CREATE USER ACCOUNT</button></a>
                    <table id="users" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>User Type</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>D.O.B</th>
                                <th>Gender</th>
                                <th>Created At</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ucfirst(trans($user->name))}}</td>
                                <td>{{ucfirst(trans($user->user_type))}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->dob}}</td>
                                <td>{{ucfirst(trans($user->gender))}}</td>
                                <td>{{$user->created_at}}</td>
                                {{-- <td>
                                    <a href="/manage-user/{{$user->id}}"><button class="btn btn-primary">UPDATE USER</button></a>
                                </td> --}}
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
            $('#users').DataTable({
                dom: 'Bfrtip',
                buttons: [ 'colvis', 'pdf', 'print'  ]
            });
        });
    </script>

</x-app-layout>