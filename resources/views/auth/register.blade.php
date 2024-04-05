<!doctype html>
<html lang="en" dir="ltr">

<head>
    <title>Buat Akun</title>
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
                        <form id="registrationForm" action="{{ route('auth.regist.action') }}" method="post">
                            @csrf

                            <h5 class="mb-3 text-center">Buat Akun</h5>
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" name="name" id="floatingName"
                                    placeholder="">
                                <label for="floatingName">Nama</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" name="email" id="floatingEmail"
                                    placeholder="">
                                <label for="floatingEmail">Email</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="password" class="form-control" name="password" id="floatingPassword"
                                    placeholder="">
                                <label for="floatingPassword">Password</label>
                                <span toggle="floatingPassword" class="eye-toggle" title="Lihat Password">👁️</span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password2" id="floatingPassword2"
                                    placeholder="">
                                <label for="floatingPassword2">Ulangi Password</label>
                                <span toggle="floatingPassword2" class="eye-toggle" title="Lihat Password">👁️</span>
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
                                            target.addEventListener('focus', function() {
                                                this.select();
                                                document.execCommand('copy');
                                            });
                                            target.addEventListener('copy', function(event) {
                                                event.preventDefault();
                                                if (event.clipboardData) {
                                                    event.clipboardData.setData('text/plain',
                                                        'Teks di sini tidak dapat disalin');
                                                }
                                            });
                                        } else {
                                            target.setAttribute('type', 'password');
                                            this.textContent = '👁️';
                                            this.title = "Lihat Password";
                                            target.removeEventListener('focus', function() {
                                                this.select();
                                                document.execCommand('copy');
                                            });
                                            target.removeEventListener('copy', function(event) {
                                                event.preventDefault();
                                                if (event.clipboardData) {
                                                    event.clipboardData.setData('text/plain',
                                                        'Teks di sini tidak dapat disalin');
                                                }
                                            });
                                        }
                                    });
                                });

                                document.getElementById("floatingPassword2").addEventListener("input", function() {
                                    var password1 = document.getElementById("floatingPassword").value;
                                    var password2 = this.value;

                                    // Memeriksa apakah kedua password tidak sama
                                    if (password1 !== password2) {
                                        this.setCustomValidity("Password harus sama");
                                    } else {
                                        // Memeriksa apakah password memenuhi semua persyaratan
                                        if (validatePassword(password1)) {
                                            this.setCustomValidity("");
                                        } else {
                                            this.setCustomValidity(
                                                "Password harus memiliki panjang minimal 8 karakter, setidaknya satu huruf besar, satu huruf kecil, dan setidaknya satu karakter khusus"
                                            );
                                        }
                                    }
                                });

                                // Fungsi validasi password
                                function validatePassword(password) {
                                    // Regex untuk memeriksa panjang minimal 8 karakter, setidaknya satu huruf besar, satu huruf kecil, dan setidaknya satu karakter khusus
                                    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;
                                    return regex.test(password);
                                }

                                document.addEventListener("DOMContentLoaded", function() {
                                    var form = document.getElementById("registrationForm");
                                    form.addEventListener("submit", function(event) {
                                        event.preventDefault(); // Mencegah pengiriman formulir secara default

                                        // Memeriksa semua input di dalam formulir
                                        var inputs = form.querySelectorAll("input");
                                        var allFilled = true;
                                        inputs.forEach(function(input) {
                                            if (input.value.trim() === '') {
                                                allFilled = false;
                                            }
                                        });

                                        // Jika semua input terisi, submit formulir
                                        if (allFilled) {
                                            form.submit();
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Oops...',
                                                text: 'Harap lengkapi semua kolom sebelum mengirimkan formulir!',
                                                showConfirmButton: false,
                                                timer: 3000
                                            });
                                        }
                                    });
                                });
                            </script>

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

                            <button class="btn btn-primary w-100" type="submit">Buat Akun</button>

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
