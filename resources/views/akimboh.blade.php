
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AkimBOH — Personal Universe</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

@php
    $navigation = [
        ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => '◈'],
        ['name' => 'Music Player', 'route' => 'music', 'icon' => '♫'],
        ['name' => 'Money Tracker', 'route' => 'money', 'icon' => '◉'],
        ['name' => 'My Gallery', 'route' => 'gallery', 'icon' => '▧'],
    ];

    $pages = [
        'dashboard' => [
            'eyebrow' => 'YOUR PERSONAL UNIVERSE',
            'title' => 'Welcome to AkimBOH.',
            'description' => 'One space. Endless possibilities. Your digital world starts here.',
        ],
        'music' => [
            'eyebrow' => 'YOUR SOUND',
            'title' => 'Music Player',
            'description' => 'Your personal music collection, playlists and audio visualizer.',
        ],
        'money' => [
            'eyebrow' => 'YOUR MONEY',
            'title' => 'Money Tracker',
            'description' => 'Track your money, savings goals and financial activity.',
        ],
        'gallery' => [
            'eyebrow' => 'YOUR MEMORIES',
            'title' => 'My Gallery',
            'description' => 'A creative home for your photos, videos and favorite moments.',
        ],
    ];

    $page = $pages[$section];
@endphp

<body class="min-h-screen bg-[#090A13] text-white antialiased">

    <!-- Background Effects -->
    <div class="pointer-events-none fixed -top-32 left-1/3 h-96 w-96 rounded-full bg-violet-700/20 blur-[120px]"></div>
    <div class="pointer-events-none fixed bottom-0 right-0 h-80 w-80 rounded-full bg-fuchsia-700/10 blur-[100px]"></div>

    <div class="relative flex min-h-screen">

        <!-- Desktop Sidebar -->
        <aside class="hidden w-64 shrink-0 flex-col border-r border-white/10 bg-[#10111D]/90 p-6 md:flex">
            <a href="{{ route('dashboard') }}" wire:navigate
               class="mb-12 text-2xl font-black tracking-tight">
                Akim<span class="text-violet-400">BOH.</span>
            </a>

            <p class="mb-4 text-xs font-semibold tracking-[0.2em] text-slate-500">
                WORKSPACE
            </p>

            <nav class="space-y-2">
                @foreach ($navigation as $item)
                    <a href="{{ route($item['route']) }}"
                       wire:navigate
                       class="flex items-center gap-3 rounded-xl px-4 py-3 transition hover:bg-white/10 data-current:bg-violet-600/20 data-current:text-violet-300">
                        <span class="text-xl">{{ $item['icon'] }}</span>
                        <span class="text-sm font-medium">{{ $item['name'] }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="mt-auto border-t border-white/10 pt-6">
                <p class="text-sm font-semibold">AkimBOH Workspace</p>
                <p class="mt-1 text-xs text-slate-500">Made for your universe.</p>
            </div>
        </aside>

        <!-- Main Area -->
        <div class="min-w-0 flex-1 pb-40">

            <header class="flex items-center justify-between border-b border-white/10 px-6 py-5 md:px-10">
                <span class="text-sm font-semibold md:hidden">
                    Akim<span class="text-violet-400">BOH.</span>
                </span>
                <span class="hidden text-sm text-slate-400 md:block">
                    Personal Digital Universe
                </span>
                <span class="rounded-full border border-violet-400/30 bg-violet-500/10 px-3 py-1 text-xs text-violet-300">
                    LOCAL WORKSPACE
                </span>
            </header>

            <!-- Mobile Navigation -->
            <nav class="flex gap-2 overflow-x-auto border-b border-white/10 px-4 py-3 md:hidden">
                @foreach ($navigation as $item)
                    <a href="{{ route($item['route']) }}"
                       wire:navigate
                       class="shrink-0 rounded-full border border-white/10 px-4 py-2 text-xs data-current:border-violet-400 data-current:text-violet-300">
                        {{ $item['name'] }}
                    </a>
                @endforeach
            </nav>

            <main class="mx-auto max-w-7xl px-6 py-12 md:px-10">

                <p class="mb-4 text-xs font-bold tracking-[0.3em] text-violet-400">
                    {{ $page['eyebrow'] }}
                </p>

                <h1 class="max-w-4xl text-4xl font-black tracking-tight md:text-6xl">
                    {{ $page['title'] }}
                </h1>

                <p class="mt-5 max-w-2xl text-lg leading-relaxed text-slate-400">
                    {{ $page['description'] }}
                </p>

                @if ($section === 'dashboard')

                    <div class="mt-12 grid gap-5 lg:grid-cols-3">

                        <a href="{{ route('music') }}" wire:navigate
                           class="group rounded-3xl border border-violet-400/20 bg-gradient-to-br from-violet-800/60 to-[#181529] p-7 transition hover:-translate-y-1 hover:border-violet-400">
                            <span class="text-5xl">♫</span>
                            <h2 class="mt-12 text-2xl font-bold">Music Player</h2>
                            <p class="mt-2 text-sm text-slate-300">
                                Your music. Your rhythm.
                            </p>
                            <p class="mt-8 text-sm text-violet-300">
                                Explore Music →
                            </p>
                        </a>

                        <a href="{{ route('money') }}" wire:navigate
                           class="group rounded-3xl border border-emerald-400/20 bg-gradient-to-br from-emerald-900/60 to-[#142321] p-7 transition hover:-translate-y-1 hover:border-emerald-400">
                            <span class="text-5xl">◉</span>
                            <h2 class="mt-12 text-2xl font-bold">Money Tracker</h2>
                            <p class="mt-2 text-sm text-slate-300">
                                Every ringgit matters.
                            </p>
                            <p class="mt-8 text-sm text-emerald-300">
                                Manage Money →
                            </p>
                        </a>

                        <a href="{{ route('gallery') }}" wire:navigate
                           class="group rounded-3xl border border-pink-400/20 bg-gradient-to-br from-pink-900/60 to-[#2A1727] p-7 transition hover:-translate-y-1 hover:border-pink-400">
                            <span class="text-5xl">▧</span>
                            <h2 class="mt-12 text-2xl font-bold">My Gallery</h2>
                            <p class="mt-2 text-sm text-slate-300">
                                Your memories, beautifully organized.
                            </p>
                            <p class="mt-8 text-sm text-pink-300">
                                Open Gallery →
                            </p>
                        </a>

                    </div>

                @else

                    <div class="mt-12 rounded-3xl border border-white/10 bg-white/5 p-10">
                        <p class="text-sm font-semibold text-violet-300">
                            MODULE PREVIEW
                        </p>
                        <h2 class="mt-4 text-2xl font-bold">
                            {{ $page['title'] }} Workspace
                        </h2>
                        <p class="mt-3 text-slate-400">
                            The navigation is ready. Module features will be developed next.
                        </p>
                    </div>

                @endif

            </main>
        </div>
    </div>

    <!-- Persistent Music Player Demo -->
    @persist('akimboh-global-player')
        <div class="fixed bottom-0 left-0 right-0 z-50 border-t border-white/10 bg-[#141522]/95 px-5 py-4 shadow-2xl backdrop-blur-xl"
             x-data="{ fileName: 'No track selected' }">

            <div class="mx-auto flex max-w-7xl flex-col gap-3 md:flex-row md:items-center md:justify-between">

                <div>
                    <p class="text-sm font-bold text-white" x-text="fileName"></p>
                    <p class="text-xs text-slate-400">
                        Persistent Mini Player · Local Audio Demo
                    </p>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <input type="file"
                           accept="audio/mpeg,audio/*"
                           class="max-w-52 text-xs text-slate-300 file:mr-3 file:rounded-lg file:border-0 file:bg-violet-600 file:px-3 file:py-2 file:text-white"
                           x-on:change="
                               if (!$event.target.files.length) return;
                               fileName = $event.target.files[0].name;
                               $refs.audio.src = URL.createObjectURL($event.target.files[0]);
                               $refs.audio.play().catch(() => {});
                           ">

                    <audio x-ref="audio" controls preload="none"
                           class="h-10 w-56 max-w-full"></audio>
                </div>

            </div>
        </div>
    @endpersist

    @livewireScripts
</body>
</html>
