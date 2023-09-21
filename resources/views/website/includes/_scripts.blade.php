<script src="{{ asset('assets/website/js/jqueryLibrary.js') }}"></script>
<script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/website/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="{{ asset('assets/website/js/jsC.js') }}"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
        // Custom options
    });
</script>

@stack('js')
