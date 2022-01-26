<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    <!-- Required meta tags -->
    @includeIf('admin.css')
    <style>
        table{
            border:2px solid black;
            border-collapse: collapse;
            width:95%;
        }

        th,td{
            border:2px solid black;
            padding:5px;
            text-align: center;
        }

        th{
            background-color: darkgreen;
            color: white;
            height:30px;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @includeIf('admin.sidebar')
      @includeIf('admin.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
        <div class="container">
            <p style="font-size: 30px" class="text-center">Update Doctor Information</p><br>
            @if (session()->has('msg'))
                <div class="alert alert-success m-auto" style="width: 65%;">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session()->get('msg') }}
                </div><br>
            @endif
            <form action="{{ url('editdoctor',$data->id) }}" method="POST" enctype="multipart/form-data" class="m-auto" style="width:65%;">
                @csrf
                <div>
                    <label class="form-label">Doctor Name</label>
                    <input class="form-control" style="color: black;" type="text" name="name" value="{{ $data->name }}">
                </div><br>
                <div>
                    <label class="form-label">Doctor Phone Number</label>
                    <input class="form-control" style="color: black" type="text" name="phone" value="{{ $data->phone }}">
                </div><br>
                <div>
                    <label class="form-label">Doctor Speciality</label><br>
                    <select style="color: black; width:100%;" name="speciality">
                        <option value="{{ $data->speciality }}">{{ $data->speciality }}</option>
                        <option value="skin">skin</option>    
                        <option value="heart">heart</option>    
                        <option value="eye">eye</option>    
                        <option value="nose">nose</option>    
                    </select>    
                </div><br>
                <div>
                    <label class="form-label">Room No</label>
                    <input class="form-control" style="color: black" type="number" name="room" value="{{ $data->room }}">
                </div><br>
                <div>
                    <label class="form-label">Old Image</label>
                    <img src="doctorimage/{{ $data->image }}" style="height: 70px;" >
                </div><br>
                <div>
                    <label class="form-label">New Image</label>
                    <input type="file" name="image" class="form-control">
                </div><br>
                <div class="d-grid gap-2">
                    <input class="btn btn-success btn-lg" type="submit" value="Update information">
                </div><br>

            </form>
        </div>
        
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @includeIf('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>