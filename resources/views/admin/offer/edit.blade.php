<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Offer') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="row">
                <form class="p-5" action="{{ route('offers.update') }}" method="POST" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    
                    <div class="form-group pb-4">
                        <input type="number" class="form-control" id="id" name="id" value="{{$offer->id}}" required hidden>
                      <label for="offer" class="pb-2">Offer Title<span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="offer" name="offer" placeholder="{{$offer->title}}" required>
                    </div>
    
                    <div class="form-group pb-4">
                        <button type="submit" id="file-submit" class="btn bg-primary text-white">Update Offer</button>
                    </div>
    
                  </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>