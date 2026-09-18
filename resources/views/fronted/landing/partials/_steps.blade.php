<section class="lk-section lk-section-alt" id="lk-steps">
    <div class="lk-container">
        <div class="lk-section-head">
            <span class="lk-eyebrow">{{ $settings->steps_eyebrow ?? __("So einfach geht's") }}</span>
            <h2 class="lk-h2">{{ $settings->steps_heading ?? __('In 3 Schritten wieder sicher mit Strom versorgt') }}</h2>
        </div>

        <div class="lk-steps">
            @foreach($steps as $step)
                <div class="lk-step">
                    <div class="lk-step-num">{{ $step->step_number }}</div>
                    @include('fronted.landing.partials._image-or-placeholder', [
                        'src' => $step->image,
                        'icon' => 'fa-image',
                        'label' => $step->title,
                    ])
                    <h3>{{ $step->title }}</h3>
                    <p>{{ $step->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
