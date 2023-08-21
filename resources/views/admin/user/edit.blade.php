<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="row">
                <form class="p-5" action="{{ route('users.save') }}" method="POST" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    
                    <div class="form-group pb-4">
                      <label for="name" class="pb-2">Name<span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="name" name="name" required placeholder="{{$user->name}}">
                    </div>

                    <div class="form-group pb-4">
                        <label for="phone" class="pb-2">Phone Number<span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="phone" name="phone" required value="{{$user->phone_number}}">
                      </div>

                    <div class="form-group pb-4">
                    <label for="email" class="pb-2">Email Address<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" required value="{{$user->email}}">
                    </div>

                    <div class="form-group pb-4">
                        <label for="password" class="pb-2">Password<span style="color:red">*</span></label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
    
                    <div class="form-group pb-4">
                        <button type="submit" id="file-submit" class="btn bg-primary text-white">Update User</button>
                    </div>
    
                  </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleInputField() {
      var selectValue = document.getElementById("user_type").value;
      var hiddenInput = document.getElementById("hiddenField");
      var weightInput = document.getElementById("weightField");
      var heightInput = document.getElementById("heightField");
      var imageInput = document.getElementById("imageField");
      var imageDiv = document.getElementById("imageDiv");
      
      if (selectValue === "coach") {
        imageDiv.style.display = "block";

        hiddenInput.style.display = "block";
        hiddenInput.setAttribute("required", "required");

        imageInput.style.display = "block";
        imageInput.setAttribute("required", "required");

        weightInput.style.display = "none";
        weightInput.removeAttribute("required");

        heightInput.style.display = "none";
        heightInput.removeAttribute("required");
        
      } else if(selectValue === "member"){

        imageDiv.style.display = "none";

        hiddenInput.style.display = "none";
        hiddenInput.removeAttribute("required");

        imageInput.style.display = "none";
        imageInput.removeAttribute("required");

        weightInput.style.display = "block";
        weightInput.setAttribute("required", "required");

        heightInput.style.display = "block";
        heightInput.setAttribute("required", "required");

      }else {

        imageDiv.style.display = "none";

        imageInput.style.display = "none";
        imageInput.removeAttribute("required");

        hiddenInput.style.display = "none";
        hiddenInput.removeAttribute("required");

        weightInput.style.display = "none";
        weightInput.removeAttribute("required");

        heightInput.style.display = "none";
        heightInput.removeAttribute("required");
      }
    }
  </script>

<script>

  $(function () {
  $("select").select2();
  });

  const fileInput = document.getElementById("image");
  let fileResult = document.getElementById("file-result");
  let fileSubmit = document.getElementById("file-submit");
  var userValue = document.getElementById("user_type").value;
  var imgc = document.getElementById("imgc");

  fileInput.addEventListener("change", e => {


      if (fileInput.files.length > 0) {

      const fileSize = fileInput.files.item(0).size;
      const fileMb = fileSize / 1024 ** 2;

      if (fileMb >= 0.6) {

      fileResult.innerHTML = "Please select a file less than 600KB";
      fileSubmit.disabled = true;

      } else if( fileMb < 0.6 ) {

      fileSubmit.disabled = false;
      }
      }

      const file = fileInput.files[0];
      const reader = new FileReader();

      reader.addEventListener("load", () => {
      // Base64 Data URL
      console.log(reader.result);
      document.getElementById("image_data").value = reader.result;
      imgc.setAttribute("src", reader.result);
      });

      reader.readAsDataURL(file);

  });
  
</script>

</x-app-layout>