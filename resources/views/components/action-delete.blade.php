{!! Form::open(['url'=>$route, 'method' => 'delete']) !!}
{!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'button', 'class' => 'delete-button btn btn-sm btn-danger']) !!}
{!! Form::close() !!}

@push('script')
    <script>
        $('.delete-button').on('click', function () {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                   $(this).closest('form').submit()
                }
            });
        })
    </script>
@endpush
