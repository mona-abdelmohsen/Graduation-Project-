
<!-- Library Bundle Script -->
<script type="text/javascript" src="{{URL::asset('assets/js/core/libs.min.js')}}"></script>
<!-- External Library Bundle Script -->
<script type="text/javascript" src="{{URL::asset('assets/js/core/external.min.js')}}"></script>
<!-- Widgetchart Script -->
<script type="text/javascript" src="{{URL::asset('assets/js/charts/widgetcharts.js')}}"></script>
<!-- mapchart Script -->
<script type="text/javascript" src="{{URL::asset('assets/js/charts/vectore-chart.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/charts/dashboard.js')}}"></script>
<!-- fslightbox Script -->
 <script type="text/javascript" src="{{URL::asset('assets/js/plugins/fslightbox.js')}}"></script>
<!-- Settings Script -->
 <script type="text/javascript" src="{{URL::asset('assets/js/plugins/setting.js')}}"></script>
<!-- Slider-tab Script -->
<script type="text/javascript" src="{{URL::asset('assets/js/plugins/slider-tabs.js')}}"></script>
<!-- Form Wizard Script -->
<script type="text/javascript" src="{{URL::asset('assets/js/plugins/form-wizard.js')}}"></script>
<!-- AOS Animation Plugin-->
<script type="text/javascript" src="{{URL::asset('assets/vendor/aos/dist/aos.js')}}"></script>
<!-- App Script -->
<script type="text/javascript" src="{{URL::asset('assets/js/hope-ui.js')}}" defer></script>
<script type="text/javascript" src="{{URL::asset('assets/js/jquery-3.6.1.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>	

<script src="{{url('assets/js/jQuery.js')}}"></script>
  
<script>
x=document.getElementsByClassName('swiper-slide')
for(let i=0;i<3;i++){
x[i].style="width:343.5px;margin-right: 32px;"

}
</script>
@yield('js')