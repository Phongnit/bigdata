<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('dist') }}/login/images/icons/favicon.ico">

    <link rel="stylesheet" type="text/css" href="{{ asset('dist') }}/login/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('dist') }}/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('dist') }}/login/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('dist') }}/login/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('dist') }}/login/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('dist') }}/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist') }}/login/css/main.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/css/style.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <meta name="robots" content="noindex, follow">
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"
        nonce="4c10b0d4-4dcd-4dda-96f6-50379d8db2ac"></script>
    <script defer="" referrerpolicy="origin"
        src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyTG9naW4lMjBWMSUyMiUyQyUyMnglMjIlM0EwLjQ1Mzg3NDEzNjE5NTg4ODclMkMlMjJ3JTIyJTNBMTkyMCUyQyUyMmglMjIlM0ExMDgwJTJDJTIyaiUyMiUzQTkxMSUyQyUyMmUlMjIlM0ExOTIwJTJDJTIybCUyMiUzQSUyMmh0dHBzJTNBJTJGJTJGY29sb3JsaWIuY29tJTJGZXRjJTJGbGYlMkZMb2dpbl92MSUyRmluZGV4Lmh0bWwlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkZ3cCUyRmh0bWw1LWFuZC1jc3MzLWxvZ2luLWZvcm1zJTJGJTIyJTJDJTIyayUyMiUzQTI0JTJDJTIybiUyMiUzQSUyMlVURi04JTIyJTJDJTIybyUyMiUzQS00MjAlMkMlMjJxJTIyJTNBJTVCJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIwJTIyJTJDJTIyVSUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMSUyMiUyQyUyMkElMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjIlMjIlMkMlMjItJTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIzJTIyJTJDJTIyMiUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyNCUyMiUyQyUyMjMlMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjUlMjIlMkMlMjI1JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjI2JTIyJTJDJTIyOCUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyNyUyMiUyQyUyMjElMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjglMjIlMkMlMjI1JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjI5JTIyJTJDJTIyNiUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMTAlMjIlMkMlMjI4JTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTJDJTdCJTIybSUyMiUzQSUyMnNldCUyMiUyQyUyMmElMjIlM0ElNUIlMjIxMSUyMiUyQyUyMi0lMjIlMkMlN0IlMjJzY29wZSUyMiUzQSUyMnBhZ2UlMjIlN0QlNUQlN0QlMkMlN0IlMjJtJTIyJTNBJTIyc2V0JTIyJTJDJTIyYSUyMiUzQSU1QiUyMjEyJTIyJTJDJTIyMSUyMiUyQyU3QiUyMnNjb3BlJTIyJTNBJTIycGFnZSUyMiU3RCU1RCU3RCUyQyU3QiUyMm0lMjIlM0ElMjJzZXQlMjIlMkMlMjJhJTIyJTNBJTVCJTIyMTMlMjIlMkMlMjIzJTIyJTJDJTdCJTIyc2NvcGUlMjIlM0ElMjJwYWdlJTIyJTdEJTVEJTdEJTVEJTdE">
    </script>
    <script nonce="4c10b0d4-4dcd-4dda-96f6-50379d8db2ac">
        try {
            (function(w, d) {
                ! function(kL, kM, kN, kO) {
                    kL[kN] = kL[kN] || {};
                    kL[kN].executed = [];
                    kL.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    kL.zaraz.q = [];
                    kL.zaraz._f = function(kP) {
                        return async function() {
                            var kQ = Array.prototype.slice.call(arguments);
                            kL.zaraz.q.push({
                                m: kP,
                                a: kQ
                            })
                        }
                    };
                    for (const kR of ["track", "set", "debug"]) kL.zaraz[kR] = kL.zaraz._f(kR);
                    kL.zaraz.init = () => {
                        var kS = kM.getElementsByTagName(kO)[0],
                            kT = kM.createElement(kO),
                            kU = kM.getElementsByTagName("title")[0];
                        kU && (kL[kN].t = kM.getElementsByTagName("title")[0].text);
                        kL[kN].x = Math.random();
                        kL[kN].w = kL.screen.width;
                        kL[kN].h = kL.screen.height;
                        kL[kN].j = kL.innerHeight;
                        kL[kN].e = kL.innerWidth;
                        kL[kN].l = kL.location.href;
                        kL[kN].r = kM.referrer;
                        kL[kN].k = kL.screen.colorDepth;
                        kL[kN].n = kM.characterSet;
                        kL[kN].o = (new Date).getTimezoneOffset();
                        if (kL.dataLayer)
                            for (const kY of Object.entries(Object.entries(dataLayer).reduce(((kZ, k$) => ({
                                    ...kZ[1],
                                    ...k$[1]
                                })), {}))) zaraz.set(kY[0], kY[1], {
                                scope: "page"
                            });
                        kL[kN].q = [];
                        for (; kL.zaraz.q.length;) {
                            const la = kL.zaraz.q.shift();
                            kL[kN].q.push(la)
                        }
                        kT.defer = !0;
                        for (const lb of [localStorage, sessionStorage]) Object.keys(lb || {}).filter((ld => ld
                            .startsWith("_zaraz_"))).forEach((lc => {
                            try {
                                kL[kN]["z_" + lc.slice(7)] = JSON.parse(lb.getItem(lc))
                            } catch {
                                kL[kN]["z_" + lc.slice(7)] = lb.getItem(lc)
                            }
                        }));
                        kT.referrerPolicy = "origin";
                        kT.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(kL[kN])));
                        kS.parentNode.insertBefore(kT, kS)
                    };
                    ["complete", "interactive"].includes(kM.readyState) ? zaraz.init() : kL.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body cz-shortcut-listen="true">
    <div class="limiter">
        @if (session('error'))
            <div class="alert alert-error alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Lỗi !</h5>
                {{ session('error') }}
            </div>
        @endif
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt=""
                    style="will-change: transform; transform: perspective(300px) rotateX(0deg) rotateY(0deg);">
                    <img src="{{ asset('dist') }}/login/images/img-01.webp" alt="IMG">
                </div>
                <form class="login100-form validate-form" method="POST">
                    @csrf
                    <span class="login100-form-title">
                        Member Login
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>
                    <div class="text-center p-t-136">
                        {{-- <a class="txt2" href="#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('dist') }}/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('dist') }}/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist') }}/js/demo.js"></script>
    <script src="{{ asset('dist') }}/login/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ asset('dist') }}/login/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="{{ asset('dist') }}/login/vendor/select2/select2.min.js"></script>

    <script src="{{ asset('dist') }}/login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    <script src="{{ asset('dist') }}/login/js/main.js"></script>
    <script defer=""
        src="https://static.cloudflareinsights.com/beacon.min.js/v55bfa2fee65d44688e90c00735ed189a1713218998793"
        integrity="sha512-FIKRFRxgD20moAo96hkZQy/5QojZDAbyx0mQ17jEGHCJc/vi0G2HXLtofwD7Q3NmivvP9at5EVgbRqOaOQb+Rg=="
        data-cf-beacon="{&quot;rayId&quot;:&quot;87735664cccf84bd&quot;,&quot;version&quot;:&quot;2024.3.0&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;}"
        crossorigin="anonymous"></script>


    <webchatgpt-custom-element-a43b1d39-d5d9-438d-beb4-d765b22bdeaf id="webchatgpt-snackbar"
        style="color: rgb(255, 255, 255);"></webchatgpt-custom-element-a43b1d39-d5d9-438d-beb4-d765b22bdeaf>
</body>

</html>
