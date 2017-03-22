@if (notify()->ready())
    <script>
        swal({
            title: "{!! notify()->message() !!}",
            text: "{!! notify()->option('text') !!}",
            type: "{{ notify()->type() }}",
            @if (notify()->option('timer'))
                timer: {{ notify()->option('timer') }},
                showConfirmButton: false
            @endif
        });
    </script>
@endif




@if(count($errors) > 0)
<script>
 @foreach ($errors->all() as $error)
   sweetAlert("Oops...", "{!! $error !!}", "error");
 @endforeach

</script>


@endif
