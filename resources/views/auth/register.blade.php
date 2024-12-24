<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/img/img-robot-2.png') }}">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="h-[100vh] flex lg:flex-row">
        <div class="hidden w-full lg:w-1/2 lg:flex flex-col justify-center items-center px-16 py-16">
            <img class="lg:w-[70%]" src="{{ asset('assets/img/img-robot-3.png') }}" alt="img-register">
        </div>
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center py-10 gap-10">
            <h1 class="md:mb-4 text-3xl font-semibold tracking-wide text-white md:text-5xl">Register</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="flex flex-col justify-center items-center gap-5 w-[300px]">
                    <div class="w-full">
                        <div class="relative">
                            <input name="name" type="text" id="name" value="{{ old('name') }}"
                                autocomplete="name" required
                                class="peer w-full bg-dark placeholder:text-white text-white text-sm border border-slate-200 rounded-md px-3 py-3 transition duration-300 ease focus:outline-none focus:border-dark hover:border-slate-300 shadow-sm focus:shadow" />
                            @if ($errors->any())
                                <p class="mt-3 text-red-500 text-xs">{{ $errors->first('name') }}</p>
                            @endif
                            <label for="name"
                                class="absolute cursor-text bg-dark px-1 left-2.5 top-3 text-slate-400 text-sm transition-all transform origin-left peer-focus:-top-2 peer-focus:left-2.5 peer-focus:text-xs peer-focus:text-slate-400 peer-focus:scale-90">
                                Nama Lengkap
                            </label>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="relative">
                            <input name="email" type="text" id="email" value="{{ old('email') }}"
                                autocomplete="email" required
                                class="peer w-full bg-dark placeholder:text-white text-white text-sm border border-slate-200 rounded-md px-3 py-3 transition duration-300 ease focus:outline-none focus:border-dark hover:border-slate-300 shadow-sm focus:shadow" />
                            <label for="email"
                                class="absolute cursor-text bg-dark px-1 left-2.5 top-3 text-slate-400 text-sm transition-all transform origin-left peer-focus:-top-2 peer-focus:left-2.5 peer-focus:text-xs peer-focus:text-slate-400 peer-focus:scale-90">
                                Email
                            </label>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="relative">
                            <input name="password" type="password" id="password" autocomplete="current-password"
                                required
                                class="peer w-full bg-dark placeholder:text-white text-white text-sm border border-slate-200 rounded-md px-3 py-3 transition duration-300 ease focus:outline-none focus:border-dark hover:border-slate-300 shadow-sm focus:shadow" />
                            @if ($errors->has('password'))
                                <p class="mt-3 text-red-500 text-xs">{{ $errors->first('password') }}</p>
                            @endif
                            <label for="password"
                                class="absolute cursor-text bg-dark px-1 left-2.5 top-3 text-slate-400 text-sm transition-all transform origin-left peer-focus:-top-2 peer-focus:left-2.5 peer-focus:text-xs peer-focus:text-slate-400 peer-focus:scale-90">
                                Password
                            </label>
                        </div>
                    </div>
                    <div class="w-full">
                        <div class="relative">
                            <input name="password_confirmation" type="password" id="password_confirmation" autocomplete="current-password"
                                required
                                class="peer w-full bg-dark placeholder:text-white text-white text-sm border border-slate-200 rounded-md px-3 py-3 transition duration-300 ease focus:outline-none focus:border-dark hover:border-slate-300 shadow-sm focus:shadow" />
                            @if ($errors->has('password_confirmation'))
                                <p class="mt-3 text-red-500 text-xs">{{ $errors->first('password_confirmation') }}</p>
                            @endif
                            <label for="password_confirmation"
                                class="absolute cursor-text bg-dark px-1 left-2.5 top-3 text-slate-400 text-sm transition-all transform origin-left peer-focus:-top-2 peer-focus:left-2.5 peer-focus:text-xs peer-focus:text-slate-400 peer-focus:scale-90">
                                Konfirmasi Password
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="w-full h-10 mt-5 rounded-md button-gradient text-white hover:bg-secondary">Register</button>
                    <p class="mt-5 text-white">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-secondary font-bold">Login</a></p>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
