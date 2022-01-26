<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @includeIf('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      @includeIf('admin.sidebar')
      @includeIf('admin.navbar')
      <div class="container-fluid page-body-wrapper">
        
        
        <div class="container">
            <p style="font-size: 30px" class="text-center">Add Doctor Information</p><br>
            @if (session()->has('msg'))
                <div class="alert alert-success m-auto" style="width: 65%;">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session()->get('msg') }}
                </div><br>
            @endif
            <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data" class="m-auto" style="width:65%;">
                @csrf
                <div>
                    <label class="form-label">Doctor Name</label>
                    <input class="form-control" style="color: white" type="text" name="name" placeholder="Write the doctor name">
                </div><br>
                <div>
                    <label class="form-label">Doctor Phone Number</label>
                    <input class="form-control" style="color: white" type="text" name="phone" placeholder="Write the doctor phone no">
                </div><br>
                <div>
                    <label class="form-label">Doctor Speciality</label><br>
                    <select style="color: black; width:100%;" name="speciality">
                        <option value="">select</option>
                        <option value="skin">skin</option>    
                        <option value="heart">heart</option>    
                        <option value="eye">eye</option>    
                        <option value="nose">nose</option>    
                    </select>    
                </div><br>
                <div>
                    <label class="form-label">Room No</label>
                    <input class="form-control" style="color: white" type="number" name="room" placeholder="How many room number?">
                </div><br>
                <div>
                    <label class="form-label">Doctor Image</label>
                    <input class="form-control" type="file" name="image">
                </div><br>
                <div class="d-grid gap-2">
                    <input class="btn btn-success btn-lg" type="submit" value="Submit information">
                </div><br>

            </form>
        </div>

      </div>
    </div>
    @includeIf('admin.script')
  </body>
</html>