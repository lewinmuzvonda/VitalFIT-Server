<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Testimonial') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="row">
                <form class="p-5" action="{{ route('testimonials.save') }}" method="POST" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    
                    <div class="form-group pb-4">
                      <label for="title" class="pb-2">Testimonial Title<span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="form-group pb-4">
                        <label for="video" class="pb-2">Upload Video<span style="color:red">*</span></label>
                        <input type="file" class="form-control" name="video" id="video" accept="video/mp4" required>
                    </div>

                    <div class="form-group pb-4">
                        <button type="submit" id="file-submit" class="btn bg-primary text-white">Save Testimonial</button>
                    </div>
    
                  </form>
            </div>
        </div>
    </div>
</div>

</x-app-layout>