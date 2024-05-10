@if (!@empty(session('error')))
    <script>
        Swal.fire({
            icon: "error",
            title: "{{ session('error') }}",
            text: "{{ session('message') }}",
            // timer: 5000,
        });
    </script>
@endif

@if (!@empty(session('errorFooter')))
    <script>
        Swal.fire({
            icon: "error",
            title: "{{ session('errorFooter') }}",
            text: "{{ session('message') }}",
            footer: "{{ session('footer') }}",
            // timer: 5000,
        });
    </script>
@endif

@if (!@empty(session('success')))
    <script>
        Swal.fire({
            icon: "success",
            title: "{{ session('success') }}",
            text: "{{ session('message') }}",
            // timer: 5000,
        });
        localStorage.clear();
    </script>
@endif

@if (!@empty(session('success-login')))
    <script>
        Swal.fire({
            title: "{{ session('success-login') }}",
            icon: 'success',
            showConfirmButton: false, // Remove confirmation button
            timer: 2000,
            allowOutsideClick: false, // Prevent closing on outside click
            didOpen: () => {
                Swal.showLoading(); // Display loading indicator
            },
            willClose: () => {
                return new Promise((resolve) => {
                // Redirect based on user type after timeout
                @if (Auth::check())
                    window.location.href = "{{ route('auth.overview') }}";
                @endif
                resolve(false); // Prevent default closing behavior
                });
            }
        }).then(() => {
            // after the modal is closed
            @if (Auth::check())
                window.location.href = "{{ route('auth.overview') }}";
            @endif
        });
    </script>
@endif

@if (!@empty(session('warning')))
    <script>
        Swal.fire({
            icon: "info",
            title: "{{ session('warning') }}",
            text: "{{ session('message') }}",
        });
    </script>
@endif