<!doctype html>
<html lang="en" dir="ltr">

<head>
    <title>Login</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="assets/images/pupr-icon.png" />
    <!-- Css -->
    <link href="assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.css" class="theme-opt" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
    <!-- Style Css-->
    <link href="assets/css/style.css" class="theme-opt" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Loader -->
    <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
    <!-- Loader -->

    <!-- Hero Start -->
    <section class="bg-home bg-circle-gradiant d-flex align-items-center">
        <div class="bg-overlay bg-overlay-white"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card form-signin p-4 rounded shadow">
                        <form action="{{ route('auth.login.action') }}" method="post">
                            @csrf
                            <h5 class="mb-3 text-center">Login</h5>

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" name="email" id="floatingInput"
                                    placeholder="">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="floatingPassword"
                                    placeholder="">
                                <label for="floatingPassword">Password</label>
                                <span toggle="floatingPassword" class="eye-toggle" title="Lihat Password">👁️</span>
                            </div>

                            <style>
                                .form-floating .eye-toggle {
                                    position: absolute;
                                    right: 10px;
                                    top: 50%;
                                    transform: translateY(-50%);
                                    cursor: pointer;
                                }
                            </style>

                            <script>
                                document.querySelectorAll('.eye-toggle').forEach((eyeToggle) => {
                                    eyeToggle.addEventListener('click', function() {
                                        const target = document.getElementById(this.getAttribute('toggle'));
                                        if (target.getAttribute('type') === 'password') {
                                            target.setAttribute('type', 'text');
                                            this.textContent = '🙈';
                                            this.title = "Sembunyikan Password";
                                        } else {
                                            target.setAttribute('type', 'password');
                                            this.textContent = '👁️';
                                            this.title = "Lihat Password";
                                        }
                                    });
                                });
                            </script>

                            @if (session('success'))
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            icon: 'success',
                                            title: '{{ session('success') }}',
                                            showConfirmButton: false,
                                            timer: 3000
                                        });
                                    });
                                </script>
                            @endif

                            @if (session('error'))
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire({
                                            icon: 'error',
                                            title: '{{ session('error') }}',
                                            showConfirmButton: false,
                                            timer: 3000
                                        });
                                    });
                                </script>
                            @endif

                            {{-- <div class="d-flex justify-content-between">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                    </div>
                                </div>
                                <p class="forgot-pass mb-0"><a href="reset-password.html"
                                        class="text-dark small fw-bold">Forgot password ?</a></p>
                            </div> --}}

                            <button class="btn btn-primary w-100" type="submit">Masuk</button>

                            <div class="col-12 text-center mt-3">
                                <p class="mb-0 mt-3"><small class="text-dark me-2">Tidak punya akun?</small>
                                    <a href="{{ route('auth.register.form') }}" class="text-dark fw-bold">Buat Akun</a>
                                </p>
                            </div><!--end col-->

                            <p class="mb-0 text-muted mt-3 text-center">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Kostlab.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- javascript -->
    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <!-- Main Js -->
    <script src="assets/js/plugins.init.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
</body>

</html>
