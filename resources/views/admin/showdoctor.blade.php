<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
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
            <p class="h2 text-center">All Doctors Information</p><br>
            <table class="m-auto">
                <tr>
                    <th>Doctor name</th>
                    <th>Phone</th>
                    <th>Speciality</th>
                    <th>Room</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                @foreach ($data as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->speciality }}</td>
                        <td>{{ $data->room }}</td>
                        <td>
                            <img class="center" style="height: 70px; width:60px;" src="doctorimage/{{ $data->image }}" alt="No Image found">
                        </td>
                        <td>
                            <a href="{{ url('updatedoctor',$data->id) }}" class="btn btn-success">Update</a>
                            <a href="{{ url('deletedoctor',$data->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                        </td>
                    </tr>    
                @endforeach
            </table>
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