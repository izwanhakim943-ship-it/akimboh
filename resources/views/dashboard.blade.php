
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<section class="hero">
    <div class="hero-grid"></div>

    <div class="hero-copy">
        <div class="hero-eyebrow">
            <span class="sparkle">✳</span>
            THE FUTURE OF YOUR PERSONAL SPACE
        </div>

        <h1>
            ONE SPACE.<br>
            <span>INFINITE</span><br>
            POSSIBILITIES<span class="hero-period">.</span>
        </h1>

        <p>
            Your sound. Your money. Your memories.
            Everything you love, living in one
            beautifully connected universe.
        </p>

        <div class="hero-buttons">
            <a href="{{ route('music') }}" wire:navigate class="button-primary">
                EXPLORE YOUR UNIVERSE <span>↗</span>
            </a>

            <a href="#modules" class="button-outline">
                DISCOVER MORE <span>↓</span>
            </a>
        </div>
    </div>

    <div class="hero-art" aria-hidden="true">
        <div class="art-glow"></div>
        <div class="art-ring ring-outer"></div>
        <div class="art-ring ring-middle"></div>
        <div class="art-ring ring-inner"></div>
        <div class="art-core"></div>

        <div class="art-label art-label-top">
            <small>01 / EXPLORE</small>
            <strong>YOUR WORLD</strong>
        </div>

        <div class="art-label art-label-bottom">
            <small>SYSTEM STATUS</small>
            <strong>ALL SYSTEMS GO ↗</strong>
        </div>
    </div>

    <div class="hero-number">AK/01 — PERSONAL UNIVERSE</div>
</section>

<section class="intro-strip">
    <span>✳ YOUR WORLD, REIMAGINED</span>
    <span>01 — LISTEN</span>
    <span>02 — TRACK</span>
    <span>03 — COLLECT</span>
</section>

<section id="modules" class="modules-section">
    <div class="section-heading">
        <div>
            <p class="section-eyebrow">/ THE AKIMBOH ECOSYSTEM</p>
            <h2>Everything you need.<br><em>Nothing you don't.</em></h2>
        </div>

        <span class="section-counter">EXPLORE / 003</span>
    </div>

    <div class="bento-grid">

        <!-- Music -->
        <a href="{{ route('music') }}" wire:navigate class="bento-card music-card">
            <div class="card-topline">
                <span>01 / ENTERTAINMENT</span>
                <span class="card-corner">↗</span>
            </div>

            <div class="vinyl-stage" aria-hidden="true">
                <div class="vinyl-shadow"></div>
                <div class="vinyl-disc">
                    <div class="vinyl-label">
                        <span>AKIMBOH</span>
                        <b>✳</b>
                        <small>SOUND SYSTEM</small>
                    </div>
                </div>
                <div class="vinyl-spark">✳</div>
            </div>

            <div class="card-copy">
                <span class="card-kicker">YOUR SOUND, YOUR RULES</span>
                <h3>FEEL THE<br><em>FREQUENCY.</em></h3>
                <p>Music library, custom playlists and your own immersive sound universe.</p>
            </div>

            <span class="card-explore">ENTER MUSIC PLAYER <b>↗</b></span>
        </a>

        <!-- Finance -->
        <a href="{{ route('money') }}" wire:navigate class="bento-card finance-card">
            <div class="card-topline">
                <span>02 / FINANCE</span>
                <span class="card-corner">↗</span>
            </div>

            <div class="finance-sticker">MAKE<br>MONEY<br>MOVES! ✳</div>

            <div class="finance-ticket">
                <span>YOUR MONEY, YOUR WAY</span>
                <strong>RM 2,500.00</strong>
                <small>ILLUSTRATIVE BALANCE</small>
                <div class="finance-bars">
                    <i></i><i></i><i></i><i></i>
                    <i></i><i></i><i></i><i></i>
                </div>
            </div>

            <div class="card-copy">
                <span class="card-kicker">TRACK IT. OWN IT.</span>
                <h3>YOUR MONEY.<br>YOUR <em>RULES.</em></h3>
                <p>Stay on top of spending, savings and every ringgit.</p>
            </div>

            <span class="card-explore">OPEN MONEY TRACKER <b>↗</b></span>
        </a>

        <!-- Gallery -->
        <a href="{{ route('gallery') }}" wire:navigate class="bento-card gallery-card">
            <div class="card-topline">
                <span>03 / COLLECTIONS</span>
                <span class="card-corner">↗</span>
            </div>

            <div class="gallery-art" aria-hidden="true">
                <div class="gallery-frame frame-back"></div>
                <div class="gallery-frame frame-middle"></div>
                <div class="gallery-frame frame-front">
                    <span>YOUR<br>MOMENTS.</span>
                    <b>✦</b>
                </div>
            </div>

            <div class="card-copy">
                <span class="card-kicker">EVERY MOMENT MATTERS</span>
                <h3>COLLECT<br><em>THE FEELING.</em></h3>
                <p>Your photos, videos and memories deserve a beautiful home.</p>
            </div>

            <span class="card-explore">VIEW YOUR GALLERY <b>↗</b></span>
        </a>

    </div>
</section>

<section class="bottom-banner">
    <div>
        <span>AKIMBOH / DIGITAL WORKSPACE</span>
        <h2>MADE TO BE <em>YOURS.</em></h2>
        <p>A personal universe built around the things that matter to you.</p>
    </div>

    <div class="banner-symbol" aria-hidden="true">✳</div>
</section>

@endsection
