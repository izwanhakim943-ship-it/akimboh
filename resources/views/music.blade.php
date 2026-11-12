
@extends('layouts.app')

@section('title', 'Music Player')

@section('content')

<section class="module-heading">
    <p class="section-eyebrow">01 / YOUR SOUND SYSTEM</p>
    <h1>TURN IT <em>UP.</em></h1>
    <p>One place for every song, every mood, every moment.</p>
</section>

<div class="music-feature">
    <div class="music-feature-copy">
        <span class="module-pill">AKIMBOH AUDIO EXPERIENCE</span>
        <h2>YOUR MUSIC.<br>YOUR UNIVERSE.</h2>
        <p>
            Upload your favorite MP3 tracks, build playlists and
            explore a personalized music experience.
        </p>

        <div class="preview-message">
            MUSIC LIBRARY — IN DEVELOPMENT
        </div>

        <p class="module-note">
            You can already test local MP3 playback using the
            persistent music dock at the bottom of the screen.
        </p>
    </div>

    <div class="music-feature-art" aria-hidden="true">
        <div class="feature-vinyl">
            <div class="feature-vinyl-label">✳</div>
        </div>
    </div>
</div>

<div class="module-grid">
    <div class="module-tile">
        <span>01 / LIBRARY</span>
        <h3>YOUR COLLECTION</h3>
        <p>Upload, organize and manage your own music.</p>
        <small>COMING IN MUSIC MVP</small>
    </div>

    <div class="module-tile">
        <span>02 / AUDIO</span>
        <h3>SHAPE YOUR SOUND</h3>
        <p>Graphical equalizer, presets and audio adjustments.</p>
        <small>PLANNED AUDIO FEATURE</small>
    </div>

    <div class="module-tile">
        <span>03 / VISUALS</span>
        <h3>SEE THE FREQUENCY</h3>
        <p>Audio-reactive neon, particles and visualizer themes.</p>
        <small>PLANNED VISUALIZER</small>
    </div>
</div>

@endsection
