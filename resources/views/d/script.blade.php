<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('.swal2-popup').hide();
        }, 5000);
    })

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })

    $(document).on('click', '.find-all', function() {})

</script>
