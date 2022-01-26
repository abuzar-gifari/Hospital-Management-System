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
            width:100%;
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
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @includeIf('admin.sidebar')
      @includeIf('admin.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
        <div>
            <p class="text-center h2">All Appointment Informations</p><br>
            <table class="m-auto">
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor Name</th>
                    <th>Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Approved</th>
                    <th>Cancel</th>
                    <th>Email</th>
                </tr>
                @foreach ($data as $appoin)
                    <tr>
                        <td>{{ $appoin->name }}</td>
                        <td>{{ $appoin->email }}</td>
                        <td>{{ $appoin->phone }}</td>
                        <td>{{ $appoin->doctor }}</td>
                        <td>{{ $appoin->date }}</td>
                        <td>{{ $appoin->message }}</td>
                        <td>{{ $appoin->status }}</td>
                        <td>
                            <a href="{{ url('approved',$appoin->id) }}" class="btn btn-success">Approved</a>
                        </td>
                        <td>
                            <a href="{{ url('canceled',$appoin->id) }}" class="btn btn-danger">Cancel</a>
                        </td>
                        <td>
                            <a href="{{ url('emailview',$appoin->id) }}" class="btn btn-primary">Send Email</a>
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