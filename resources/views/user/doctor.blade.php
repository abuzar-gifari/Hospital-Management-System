<div class="page-section" style="font-family: 'Source Sans Pro', sans-serif;">
    <div class="container">
      <p class="h2 text-center mb-5 wow fadeInUp" style="font-family: 'Source Sans Pro', sans-serif; font-weight:700">Our Doctors</p>

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach ($doctor as $doctor)
          <div class="item">
            <div class="card-doctor">
              <div class="header">
                <img src="doctorimage/{{ $doctor->image }}" alt="No Image" style="height: 300px;">
                <div class="meta">
                  <a href="#"><span class="mai-call"></span></a>
                  <a href="#"><span class="mai-logo-whatsapp"></span></a>
                </div>
              </div>
              <div class="body">
                <p class="text-xl mb-0">{{ $doctor->name }}</p>
                <span class="text-sm text-grey">{{ $doctor->speciality }}</span>
              </div>
            </div>
          </div>  
        @endforeach
        
      </div>
    </div>
  </div>
