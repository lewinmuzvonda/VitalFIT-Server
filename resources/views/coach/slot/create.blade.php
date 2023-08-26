<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Time Slot') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="row">
                <form class="p-5" action="{{ route('slots.save') }}" method="POST" enctype='multipart/form-data'>
                    {{ csrf_field() }}

                    <div class="form-group pb-4">
                        <label for="time" class="pb-2">Time/Date<span style="color:red">*</span></label>
                        <input type="datetime-local" class="form-control" id="time" name="time">
                    </div>

                    <input type="number" class="form-control" id="booking_id" name="booking_id" value="{{$booking->id}}" required hidden>

                    <div class="form-group pb-4">
                        <button type="submit" id="file-submit" class="btn bg-primary text-white">Save Slot</button>
                    </div>
    
                  </form>
            </div>
        </div>
    </div>
</div>


</x-app-layout>