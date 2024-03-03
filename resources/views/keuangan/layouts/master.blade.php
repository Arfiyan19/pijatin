<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance</title>
    <!-- ======= Styles ====== -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('finance/css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- =============== Navigation ================ -->

    @include('keuangan.layouts.nav')
    <!-- ========================= Main ==================== -->
    <section class="home-section">
        @yield('content')

    </section>
    @if (session('successMessage'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Login Success',
                text: '{{ session('successMessage') }}'
            });
        </script>
    @endif
    @stack('scripts')
    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
</body>

</html>
