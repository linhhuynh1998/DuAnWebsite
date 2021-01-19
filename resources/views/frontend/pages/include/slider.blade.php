 <!-- Slider -->
 <div id="magik-slideshow" class="magik-slideshow">
    <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
      <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
        <ul>
          @foreach($banner as $banne)
          <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='{{ asset('public/uploads/banner/'.$banne->avatar)}}'>
            <img src='{{ asset('public/uploads/banner/'.$banne->avatar)}}' alt="slide1" data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat'  />
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <!-- end banner --> 