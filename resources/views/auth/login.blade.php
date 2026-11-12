
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign In — AkimBOH</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#090910] text-white">

<div class="grid min-h-screen lg:grid-cols-2">

    <!-- Visual panel -->
    <section class="relative hidden overflow-hidden border-r border-white/10 bg-[#130d23] p-12 lg:flex lg:flex-col lg:justify-between">

        <div class="absolute inset-0"
             style="background:radial-gradient(ellipse at 52% 48%,#7138b75e,transparent 58%)">
        </div>

        <div class="relative z-10 flex items-center gap-3">
            <div class="grid h-11 w-11 place-items-center rounded-2xl bg-violet-600 text-3xl">
                ✳
            </div>
            <span class="text-2xl font-bold tracking-tight">
                Akim<span class="text-violet-300">BOH.</span>
            </span>
        </div>

        <!-- Animated artwork -->
        <div class="relative z-10 flex h-[420px] items-center justify-center">
            <div class="absolute h-80 w-80 rounded-full bg-violet-600/30 blur-[85px]"></div>

            <div class="absolute h-[340px] w-[340px] rounded-full border border-violet-300/30"
                 style="transform:rotateX(65deg) rotateZ(25deg)">
            </div>

            <div class="absolute h-[280px] w-[280px] rounded-full border-[23px] border-violet-400/25 shadow-[0_0_70px_#9a60ff55]"></div>

            <div class="absolute h-[220px] w-[220px] rounded-full border border-dashed border-purple-200/40"></div>

            <div class="relative grid h-44 w-44 rotate-[-20deg] place-items-center rounded-[40%] border border-purple-200/50 bg-gradient-to-br from-fuchsia-200 via-violet-500 to-indigo-950 shadow-[0_0_90px_#9f65ffaa]">
                <span class="rotate-[20deg] text-7xl font-bold text-white/90">✳</span>
            </div>
        </div>

        <div class="relative z-10">
            <p class="mb-5 text-xs font-bold tracking-[0.35em] text-violet-300">
                YOUR PERSONAL DIGITAL UNIVERSE
            </p>

            <h1 class="max-w-xl text-5xl font-bold leading-[1.05] tracking-tight">
                YOUR WORLD.<br>
                YOUR RULES.<br>
                <span class="text-violet-300">YOUR SPACE.</span>
            </h1>

            <p class="mt-6 max-w-sm text-sm leading-7 text-slate-400">
                Music. Memories. Money.
                Everything that matters, together in one place.
            </p>
        </div>
    </section>

    <!-- Login panel -->
    <section class="flex min-h-screen items-center justify-center px-6 py-14 sm:px-12">

        <div class="w-full max-w-[420px]">

            <div class="mb-12 flex items-center gap-3 lg:hidden">
                <div class="grid h-10 w-10 place-items-center rounded-xl bg-violet-600 text-2xl">
                    ✳
                </div>
                <span class="text-2xl font-bold">
                    Akim<span class="text-violet-300">BOH.</span>
                </span>
            </div>

            <div class="mb-9">
                <p class="mb-4 text-xs font-bold tracking-[0.25em] text-violet-400">
                    PRIVATE WORKSPACE / SIGN IN
                </p>

                <h2 class="text-4xl font-bold tracking-tight sm:text-5xl">
                    Welcome<br>
                    <span class="text-violet-300">back.</span>
                </h2>

                <p class="mt-5 text-sm leading-7 text-slate-400">
                    Sign in to enter your personal universe.
                </p>
            </div>

            <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="mb-3 block text-xs font-bold tracking-widest text-slate-300">
                        EMAIL ADDRESS
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        autocomplete="username"
                        required
                        autofocus
                        placeholder="you@example.com"
                        class="w-full rounded-xl border border-white/10 bg-[#171521] px-5 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-violet-400 focus:ring-2 focus:ring-violet-500/20"
                    >

                    @error('email')
                        <p role="alert" class="mt-2 text-xs text-rose-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="mb-3 block text-xs font-bold tracking-widest text-slate-300">
                        PASSWORD
                    </label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required
                        placeholder="Enter your password"
                        class="w-full rounded-xl border border-white/10 bg-[#171521] px-5 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-violet-400 focus:ring-2 focus:ring-violet-500/20"
                    >

                    @error('password')
                        <p role="alert" class="mt-2 text-xs text-rose-400">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <label class="flex cursor-pointer items-center gap-3 text-sm text-slate-400">
                    <input
                        name="remember"
                        type="checkbox"
                        value="1"
                        class="h-4 w-4 accent-violet-500"
                    >
                    Remember me on this device
                </label>

                <button
                    type="submit"
                    class="flex w-full items-center justify-center gap-3 rounded-xl bg-violet-600 px-6 py-4 text-sm font-bold tracking-widest text-white transition hover:-translate-y-1 hover:bg-violet-500"
                >
                    ENTER MY UNIVERSE
                    <span>↗</span>
                </button>
            </form>

            <div class="mt-12 border-t border-white/10 pt-6">
                <p class="text-xs tracking-widest text-slate-600">
                    AKIMBOH / PRIVATE ACCESS ONLY
                </p>
            </div>

        </div>

    </section>

</div>

</body>
</html>
