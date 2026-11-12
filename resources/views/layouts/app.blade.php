
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard') — AkimBOH</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

@php
    $navigation = [
        [
            'label' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => '◈',
        ],
        [
            'label' => 'Music Player',
            'route' => 'music',
            'icon' => '♫',
        ],
        [
            'label' => 'Money Tracker',
            'route' => 'money',
            'icon' => '◎',
        ],
        [
            'label' => 'My Gallery',
            'route' => 'gallery',
            'icon' => '▧',
        ],
    ];
@endphp

<body>
    <div class="app-shell">

        <!-- Sidebar -->
        <aside class="sidebar">
            <a class="brand" href="{{ route('dashboard') }}" wire:navigate>
                <span class="brand-icon">✳</span>
                <span>Akim<span>BOH</span><b>.</b></span>
            </a>

            <div class="sidebar-caption">YOUR UNIVERSE / 001</div>

            <div class="sidebar-label">WORKSPACE</div>

            <nav class="sidebar-nav" aria-label="Main navigation">
                @foreach ($navigation as $item)
                    <a
                        href="{{ route($item['route']) }}"
                        wire:navigate
                        class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}"
                        @if(request()->routeIs($item['route'])) aria-current="page" @endif
                    >
                        <span class="nav-icon">{{ $item['icon'] }}</span>
                        <span>{{ $item['label'] }}</span>
                        <span class="nav-arrow">↗</span>
                    </a>
                @endforeach
            </nav>

            <div class="sidebar-bottom">
                <div class="sidebar-decoration">
                    <div class="decoration-orbit"></div>
                    <span>CREATE YOUR<br>OWN UNIVERSE.</span>
                    <small>AKIMBOH / 2026</small>
                </div>

                <div class="sidebar-version">
                    <span class="status-dot"></span>
                    LOCAL WORKSPACE
                    <span>V2.0</span>
                </div>
            </div>
        </aside>

        <!-- Main -->
        <div class="app-main">
            <header class="topbar">
                <div class="breadcrumb">
                    <span>AKIMBOH</span>
                    <span class="breadcrumb-slash">/</span>
                    <strong>@yield('title', 'Dashboard')</strong>
                </div>

              <span class="topbar-status">
        <span class="status-dot"></span>
        YOUR SPACE IS LIVE
    </span>

    <div class="avatar" aria-label="Account avatar">
        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button
            type="submit"
            style="border:1px solid #ffffff25;
                   background:#ffffff0a;
                   border-radius:10px;
                   padding:11px 14px;
                   color:#d6c2ff;
                   font-size:11px;
                   font-weight:700;"
        >
            LOG OUT ↗
        </button>
    </form>

</div>
            </header>

            <nav class="mobile-nav" aria-label="Mobile navigation">
                @foreach ($navigation as $item)
                    <a
                        href="{{ route($item['route']) }}"
                        wire:navigate
                        class="{{ request()->routeIs($item['route']) ? 'selected' : '' }}"
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <main class="page-content">
                @yield('content')
            </main>

            <footer class="site-footer">
                <span>© 2026 AKIMBOH — YOUR DIGITAL UNIVERSE</span>
                <span>BUILT WITH LARAVEL + LIVEWIRE</span>
            </footer>
        </div>
    </div>

    <!-- Persistent across Livewire navigation -->
    @persist('akimboh-global-player')
        <div
            class="music-dock"
            x-data="{
                title: 'No track selected',
                artist: 'Your personal sound system',
                source: null,
                playing: false,
                current: 0,
                duration: 0,
                progress: 0,
                volume: 80,

                load(event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    if (this.source) {
                        URL.revokeObjectURL(this.source);
                    }

                    this.source = URL.createObjectURL(file);
                    this.title = file.name.replace(/\.[^.]+$/, '');
                    this.artist = 'Local audio file';
                    this.current = 0;
                    this.progress = 0;

                    this.$refs.audio.src = this.source;

                    this.$refs.audio.play().catch(() => {
                        this.playing = false;
                    });
                },

                toggle() {
                    if (!this.$refs.audio.src) return;

                    if (this.$refs.audio.paused) {
                        this.$refs.audio.play().catch(() => {});
                    } else {
                        this.$refs.audio.pause();
                    }
                },

                seek(event) {
                    if (!this.duration) return;

                    this.$refs.audio.currentTime =
                        this.duration * Number(event.target.value) / 100;
                },

                format(seconds) {
                    if (!Number.isFinite(seconds)) return '0:00';

                    const minutes = Math.floor(seconds / 60);
                    const remainder = Math.floor(seconds % 60);

                    return minutes + ':' + String(remainder).padStart(2, '0');
                }
            }"
            x-init="$refs.audio.volume = volume / 100"
        >
            <div class="dock-track">
                <div class="dock-art">
                    <span>♫</span>
                </div>

                <div class="dock-info">
                    <strong x-text="title"></strong>
                    <span x-text="artist"></span>
                </div>
            </div>

            <div class="dock-center">
                <div class="dock-controls">
                    <button
                        type="button"
                        class="dock-play"
                        x-on:click="toggle()"
                        x-bind:aria-label="playing ? 'Pause music' : 'Play music'"
                    >
                        <span x-text="playing ? 'Ⅱ' : '▶'"></span>
                    </button>

                    <span class="dock-now-playing">NOW PLAYING</span>
                </div>

                <div class="dock-timeline">
                    <span x-text="format(current)">0:00</span>

                    <input
                        aria-label="Seek audio"
                        type="range"
                        min="0"
                        max="100"
                        step="0.1"
                        x-bind:value="progress"
                        x-on:input="seek($event)"
                    >

                    <span x-text="format(duration)">0:00</span>
                </div>
            </div>

            <div class="dock-actions">
                <span class="dock-volume-icon">♫</span>

                <input
                    class="dock-volume"
                    aria-label="Volume"
                    type="range"
                    min="0"
                    max="100"
                    x-model="volume"
                    x-on:input="$refs.audio.volume = volume / 100"
                >

                <label class="dock-upload">
                    + LOAD MP3
                    <input
                        type="file"
                        accept=".mp3,audio/mpeg"
                        hidden
                        x-on:change="load($event)"
                    >
                </label>
            </div>

            <audio
                x-ref="audio"
                preload="metadata"
                x-on:play="playing = true"
                x-on:pause="playing = false"
                x-on:ended="playing = false"
                x-on:loadedmetadata="duration = Number.isFinite($refs.audio.duration) ? $refs.audio.duration : 0"
                x-on:timeupdate="
                    current = $refs.audio.currentTime;
                    progress = duration ? current / duration * 100 : 0;
                "
            ></audio>
        </div>
    @endpersist

    @livewireScripts
</body>
</html>
