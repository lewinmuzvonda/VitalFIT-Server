<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Package') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="row">
                <form class="p-5" action="{{ route('packages.save') }}" method="POST" enctype='multipart/form-data'>
                    {{ csrf_field() }}

                    <div class="form-group pb-4">
                        <label for="type" class="pb-2">Coach<span style="color:red">*</span></label>
                        <select class="form-control" id="coach_id" name="coach_id" required>
                                @foreach($coaches as $coach)
                                    <option value="{{$coach->id}}">{{$coach->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group pb-4">
                      <label for="name" class="pb-2">Package Name (e.g 2 Sessions)<span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group pb-4">
                        <label for="type" class="pb-2">Package Type<span style="color:red">*</span></label>
                        <select class="form-control" id="type" name="type" required>
                              <option value="1">1 ON 1</option>
                              <option value="2">2 ON 1</option>
                        </select>
                    </div>

                    <div class="form-group pb-4">
                        <label for="price" class="pb-2">Package Price (AED)<span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="form-group pb-4">
                        <label for="slots" class="pb-2">Number of Session (e.g 2 if 2 Sessions)<span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="slots" name="slots" required>
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