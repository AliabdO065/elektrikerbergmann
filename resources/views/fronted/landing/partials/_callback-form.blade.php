<section class="lk-section" id="lk-callback">
    <div class="lk-container">
        <div class="lk-section-head">
            <span class="lk-eyebrow">{{ $settings->callback_eyebrow ?? __('Kein Notfall, aber Beratungsbedarf?') }}</span>
            <h2 class="lk-h2">{{ $settings->callback_heading ?? __('Rückruf anfordern') }}</h2>
            <p>{{ $settings->callback_subtext ?? __('Sagen Sie uns kurz, worum es geht — wir rufen Sie zeitnah zurück.') }}</p>
        </div>

        <div class="lk-callback-box">
            @if(session('callback_success'))
                <div class="lk-thanks">
                    <i class="fa-solid fa-circle-check"></i>
                    <h3>{{ __('Vielen Dank!') }}</h3>
                    <p>{{ __('Wir haben Ihre Anfrage erhalten und melden uns in Kürze bei Ihnen.') }}</p>
                </div>
            @else
                <form id="lk-callback-form" method="POST" action="{{ route('fronted.landing.callback') }}"
                      data-sending-label="{{ __('Wird gesendet...') }}"
                      data-submit-label="{{ __('Rückruf anfordern') }}"
                      data-error-message="{{ __('Leider ist ein Fehler aufgetreten. Bitte rufen Sie uns direkt an.') }}">
                    @csrf
                    <input type="hidden" name="problem_type" id="lk-problem-type">

                    <div class="lk-callback-steps">
                        <span class="lk-callback-dot active" data-step="1"></span>
                        <span class="lk-callback-dot" data-step="2"></span>
                        <span class="lk-callback-dot" data-step="3"></span>
                    </div>

                    <div class="lk-callback-panel active" data-step="1">
                        <h3 style="text-align:center;margin:0 0 6px;">{{ __('Worum geht es?') }}</h3>
                        <div class="lk-option-grid">
                            <button type="button" class="lk-option-btn" data-problem="power_outage"><i class="fa-solid fa-plug-circle-xmark"></i> {{ __('Stromausfall') }}</button>
                            <button type="button" class="lk-option-btn" data-problem="short_circuit"><i class="fa-solid fa-fire-flame-simple"></i> {{ __('Kurzschluss / Brandgeruch') }}</button>
                            <button type="button" class="lk-option-btn" data-problem="breaker_trip"><i class="fa-solid fa-toggle-off"></i> {{ __('Sicherung fliegt raus') }}</button>
                            <button type="button" class="lk-option-btn" data-problem="other"><i class="fa-solid fa-circle-question"></i> {{ __('Sonstiges') }}</button>
                        </div>
                    </div>

                    <div class="lk-callback-panel" data-step="2">
                        <h3 style="text-align:center;margin:0 0 6px;">{{ __('In welchem Gebiet sind Sie?') }}</h3>
                        <input type="text" name="postal_code" id="lk-postal-code" class="lk-form-control" placeholder="{{ __('Postleitzahl') }}" required>
                        <div class="lk-callback-nav">
                            <button type="button" class="lk-btn lk-btn-outline-light" data-action="back">{{ __('Zurück') }}</button>
                            <button type="button" class="lk-btn lk-btn-primary" data-action="next-2">{{ __('Weiter') }}</button>
                        </div>
                    </div>

                    <div class="lk-callback-panel" data-step="3">
                        <h3 style="text-align:center;margin:0 0 6px;">{{ __('Ihre Kontaktdaten') }}</h3>
                        <div class="lk-form-row">
                            <input type="text" name="name" class="lk-form-control" placeholder="{{ __('Ihr Name') }}" required>
                            <input type="tel" name="phone" class="lk-form-control" placeholder="{{ __('Telefonnummer') }}" required>
                        </div>
                        <input type="email" name="email" class="lk-form-control" placeholder="{{ __('E-Mail (optional)') }}">
                        <div class="lk-callback-nav">
                            <button type="button" class="lk-btn lk-btn-outline-light" data-action="back">{{ __('Zurück') }}</button>
                            <button type="submit" class="lk-btn lk-btn-primary" data-action="submit">{{ __('Rückruf anfordern') }}</button>
                        </div>
                    </div>

                    <div class="lk-callback-panel" data-step="4">
                        <div class="lk-thanks">
                            <i class="fa-solid fa-circle-check"></i>
                            <h3>{{ __('Vielen Dank!') }}</h3>
                            <p>{{ __('Wir haben Ihre Anfrage erhalten und melden uns in Kürze bei Ihnen.') }}</p>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
</section>
