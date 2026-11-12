
@extends('layouts.app')

@section('title', 'Music Player')

@section('content')

<div
    x-data="{ uploadOpen: {{ $errors->any() ? 'true' : 'false' }} }"
    class="space-y-8"
>

    <!-- Header -->
    <section class="relative overflow-hidden rounded-[28px] border border-fuchsia-400/20 bg-[#201329] p-7 sm:p-10">

        <div class="pointer-events-none absolute -right-16 -top-20 h-80 w-80 rounded-full bg-fuchsia-600/25 blur-[90px]"></div>

        <div class="relative z-10 max-w-2xl">

            <p class="mb-5 text-[11px] font-bold tracking-[0.3em] text-fuchsia-300">
                AKIMBOH / YOUR SOUND UNIVERSE
            </p>

            <h1 class="text-5xl font-bold leading-none tracking-[-0.07em] sm:text-7xl">
                MUSIC IS<br>
                <span class="text-fuchsia-300">EVERYTHING.</span>
            </h1>

            <p class="mt-6 max-w-lg text-sm leading-7 text-slate-300">
                Your tracks. Your collection. Your rules.
                Build a personal music library and take your sound
                everywhere inside AkimBOH.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <button
                    type="button"
                    x-on:click="uploadOpen = !uploadOpen"
                    class="rounded-xl bg-fuchsia-400 px-6 py-4 text-xs font-bold tracking-widest text-[#27102c] transition hover:bg-fuchsia-300"
                >
                    + UPLOAD MUSIC
                </button>

                <a
                    href="#your-library"
                    class="rounded-xl border border-white/20 px-6 py-4 text-xs font-bold tracking-widest text-white transition hover:border-fuchsia-300"
                >
                    EXPLORE LIBRARY ↓
                </a>
            </div>

        </div>

        <div class="music-library-art pointer-events-none absolute -bottom-20 -right-16 hidden h-80 w-80 items-center justify-center lg:flex">
            <div class="music-library-vinyl">
                <div class="music-library-vinyl-label">
                    <span>AKIMBOH</span>
                    <strong>✳</strong>
                    <small>YOUR SOUND</small>
                </div>
            </div>
        </div>

        <div class="relative z-10 mt-12 flex gap-6 border-t border-white/15 pt-5 text-[10px] font-semibold tracking-widest text-fuchsia-200/70">
            <span>PERSONAL AUDIO</span>
            <span>PRIVATE LIBRARY</span>
            <span>MP3</span>
        </div>

    </section>

    <!-- Messages -->
    @if (session('success'))
        <div
            role="status"
            class="rounded-2xl border border-emerald-400/30 bg-emerald-500/10 px-6 py-4 text-sm text-emerald-200"
        >
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div
            role="alert"
            class="rounded-2xl border border-rose-400/30 bg-rose-500/10 px-6 py-4 text-sm text-rose-200"
        >
            <p class="mb-2 font-bold">Upload could not be completed.</p>

            <ul class="list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Upload Form -->
    <section
        x-show="uploadOpen"
        x-cloak
        x-transition
        class="rounded-[24px] border border-fuchsia-400/20 bg-[#181321] p-6 sm:p-8"
    >

        <div class="mb-7 flex items-center justify-between">
            <div>
                <p class="mb-2 text-[10px] tracking-widest text-fuchsia-300">
                    LIBRARY MANAGEMENT
                </p>

                <h2 class="text-2xl font-bold">Add New Track</h2>
            </div>

            <button
                type="button"
                x-on:click="uploadOpen = false"
                aria-label="Close upload form"
                class="text-2xl text-slate-400 hover:text-white"
            >
                ×
            </button>
        </div>

        <form
            action="{{ route('music.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-5"
        >
            @csrf

            <div class="grid gap-5 md:grid-cols-2">

                <div>
                    <label for="song-title" class="mb-2 block text-xs text-slate-300">
                        SONG TITLE *
                    </label>

                    <input
                        id="song-title"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        maxlength="160"
                        placeholder="Enter song title"
                        class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3.5 text-sm text-white outline-none focus:border-fuchsia-400"
                    >
                </div>

                <div>
                    <label for="song-artist" class="mb-2 block text-xs text-slate-300">
                        ARTIST *
                    </label>

                    <input
                        id="song-artist"
                        type="text"
                        name="artist"
                        value="{{ old('artist') }}"
                        required
                        maxlength="160"
                        placeholder="Artist name"
                        class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3.5 text-sm text-white outline-none focus:border-fuchsia-400"
                    >
                </div>

                <div>
                    <label for="song-album" class="mb-2 block text-xs text-slate-300">
                        ALBUM
                    </label>

                    <input
                        id="song-album"
                        type="text"
                        name="album"
                        value="{{ old('album') }}"
                        maxlength="160"
                        placeholder="Album name"
                        class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3.5 text-sm text-white outline-none focus:border-fuchsia-400"
                    >
                </div>

                <div>
                    <label for="song-genre" class="mb-2 block text-xs text-slate-300">
                        GENRE
                    </label>

                    <input
                        id="song-genre"
                        type="text"
                        name="genre"
                        value="{{ old('genre') }}"
                        maxlength="80"
                        placeholder="Electronic, Pop, Rock..."
                        class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3.5 text-sm text-white outline-none focus:border-fuchsia-400"
                    >
                </div>

                <div>
                    <label for="song-audio" class="mb-2 block text-xs text-slate-300">
                        MP3 AUDIO FILE *
                    </label>

                    <input
                        id="song-audio"
                        type="file"
                        name="audio"
                        accept=".mp3,audio/mpeg"
                        required
                        class="block w-full rounded-xl border border-dashed border-fuchsia-400/30 bg-white/5 p-4 text-xs text-slate-300 file:mr-3 file:rounded-lg file:border-0 file:bg-fuchsia-400 file:px-3 file:py-2 file:font-bold file:text-[#27102c]"
                    >

                    <p class="mt-2 text-[11px] text-slate-500">
                        MP3 only, up to 30 MB. Server upload limits also apply.
                    </p>
                </div>

                <div>
                    <label for="song-cover" class="mb-2 block text-xs text-slate-300">
                        CUSTOM ALBUM COVER
                    </label>

                    <input
                        id="song-cover"
                        type="file"
                        name="cover"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="block w-full rounded-xl border border-dashed border-fuchsia-400/30 bg-white/5 p-4 text-xs text-slate-300 file:mr-3 file:rounded-lg file:border-0 file:bg-fuchsia-400 file:px-3 file:py-2 file:font-bold file:text-[#27102c]"
                    >

                    <p class="mt-2 text-[11px] text-slate-500">
                        JPG, PNG or WebP. Maximum 4 MB.
                    </p>
                </div>

            </div>

            <div class="flex flex-wrap justify-end gap-3 border-t border-white/10 pt-6">

                <button
                    type="button"
                    x-on:click="uploadOpen = false"
                    class="rounded-xl border border-white/15 px-6 py-3 text-xs font-bold text-slate-300"
                >
                    CANCEL
                </button>

                <button
                    type="submit"
                    class="rounded-xl bg-fuchsia-400 px-7 py-3 text-xs font-bold tracking-widest text-[#27102c] hover:bg-fuchsia-300"
                >
                    SAVE TO LIBRARY ↗
                </button>

            </div>
        </form>
    </section>

    <!-- Library -->
    <section id="your-library" class="space-y-6">

        <div class="flex flex-wrap items-end justify-between gap-5">

            <div>
                <p class="mb-3 text-[10px] font-bold tracking-[0.25em] text-fuchsia-300">
                    / THE COLLECTION
                </p>

                <h2 class="text-3xl font-bold tracking-tight sm:text-5xl">
                    YOUR MUSIC <span class="text-fuchsia-300">LIBRARY.</span>
                </h2>
            </div>

            <span class="rounded-full border border-white/15 px-5 py-3 text-xs text-slate-300">
                {{ $songs->count() }}
                {{ $songs->count() === 1 ? 'TRACK' : 'TRACKS' }}
            </span>

        </div>

        @if ($songs->isEmpty())

            <div class="rounded-[25px] border border-dashed border-fuchsia-400/20 bg-[#16111e] px-6 py-20 text-center">

                <div class="mb-6 text-7xl text-fuchsia-300">♫</div>

                <h3 class="text-2xl font-bold">
                    Your collection starts here.
                </h3>

                <p class="mx-auto mt-4 max-w-md text-sm leading-7 text-slate-400">
                    No music uploaded yet. Add your first MP3 track
                    to start building your personal sound library.
                </p>

                <button
                    type="button"
                    x-on:click="uploadOpen = true; window.scrollTo({ top: 0, behavior: 'smooth' })"
                    class="mt-7 rounded-xl bg-fuchsia-400 px-6 py-4 text-xs font-bold text-[#27102c]"
                >
                    + UPLOAD FIRST TRACK
                </button>

            </div>

        @else

            <div class="grid gap-5 md:grid-cols-2 2xl:grid-cols-3">

                @foreach ($songs as $song)

                    <article class="group overflow-hidden rounded-[23px] border border-white/10 bg-[#181321] transition duration-300 hover:-translate-y-1 hover:border-fuchsia-400/50">

                        <div class="relative aspect-[16/10] overflow-hidden bg-gradient-to-br from-[#7c3989] via-[#40244f] to-[#17111e]">

                            @if ($song->cover_path)
                                <img
                                    src="{{ route('music.cover', $song) }}"
                                    alt="Cover artwork for {{ $song->title }}"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                    loading="lazy"
                                >
                            @else
                                <div class="flex h-full items-center justify-center">
                                    <div class="flex h-44 w-44 items-center justify-center rounded-full border-[14px] border-[#17121e] bg-[repeating-radial-gradient(circle,#25182d_0_5px,#32223d_6px_7px)] shadow-2xl">
                                        <span class="text-5xl text-fuchsia-200">✳</span>
                                    </div>
                                </div>
                            @endif

                            <span class="absolute left-4 top-4 rounded-full border border-white/20 bg-black/50 px-3 py-1.5 text-[10px] font-bold tracking-widest text-white backdrop-blur">
                                {{ $song->genre ?: 'MUSIC' }}
                            </span>

                        </div>

                        <div class="space-y-4 p-5">

                            <div>
                                <h3 class="truncate text-xl font-bold" title="{{ $song->title }}">
                                    {{ $song->title }}
                                </h3>

                                <p class="mt-1 truncate text-sm text-slate-400">
                                    {{ $song->artist }}
                                </p>
                            </div>

                            <div class="flex items-center justify-between gap-2 text-[11px] text-slate-500">
                                <span class="truncate">
                                    {{ $song->album ?: 'Single Track' }}
                                </span>

                                <span class="shrink-0">
                                    {{ round($song->size_bytes / 1048576, 1) }} MB
                                </span>
                            </div>

                            <div class="flex items-center gap-3 border-t border-white/10 pt-4">

                                <button
                                    type="button"
                                    data-title="{{ $song->title }}"
                                    data-artist="{{ $song->artist }}"
                                    data-url="{{ route('music.audio', $song) }}"
                                    x-on:click="
                                        window.dispatchEvent(
                                            new CustomEvent('akimboh:play', {
                                                detail: {
                                                    title: $el.dataset.title,
                                                    artist: $el.dataset.artist,
                                                    url: $el.dataset.url
                                                }
                                            })
                                        )
                                    "
                                    class="flex flex-1 items-center justify-center gap-2 rounded-xl bg-fuchsia-400 px-4 py-3 text-xs font-bold text-[#27102c] transition hover:bg-fuchsia-300"
                                >
                                    ▶ PLAY TRACK
                                </button>

                                <form
                                    method="POST"
                                    action="{{ route('music.destroy', $song) }}"
                                    onsubmit="return confirm('Delete this song permanently?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        aria-label="Delete {{ $song->title }}"
                                        class="rounded-xl border border-rose-400/30 px-4 py-3 text-xs text-rose-300 transition hover:bg-rose-400/10"
                                    >
                                        DELETE
                                    </button>
                                </form>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>

        @endif

    </section>

    <div class="rounded-2xl border border-white/10 bg-white/5 p-5 text-xs leading-6 text-slate-400">
        <span class="font-bold text-fuchsia-300">AKIMBOH AUDIO SYSTEM</span>
        — Music is stored privately in your Laravel application.
        Select PLAY TRACK to send a song to your persistent Mini Player.
    </div>

</div>

@endsection
