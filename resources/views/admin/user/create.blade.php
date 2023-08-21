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
                      <input type="text" class="form-control" id="name" name="name" required>
                    </div>


                    <div class="form-group pb-4">
                        <label for="user_type" class="pb-2">User Type<span style="color:red">*</span></label>
                        <select class="form-control" id="user_type" name="user_type" onchange="toggleInputField()" required>
                              <option value="admin" selected>Admin</option>
                              <option value="member">Member</option>
                              <option value="coach">Coach</option>
                        </select>
                    </div>

                    <div id="hiddenField" style="display: none;" class="form-group pb-4">
                        <label for="bio" class="pb-2">Coach Bio<span style="color:red">*</span></label>
                        <input type="text" class="form-control" type="text" id="bio" name="bio">
                    </div>

                    <div id="imageField" style="display: none;" class="form-group pb-4">
                      <label for="image" class="pb-2">Coach Image<span style="color:red">*</span></label>
                      <input type="file" max-size="500" accept=".jpg,.jpeg,.png" class="form-control" type="text" id="image" name="image">
                  </div>

                  <div id="imageDiv" class="form-group pb-4">
                    <p id="file-result"></p>
                    <img width="200px" style="border-radius: 8px" id="imgc"/>
                    <input type="text" name="image_data" id="image_data" hidden>
                  </div>

                    <div id="heightField" style="display: none;" class="form-group pb-4">
                      <label for="height" class="pb-2">Member Height(cm)<span style="color:red">*</span></label>
                      <input type="text" class="form-control" type="text" id="height" name="height">
                  </div>

                  <div id="weightField" style="display: none;" class="form-group pb-4">
                    <label for="weight" class="pb-2">Member Weight(kg)<span style="color:red">*</span></label>
                    <input type="text" class="form-control" type="text" id="weight" name="weight">
                </div>

                    <div class="form-group pb-4">
                        <label for="dob" class="pb-2">Date of Birth<span style="color:red">*</span></label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>

                    <div class="form-group pb-4">
                        <label for="gender" class="pb-2">Gender<span style="color:red">*</span></label>
                        <select class="form-control" id="gender" name="gender" required>
                              <option value="Female">Female</option>
                              <option value="Male">Male</option>
                        </select>
                    </div>

                    <div class="form-group pb-4">
                        <label for="phone" class="pb-2">Phone Number<span style="color:red">*</span></label>
                        <input type="number" class="form-control" id="phone" name="phone" required>
                      </div>

                    <div class="form-group pb-4">
                    <label for="email" class="pb-2">Email Address<span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group pb-4">
                        <label for="password" class="pb-2">Password<span style="color:red">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        </div>
    
                    <div class="form-group pb-4">
                        <button type="submit" id="file-submit" class="btn bg-primary text-white">Save User</button>
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