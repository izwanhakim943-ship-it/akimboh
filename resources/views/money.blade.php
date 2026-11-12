
@extends('layouts.app')

@section('title', 'Money Tracker')

@section('content')

<section class="module-heading">
    <p class="section-eyebrow">02 / YOUR MONEY MOVES</p>
    <h1>STACK IT. <em>TRACK IT.</em></h1>
    <p>Make every ringgit count, without making finance boring.</p>
</section>

<div class="money-preview">
    <div class="money-heading">
        <span>THE MONEY CLUB ✳</span>
        <span>DEMO / NOT REAL DATA</span>
    </div>

    <div class="money-balance">
        <span>AVAILABLE BALANCE — SAMPLE</span>
        <strong>RM 2,500.00</strong>
        <small>YOUR FINANCIAL WORLD, REIMAGINED.</small>
    </div>

    <div class="money-stats">
        <div>
            <span>MONEY IN / EXAMPLE</span>
            <strong>+ RM 1,800</strong>
        </div>

        <div>
            <span>MONEY OUT / EXAMPLE</span>
            <strong>− RM 350</strong>
        </div>
    </div>

    <div class="money-preview-footer">
        <span>VINTAGE ENERGY. MODERN MONEY.</span>
        <span>✳ AKIMBOH FINANCE</span>
    </div>
</div>

<div class="module-grid">
    <div class="module-tile">
        <span>01 / RECORD</span>
        <h3>INCOME & EXPENSES</h3>
        <p>Record every transaction with categories and dates.</p>
        <small>COMING IN FINANCE MVP</small>
    </div>

    <div class="module-tile">
        <span>02 / SAVE</span>
        <h3>SAVINGS GOALS</h3>
        <p>Create goals and allocate money into savings.</p>
        <small>COMING IN FINANCE MVP</small>
    </div>

    <div class="module-tile">
        <span>03 / ANALYZE</span>
        <h3>KNOW YOUR NUMBERS</h3>
        <p>Calendar, financial charts and spending trends.</p>
        <small>PLANNED FINANCIAL FEATURE</small>
    </div>
</div>

@endsection
