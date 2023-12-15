@push('script')
    <script>
        Swal.fire({
            position: 'top-end',
            icon: "{{session('class')}}",
            title: "{{session('message')}}",
            showConfirmButton: false,
            timer: 3000,
            toast: true
        })
    </script>
@endpush
