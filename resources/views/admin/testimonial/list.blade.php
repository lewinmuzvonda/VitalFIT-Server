<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Testimonials') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table id="testimonials" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <a href="/create-testimonial"><button class="btn btn-primary">Add Testimonial</button></a>
                            </tr>

                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $testimonial)
                            <tr>
                                <td>{{$testimonial->title}}</td>
                                <td>
                                    <video controls>
                                        <source src="{{ $testimonial->video_url }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                <td>
                                    @if($testimonial->status == 1)
                                        <span style="color:green">Active</span>
                                    @else
                                        <span style="color:red">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/delete-testimonial/{{$testimonial->id}}"><button class="btn btn-danger">DELETE TESTIMONIAL</button></a>
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
            $('#testimonials').DataTable({
                dom: 'Bfrtip',
                buttons: [ 'colvis', 'pdf', 'print'  ]
            });
        });
    </script>

</x-app-layout>