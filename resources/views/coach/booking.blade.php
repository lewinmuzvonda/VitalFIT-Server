<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Manage Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h1 style="font-size: 18px" class="fw-bold mb-3">Booking Information</h1>
                                <p><strong>Client Name:</strong> {{ $booking->client }}</p>
                                <p><strong>Coach Name:</strong> {{ $booking->coach }}</p>
                                <p><strong>Booking Date:</strong> {{ $booking->start_time }}</p>
                                <p><strong>Booked Package:</strong> {{ $booking->package }}</p>
                                <!-- Add more booking information fields as needed -->
                            </div>
                        </div>
                        @if($slotsCount < $booking->slots)
                            <a href="/create-slot/{{$booking->id}}"><button class="btn btn-primary">CREATE TIME SLOT</button></a>
                        @endif
                        <div class="row mt-4 mb-5">
                            <div class="col-md-6">
                                <h2 class="mb-4" style="background-color: black; color: white;padding:8px;border-radius:5px">Time Slots</h2>
                                <ul style="border-width:2px;border-color: black; border-radius:5px; border-style:solid"  class="p-3">
                                    @foreach($slots as $slot)
                                        <li class="fw-bold mb-3">{{ \Carbon\Carbon::parse($slot->slot_time)->format('Y-m-d h:i A') }}  <a href="/update-slot/{{$slot->id}}"><button class="btn btn-primary">UPDATE THIS TIME SLOT</button></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h1 style="font-size: 18px" class="fw-bold mb-3">Change Booking Status</h1>
                                <form action="{{ route('booking.status') }}" method="POST" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="form-group pb-4">
                                        <input type="number" class="form-control" id="booking_id" name="booking_id" value="{{$booking->id}}" required hidden>

                                        <select class="form-control" id="status" name="status" required>
                                            @if($booking->status == 1)
                                                <option value="1" selected>(Current) Confirmed</option>
                                                <option value="2">Cancelled</option>
                                                <option value="0">Pending</option>
                                            @elseif($booking->status == 0)
                                                <option value="1">Confirmed</option>
                                                <option value="2">Cancelled</option>
                                                <option value="0" selected>(Current) Pending</option>
                                            @elseif($booking->status == 2)
                                                <option value="1">Confirmed</option>
                                                <option value="2" selected>(Current) Cancelled</option>
                                                <option value="0">Pending</option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group pb-4">
                                        <button type="submit" id="file-submit" class="btn bg-primary text-white">Update Status</button>
                                    </div>
                    
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
