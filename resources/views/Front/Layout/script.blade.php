
<script src="{{ asset('All/assets/js/plugins/jquery/jquery.min.js') }}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('Front/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('Front/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('Front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('Front/lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('Back/assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('Front/js/main.js') }}"></script>
<script src="{{ asset('Front/js/wow.min.js') }}"></script>
<script>
   new WOW().init();
</script>
@stack('script')
