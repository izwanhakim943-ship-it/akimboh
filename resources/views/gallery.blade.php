
@extends('layouts.app')

@section('title', 'My Gallery')

@section('content')

<section class="module-heading">
    <p class="section-eyebrow">03 / YOUR COLLECTION</p>
    <h1>MOMENTS <em>MATTER.</em></h1>
    <p>Not just files. A personal collection of everything worth keeping.</p>
</section>

<div class="gallery-showcase">
    <div class="showcase-item showcase-one">
        <div class="showcase-art">
            <div class="showcase-sun"></div>
        </div>

        <div class="showcase-caption">
            <span>01 / EXPERIENCES</span>
            <strong>PLACES & MEMORIES</strong>
        </div>
    </div>

    <div class="showcase-item showcase-two">
        <div class="showcase-art">
            <div class="showcase-flower">✳</div>
        </div>

        <div class="showcase-caption">
            <span>02 / COLLECTIONS</span>
            <strong>LITTLE THINGS</strong>
        </div>
    </div>

    <div class="showcase-item showcase-three">
        <div class="showcase-art">
            <div class="showcase-moon"></div>
        </div>

        <div class="showcase-caption">
            <span>03 / MOMENTS</span>
            <strong>AFTER HOURS</strong>
        </div>
    </div>
</div>

<div class="gallery-notice">
    <span>✳ GALLERY PREVIEW</span>
    <p>
        These are design illustrations, not uploaded photos.
        Personal photo and video management will be added in a later phase.
    </p>
</div>

@endsection
