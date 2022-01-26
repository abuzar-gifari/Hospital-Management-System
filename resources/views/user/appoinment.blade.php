<div class="page-section" style="font-family: 'Source Sans Pro', sans-serif;">
    <div class="container">
      @if (session()->has('msg'))
          <div class="alert alert-success m-auto" style="width: 64%;">
              <button type="button" class="close" data-dismiss="alert">x</button>
              {{ session()->get('msg') }}
          </div><br>
      @endif
      <p class="h2 text-center wow fadeInUp" style="font-family: 'Source Sans Pro', sans-serif; font-weight:900">Make an Appointment</p>
      
      <form class="main-form" method="POST" action="{{ url('appoinment') }}">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full name">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" value="{{ old('email') }}"  name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address..">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" value="{{ old('date') }}"  name="date" class="form-control @error('date') is-invalid @enderror">
            @error('date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="departement" class="custom-select @error('doctor') is-invalid @enderror">
              <option value="">Select a doctor</option>
              @foreach ($doctor as $doctor)
                <option value="{{ $doctor->name }}">
                    {{ $doctor->name }} ---- speciality ( {{ $doctor->speciality }} )
                </option>
              @endforeach
            </select>
            @error('doctor')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input name="number" value="{{ old('number') }}" type="text" class="form-control @error('number') is-invalid @enderror" placeholder="Number..">
            @error('number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" rows="6" placeholder="Enter message..">{{ old('message') }}</textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->
