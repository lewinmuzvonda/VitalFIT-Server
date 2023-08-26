<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Package') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="row">
                <form class="p-5" action="{{ route('packages.update') }}" method="POST" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    
                    <div class="form-group pb-4">
                      <label for="name" class="pb-2">Package Name (e.g 2 Sessions)<span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="name" name="name" value="{{$package->name}}" required>
                    </div>

                    <div class="form-group pb-4">
                        <label for="type" class="pb-2">Package Type<span style="color:red">*</span></label>
                        <select class="form-control" id="type" name="type" required>
                            @if($package->type == 1)
                                <option value="1" selected>1 ON 1</option>
                                <option value="2">2 ON 1</option>
                            @elseif($package->type == 2)
                                <option value="1">1 ON 1</option>
                                <option value="2" selected>2 ON 1</option>
                            @endif
                        </select>
                    </div>

                    <input type="number" class="form-control" id="id" name="id" value="{{$package->id}}" required hidden>

                    <div class="form-group pb-4">
                        <label for="price" class="pb-2">Package Price (AED)<span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="price" value="{{$package->price}}" name="price" required>
                    </div>

                    <div class="form-group pb-4">
                        <label for="slots" class="pb-2">Number of Session (e.g 2 if 2 Sessions)<span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="slots" value="{{$package->slots}}" name="slots" required>
                    </div>
    
                    <div class="form-group pb-4">
                        <button type="submit" id="file-submit" class="btn bg-primary text-white">Save Package</button>
                    </div>
    
                  </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>