<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    <!-- Required meta tags -->
    @includeIf('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      @includeIf('admin.sidebar')
      @includeIf('admin.navbar')
      <div class="container-fluid page-body-wrapper">
        
        
        <div class="container">
            <p style="font-size: 30px" class="text-center">Send Email Notification</p><br>
            @if (session()->has('msg'))
                <div class="alert alert-success m-auto" style="width: 65%;">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session()->get('msg') }}
                </div><br>
            @endif
            <form action="{{ url('sendemail',$data->id) }}" method="POST" class="m-auto" style="width:65%;">
                @csrf
                <div>
                    <label class="form-label">Greeting</label>
                    <input class="form-control" style="color: white" type="text" name="greeting">
              </div><br>
                <div>
                    <label class="form-label">Body</label>
                    <input class="form-control" style="color: white" type="text" name="body">
                </div><br>
                
                <div>
                    <label class="form-label">Action text</label>
                    <input class="form-control" style="color: white" type="text" name="actiontext">
              </div><br>

                <div>
                    <label class="form-label">Action URL</label>
                    <input class="form-control" style="color: white" type="text" name="actionurl">
              </div><br>

                <div>
                    <label class="form-label">End Part</label>
                    <input class="form-control" style="color: white" type="text" name="endpart">
              </div><br>
                
                <div class="d-grid gap-2">
                    <input class="btn btn-success btn-lg" type="submit" value="Submit Email">
                </div><br>

            </form>
        </div>

      </div>
    </div>
    @includeIf('admin.script')
  </body>
</html>