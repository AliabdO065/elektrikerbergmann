<footer class="lk-footer">
    <div class="lk-container">
        <div class="lk-footer-grid">
            <div>
                <h4>{{ $settings->company_name ?? 'Elektriker Bergmann' }}</h4>
                <p style="max-width:320px;">{{ $settings->footer_description ?? __('Elektro-Notdienst in Köln und Umgebung — Meisterbetrieb seit 1993.') }}</p>
                @if($settings->certifications_text ?? null)
                    <p style="font-size:.85rem;">{{ $settings->certifications_text }}</p>
                @endif
            </div>
            <div>
                <h4>{{ __('Kontakt') }}</h4>
                <ul>
                    @if($settings->company_address ?? null)
                        <li><i class="fa-solid fa-location-dot"></i> {{ $settings->company_address }}</li>
                    @endif
                    @if($settings->phone_display ?? null)
                        <li><a href="tel:{{ $settings->phone_href }}"><i class="fa-solid fa-phone"></i> {{ $settings->phone_display }}</a></li>
                    @endif
                    @if($settings->company_email ?? null)
                        <li><a href="mailto:{{ $settings->company_email }}"><i class="fa-solid fa-envelope"></i> {{ $settings->company_email }}</a></li>
                    @endif
                    @php
                        $socialLinks = [
                            'facebook_url' => 'fa-facebook-f',
                            'instagram_url' => 'fa-instagram',
                            'twitter_url' => 'fa-x-twitter',
                            'youtube_url' => 'fa-youtube',
                        ];
                        $socialLinks = collect($socialLinks)
                            ->map(fn ($icon, $field) => ['url' => $settings->{$field} ?? null, 'icon' => $icon])
                            ->filter(fn ($s) => filter_var($s['url'], FILTER_VALIDATE_URL));
                    @endphp
                    @foreach($socialLinks as $social)
                        @php
                            $display = preg_replace('#^https?://(www\.)?#i', '', $social['url']);
                            $display = rtrim($display, '/');
                        @endphp
                        <li><a href="{{ $social['url'] }}" target="_blank" rel="noopener"><i class="fa-brands {{ $social['icon'] }}"></i> {{ $display }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h4>{{ __('Rechtliches') }}</h4>
                <ul>
                    <li><a href="{{ $settings->impressum_url ?: '#' }}">{{ __('Impressum') }}</a></li>
                    <li><a href="{{ $settings->privacy_url ?: '#' }}">{{ __('Datenschutzerklärung') }}</a></li>
                    <li><a href="{{ $settings->terms_url ?: '#' }}">{{ __('AGB') }}</a></li>
                </ul>
            </div>
        </div>

        <div class="lk-footer-bottom">
            <span>&copy; {{ date('Y') }} {{ $settings->company_name ?? 'Elektriker Bergmann' }}</span>
            <span>{{ __('Alle Rechte vorbehalten') }}</span>
        </div>
    </div>
</footer>
