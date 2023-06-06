<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Inicio de sesión</title>
</head>

<body>
    <canvas></canvas>
    <div class="login">
        <div class="form">
            <form method="POST" action="{{ route('inicio.sesion') }}">
                @csrf
                <h2>Inicio de sesión</h2>
                <div class="form-group row">
                    <label for="email">{{ __('Correo electrónico') }}</label>

                    <div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="label-pass" for="password">{{ __('Contraseña') }}</label>

                    <div>
                        <div class="password-input-container">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            <img id="eye-icon" src="{{ asset('images/cerrado.svg') }}"
                                onclick="togglePasswordVisibility()" />
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button class="animated-button" type="submit">Ingresar</button>
                <div class="res-password">
                    <a href="#" class="res-password">¿Olvidaste la
                        contraseña?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.src = "{{ asset('images/abierto.svg') }}";
            } else {
                passwordInput.type = "password";
                eyeIcon.src = "{{ asset('images/cerrado.svg') }}";
            }
        }

        window.requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window
            .webkitRequestAnimationFrame || window.msRequestAnimationFrame

        onload = function() {
            setTimeout(init, 0)
        }

        init = function() {
            canvas = document.querySelector('canvas')
            ctx = canvas.getContext('2d')

            onresize = function() {
                canvas.width = canvas.clientWidth
                canvas.height = canvas.clientHeight
            }
            onresize()

            mouse = {
                x: canvas.width / 2,
                y: canvas.height / 2,
                out: false
            }

            canvas.onmouseout = function() {
                mouse.out = true
            }

            canvas.onmousemove = function(e) {
                var rect = canvas.getBoundingClientRect()
                mouse = {
                    x: e.clientX - rect.left,
                    y: e.clientY - rect.top,
                    out: false
                }
            }

            gravityStrength = 10
            particles = []
            spawnTimer = 0
            spawnInterval = 10
            type = 0
            requestAnimationFrame(startLoop)
        }

        newParticle = function() {
            type = type ? 0 : 1
            particles.push({
                x: mouse.x,
                y: mouse.y,
                xv: type ? 18 * Math.random() - 9 : 24 * Math.random() - 12,
                yv: type ? 18 * Math.random() - 9 : 24 * Math.random() - 12,
                c: type ? 'rgb(255,' + ((200 * Math.random()) | 0) + ',' + ((80 * Math.random()) | 0) + ')' :
                    'rgb(255,255,255)',
                s: type ? 5 + 10 * Math.random() : 1,
                a: 1
            })
        }

        startLoop = function(newTime) {
            time = newTime
            requestAnimationFrame(loop)
        }

        loop = function(newTime) {
            draw()
            calculate(newTime)
            requestAnimationFrame(loop)
        }

        draw = function() {
            ctx.clearRect(0, 0, canvas.width, canvas.height)
            for (var i = 0; i < particles.length; i++) {
                var p = particles[i]
                ctx.globalAlpha = p.a
                ctx.fillStyle = p.c
                ctx.beginPath()
                ctx.arc(p.x, p.y, p.s, 0, 2 * Math.PI)
                ctx.fill()
            }
        }

        calculate = function(newTime) {
            var dt = newTime - time
            time = newTime

            if (!mouse.out) {
                spawnTimer += (dt < 100) ? dt : 100
                for (; spawnTimer > 0; spawnTimer -= spawnInterval) {
                    newParticle()
                }
            }

            particleOverflow = particles.length - 700
            if (particleOverflow > 0) {
                particles.splice(0, particleOverflow)
            }

            for (var i = 0; i < particles.length; i++) {
                var p = particles[i]
                if (!mouse.out) {
                    x = mouse.x - p.x
                    y = mouse.y - p.y
                    a = x * x + y * y
                    a = a > 100 ? gravityStrength / a : gravityStrength / 100
                    p.xv = (p.xv + a * x) * 0.99
                    p.yv = (p.yv + a * y) * 0.99
                }
                p.x += p.xv
                p.y += p.yv
                p.a *= 0.99
            }
        }
    </script>
</body>

</html>
