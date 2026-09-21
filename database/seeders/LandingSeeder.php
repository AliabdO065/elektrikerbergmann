<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandingSeeder extends Seeder
{
    protected function t(string $de, string $en, string $ar): string
    {
        return json_encode(['de' => $de, 'en' => $en, 'ar' => $ar], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function run(): void
    {
        if (DB::table('languages')->count() === 0) {
            DB::table('languages')->insert([
                ['code' => 'de', 'name' => 'German', 'native_name' => 'Deutsch', 'is_enabled' => true, 'is_default' => true, 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['code' => 'en', 'name' => 'English', 'native_name' => 'English', 'is_enabled' => true, 'is_default' => false, 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['code' => 'ar', 'name' => 'Arabic', 'native_name' => 'العربية', 'is_enabled' => true, 'is_default' => false, 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        if (DB::table('landing_settings')->count() === 0) {
            DB::table('landing_settings')->insert([
                'alert_banner_active' => true,
                'alert_banner_text' => $this->t(
                    'Aktuell erhöhtes Anrufaufkommen in Berlin — unser Notdienst-Team ist trotzdem in ca. 30 Minuten bei Ihnen.',
                    'Currently high call volume in Cologne — our emergency team still reaches you in about 30 minutes.',
                    'حاليًا هناك ضغط كبير على الاتصالات في كولونيا — لا يزال فريق الطوارئ لدينا يصل إليك خلال حوالي 30 دقيقة.'
                ),
                'logo_image' => null,
                'phone_display' => '0221 1234567',
                'phone_href' => '+492211234567',
                'hero_headline' => $this->t(
                    'Elektriker in Ihrer Nähe — in 30 Min. vor Ort',
                    'Electrician near you — on-site in 30 minutes',
                    'كهربائي بالقرب منك — نصل خلال 30 دقيقة'
                ),
                'hero_subheadline' => $this->t(
                    'Elektro-Notdienst Berlin — Meisterbetrieb seit 1993. Rund um die Uhr erreichbar, transparente Preise vor Arbeitsbeginn.',
                    'Emergency electrician service in Cologne — master craftsman business since 1993. Available around the clock, transparent pricing before work begins.',
                    'خدمة الطوارئ الكهربائية في كولونيا — شركة حرفية معتمدة منذ عام 1993. متاحون على مدار الساعة، وأسعار واضحة قبل بدء العمل.'
                ),
                'hero_cta_label' => $this->t('Jetzt anrufen', 'Call now', 'اتصل الآن'),
                'hero_image' => null,
                'rating_value' => 4.9,
                'rating_count' => 512,
                'about_owner_name' => 'Jörg Bergmann',
                'about_owner_photo' => null,
                'about_story' => $this->t(
                    'Seit 1993 sorgt unser Meisterbetrieb in Berlin und Umgebung für sichere Elektroinstallationen. Was als Ein-Mann-Betrieb begann, ist heute ein eingespieltes Team erfahrener Elektromeister und Gesellen — mit demselben Anspruch wie am ersten Tag: ehrliche Beratung, saubere Arbeit, faire Preise.',
                    'Since 1993, our master craftsman business has kept homes in Cologne and the surrounding area electrically safe. What began as a one-man operation is now a well-coordinated team of experienced electrical master craftsmen and journeymen — with the same standard as on day one: honest advice, clean work, fair prices.',
                    'منذ عام 1993، تحرص شركتنا الحرفية على سلامة التمديدات الكهربائية في كولونيا والمناطق المحيطة بها. بدأنا كعمل فردي، وأصبحنا اليوم فريقًا متكاملًا من كهربائيين معتمدين ذوي خبرة — بنفس المعايير التي بدأنا بها: استشارة صادقة، عمل نظيف، وأسعار عادلة.'
                ),
                'trust_1_title' => $this->t('Geprüftes Team', 'Vetted team', 'فريق موثوق'),
                'trust_1_text' => $this->t(
                    'Alle Mitarbeiter sind festangestellt, ausgebildet und polizeilich überprüft.',
                    'All staff are permanently employed, trained, and background-checked.',
                    'جميع الموظفين معينون بشكل دائم ومدربون وتم التحقق من سجلهم.'
                ),
                'trust_2_title' => $this->t('Ein fester Ansprechpartner', 'One point of contact', 'جهة اتصال واحدة ثابتة'),
                'trust_2_text' => $this->t(
                    'Von der ersten Anfrage bis zur Rechnung — eine Kontaktperson für Sie.',
                    'From your first inquiry to the invoice — a single contact person for you.',
                    'من أول استفسار حتى الفاتورة — شخص تواصل واحد لك.'
                ),
                'trust_3_title' => $this->t('Preis vor Arbeitsbeginn', 'Price before work starts', 'السعر قبل بدء العمل'),
                'trust_3_text' => $this->t(
                    'Sie erfahren die Kosten, bevor wir mit der Arbeit beginnen — keine Überraschungen.',
                    "You'll know the cost before we begin work — no surprises.",
                    'ستعرف التكلفة قبل أن نبدأ العمل — بدون مفاجآت.'
                ),
                'trust_4_title' => $this->t('Bis zu 5 Mio. € Haftpflicht', 'Up to €5M liability cover', 'تأمين مسؤولية حتى 5 ملايين يورو'),
                'trust_4_text' => $this->t(
                    'Jeder Einsatz ist über unsere Betriebshaftpflicht bis 5 Mio. € abgesichert.',
                    'Every job is covered by our business liability insurance up to €5 million.',
                    'كل مهمة مغطاة بتأمين المسؤولية الخاص بشركتنا حتى 5 ملايين يورو.'
                ),
                'company_name' => $this->t('Elektriker Bergmann', 'Elektriker Bergmann', 'إلكتريكر بيرجمان'),
                'company_address' => 'Musterstraße 12, 50667 Berlin',
                'company_email' => 'info@elektriker-bergmann.de',
                'certifications_text' => $this->t(
                    'Meisterbetrieb der Elektro-Innung Berlin · Mitglied der Handwerkskammer Berlin',
                    'Master craftsman member of the Cologne Electrical Guild · Member of the Cologne Chamber of Skilled Crafts',
                    'عضو نقابة الكهربائيين المعتمدين في كولونيا · عضو غرفة الحرف اليدوية في كولونيا'
                ),
                'footer_description' => $this->t(
                    'Elektro-Notdienst in Berlin und Umgebung — Meisterbetrieb seit 1993.',
                    'Emergency electrician service in Cologne and the surrounding area — master craftsman business since 1993.',
                    'خدمة الطوارئ الكهربائية في كولونيا والمناطق المحيطة — شركة حرفية معتمدة منذ عام 1993.'
                ),
                'navbar_show_brand_text' => true,
                'navbar_brand_text' => $this->t('Elektriker Bergmann', 'Elektriker Bergmann', 'إلكتريكر بيرجمان'),
                'impressum_url' => null,
                'privacy_url' => null,
                'terms_url' => null,
                'hero_badge_text' => $this->t(
                    'Meisterbetrieb seit 1993 · 24/7 erreichbar',
                    'Master craftsman business since 1993 · Available 24/7',
                    'شركة حرفية معتمدة منذ 1993 · متاحون على مدار الساعة'
                ),
                'hero_secondary_cta_label' => $this->t('Rückruf anfordern', 'Request a callback', 'اطلب معاودة الاتصال'),
                'about_eyebrow' => $this->t('Über uns', 'About us', 'من نحن'),
                'about_heading' => $this->t(
                    'Ein Meisterbetrieb, dem Berlin seit 1993 vertraut',
                    'A master craftsman business Cologne has trusted since 1993',
                    'شركة حرفية تثق بها كولونيا منذ عام 1993'
                ),
                'services_eyebrow' => $this->t('Unsere Notdienst-Leistungen', 'Our emergency services', 'خدمات الطوارئ لدينا'),
                'services_heading' => $this->t(
                    'Egal was passiert ist — wir sind in ca. 30 Minuten da',
                    "Whatever happened — we're on-site in about 30 minutes",
                    'مهما حدث — نصل خلال حوالي 30 دقيقة'
                ),
                'services_subheading' => $this->t(
                    'Die drei häufigsten Notfälle, mit denen uns unsere Kunden in Berlin erreichen.',
                    'The three most common emergencies our customers in Cologne call us about.',
                    'أكثر ثلاث حالات طوارئ يتواصل بها عملاؤنا في كولونيا معنا.'
                ),
                'steps_eyebrow' => $this->t("So einfach geht's", "It's this simple", 'بهذه البساطة'),
                'steps_heading' => $this->t(
                    'In 3 Schritten wieder sicher mit Strom versorgt',
                    'Power restored safely in 3 steps',
                    'استعادة التيار الكهربائي بأمان في 3 خطوات'
                ),
                'comparison_eyebrow' => $this->t('Der Unterschied', 'The difference', 'الفرق'),
                'comparison_heading' => $this->t(
                    'Echter Meisterbetrieb oder Notdienst-Abzocke?',
                    'Real master craftsman or emergency-service scam?',
                    'شركة حرفية حقيقية أم احتيال خدمات طوارئ؟'
                ),
                'comparison_subheading' => $this->t(
                    'Leider gibt es in der Branche schwarze Schafe. So erkennen Sie einen seriösen Betrieb.',
                    "Unfortunately there are bad actors in this industry. Here's how to spot a trustworthy business.",
                    'للأسف توجد جهات غير موثوقة في هذا المجال. إليك كيف تتعرف على شركة موثوقة.'
                ),
                'reviews_eyebrow' => $this->t('Kundenstimmen', 'Customer voices', 'آراء العملاء'),
                'reviews_heading' => $this->t('Was unsere Kunden sagen', 'What our customers say', 'ماذا يقول عملاؤنا'),
                'faq_eyebrow' => $this->t('Häufige Fragen', 'Frequently asked questions', 'الأسئلة الشائعة'),
                'faq_heading' => $this->t('Gut zu wissen', 'Good to know', 'معلومات مفيدة'),
                'callback_eyebrow' => $this->t(
                    'Kein Notfall, aber Beratungsbedarf?',
                    'Not an emergency, but need advice?',
                    'ليست حالة طارئة لكن تحتاج استشارة؟'
                ),
                'callback_heading' => $this->t('Rückruf anfordern', 'Request a callback', 'اطلب معاودة الاتصال'),
                'callback_subtext' => $this->t(
                    'Sagen Sie uns kurz, worum es geht — wir rufen Sie zeitnah zurück.',
                    "Tell us briefly what's going on — we'll call you back promptly.",
                    'أخبرنا بإيجاز عن المشكلة — سنعاود الاتصال بك قريبًا.'
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if (DB::table('landing_stats')->count() === 0) {
            DB::table('landing_stats')->insert([
                ['value' => '45+', 'label' => $this->t('Jahre Erfahrung', 'years of experience', 'سنوات خبرة'), 'icon' => 'fa-award', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['value' => '12.000+', 'label' => $this->t('abgeschlossene Einsätze', 'completed jobs', 'مهمة منجزة'), 'icon' => 'fa-bolt', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['value' => '30 Min.', 'label' => $this->t('durchschnittliche Ankunftszeit', 'average arrival time', 'متوسط وقت الوصول'), 'icon' => 'fa-clock', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
                ['value' => '4,9 ★', 'label' => $this->t('512+ Google-Bewertungen', '512+ Google reviews', '+512 تقييم على جوجل'), 'icon' => 'fa-star', 'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ]);
        }

        if (DB::table('landing_services')->count() === 0) {
            DB::table('landing_services')->insert([
                [
                    'title' => $this->t('Stromausfall', 'Power Outage', 'انقطاع الكهرباء'),
                    'description' => $this->t(
                        'Plötzlich kein Strom mehr? Wir finden die Ursache — ob Zählerschrank, Leitung oder Netzanschluss — und sorgen schnellstmöglich wieder für Licht.',
                        "Suddenly no power? We find the cause — whether it's the meter cabinet, a line, or the grid connection — and get your lights back on as fast as possible.",
                        'انقطع التيار فجأة؟ نحدد السبب — سواء كان في لوحة العداد أو الأسلاك أو التوصيل بالشبكة — ونعيد الإضاءة في أسرع وقت ممكن.'
                    ),
                    'icon' => 'fa-plug-circle-xmark', 'image' => null, 'sort_order' => 1, 'is_active' => true,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'title' => $this->t('Kurzschluss & Brandgeruch', 'Short Circuit & Burning Smell', 'ماس كهربائي ورائحة احتراق'),
                    'description' => $this->t(
                        'Brandgeruch oder Funken an der Steckdose sind ein Notfall. Unsere Elektriker sichern die Anlage sofort und beheben die Gefahrenquelle fachgerecht.',
                        'A burning smell or sparks at an outlet is an emergency. Our electricians secure the system immediately and professionally fix the source of danger.',
                        'رائحة احتراق أو شرر من مقبس كهربائي حالة طوارئ. يقوم كهربائيونا بتأمين النظام فورًا ومعالجة مصدر الخطر باحترافية.'
                    ),
                    'icon' => 'fa-fire-flame-simple', 'image' => null, 'sort_order' => 2, 'is_active' => true,
                    'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'title' => $this->t('Sicherung fliegt raus', 'Breaker Keeps Tripping', 'قاطع الكهرباء يفصل باستمرار'),
                    'description' => $this->t(
                        'Wenn die Sicherung immer wieder auslöst, steckt meist mehr dahinter als eine Überlastung. Wir diagnostizieren und beheben das Problem dauerhaft.',
                        "If the breaker keeps tripping, there's usually more behind it than just an overload. We diagnose and fix the problem permanently.",
                        'عندما يفصل القاطع بشكل متكرر، غالبًا يكون هناك سبب أعمق من مجرد الحمل الزائد. نقوم بتشخيص المشكلة وحلها بشكل دائم.'
                    ),
                    'icon' => 'fa-toggle-off', 'image' => null, 'sort_order' => 3, 'is_active' => true,
                    'created_at' => now(), 'updated_at' => now(),
                ],
            ]);
        }

        if (DB::table('landing_steps')->count() === 0) {
            DB::table('landing_steps')->insert([
                [
                    'step_number' => 1,
                    'title' => $this->t('Sie rufen an', 'You call us', 'تتصل بنا'),
                    'description' => $this->t(
                        'Schildern Sie kurz das Problem — unser Team ist 24/7 erreichbar und nennt Ihnen direkt einen Zeitrahmen.',
                        'Briefly describe the problem — our team is available 24/7 and gives you a time frame right away.',
                        'صف المشكلة بإيجاز — فريقنا متاح على مدار الساعة طوال أيام الأسبوع وسيخبرك بالوقت المتوقع للوصول فورًا.'
                    ),
                    'image' => null, 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'step_number' => 2,
                    'title' => $this->t('Der Elektriker kommt', 'The electrician arrives', 'يصل الكهربائي'),
                    'description' => $this->t(
                        'In der Regel innerhalb von 30 Minuten ist ein Meisterbetrieb-Elektriker bei Ihnen vor Ort und prüft die Lage.',
                        'Usually within 30 minutes, a master-craftsman electrician is on-site and assesses the situation.',
                        'عادةً خلال 30 دقيقة، يصل كهربائي معتمد إلى موقعك ويقيّم الوضع.'
                    ),
                    'image' => null, 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'step_number' => 3,
                    'title' => $this->t('Der Strom ist wieder da', 'Power is restored', 'يعود التيار الكهربائي'),
                    'description' => $this->t(
                        'Nach transparenter Preisabsprache beheben wir das Problem fachgerecht — mit Rechnung und Gewährleistung.',
                        'After agreeing on a transparent price, we fix the problem professionally — with an invoice and warranty.',
                        'بعد الاتفاق على سعر واضح، نقوم بإصلاح المشكلة باحترافية — مع فاتورة وضمان.'
                    ),
                    'image' => null, 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now(),
                ],
            ]);
        }

        if (DB::table('landing_comparisons')->count() === 0) {
            DB::table('landing_comparisons')->insert([
                [
                    'criterion' => $this->t('Wer kommt zu Ihnen?', 'Who shows up?', 'من الذي سيأتي إليك؟'),
                    'us_value' => $this->t('Fest angestellter, geprüfter Elektromeister', 'Permanently employed, vetted master electrician', 'كهربائي معتمد موظف بشكل دائم وتم التحقق منه'), 'us_is_positive' => true,
                    'them_value' => $this->t('Anonymer Subunternehmer, oft ohne Qualifikationsnachweis', 'Anonymous subcontractor, often without proof of qualification', 'مقاول من الباطن مجهول، غالبًا بدون إثبات كفاءة'), 'them_is_positive' => false,
                    'sort_order' => 1, 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'criterion' => $this->t('Diagnose', 'Diagnosis', 'التشخيص'),
                    'us_value' => $this->t('Systematische Fehlersuche vor Ort', 'Systematic on-site troubleshooting', 'تشخيص منهجي للمشكلة في الموقع'), 'us_is_positive' => true,
                    'them_value' => $this->t('"Pauschal-Reparatur" ohne echte Ursachenklärung', '"Flat-rate repair" without real root-cause diagnosis', '"إصلاح شامل" بدون تحديد السبب الحقيقي'), 'them_is_positive' => false,
                    'sort_order' => 2, 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'criterion' => $this->t('Preisgestaltung', 'Pricing', 'التسعير'),
                    'us_value' => $this->t('Festpreis vor Arbeitsbeginn, schriftlich', 'Fixed price in writing before work starts', 'سعر ثابت وموثق قبل بدء العمل'), 'us_is_positive' => true,
                    'them_value' => $this->t('Überraschungsrechnung nach getaner Arbeit', 'Surprise invoice after the work is done', 'فاتورة مفاجئة بعد انتهاء العمل'), 'them_is_positive' => false,
                    'sort_order' => 3, 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'criterion' => $this->t('Geschäftlicher Hintergrund', 'Business background', 'الخلفية التجارية'),
                    'us_value' => $this->t('Eingetragener Meisterbetrieb seit 1993', 'Registered master craftsman business since 1993', 'شركة حرفية مسجلة منذ عام 1993'), 'us_is_positive' => true,
                    'them_value' => $this->t('Häufig ohne Meisterbrief, kurzlebige Briefkastenfirmen', 'Often without a master craftsman certificate, short-lived shell companies', 'غالبًا بدون شهادة حرفية، شركات وهمية قصيرة العمر'), 'them_is_positive' => false,
                    'sort_order' => 4, 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'criterion' => $this->t('Rechnungsstellung', 'Invoicing', 'الفوترة'),
                    'us_value' => $this->t('Nachvollziehbare, MwSt.-ausweisende Rechnung', 'Transparent invoice with VAT itemized', 'فاتورة واضحة تتضمن ضريبة القيمة المضافة'), 'us_is_positive' => true,
                    'them_value' => $this->t('Bar ohne Beleg oder überhöhte Sammelrechnung', 'Cash with no receipt, or an inflated lump-sum bill', 'دفع نقدي بدون إيصال أو فاتورة إجمالية مبالغ فيها'), 'them_is_positive' => false,
                    'sort_order' => 5, 'created_at' => now(), 'updated_at' => now(),
                ],
            ]);
        }

        if (DB::table('landing_reviews')->count() === 0) {
            $reviews = [
                ['Michael K.', 5, '-30 days',
                    'Nachts um 1 Uhr Stromausfall gehabt — innerhalb von 25 Minuten war jemand da. Sehr professionell und fair abgerechnet.',
                    'Had a power outage at 1am — someone was here within 25 minutes. Very professional and fairly billed.',
                    'انقطعت الكهرباء عندي الساعة الواحدة صباحًا — وصل شخص خلال 25 دقيقة. تعامل احترافي وفوترة عادلة.'],
                ['Sandra W.', 5, '-45 days',
                    'Kurzschluss in der Küche, es hat nach Rauch gerochen. Der Elektriker hat die Ursache sofort gefunden und alles sicher gemacht.',
                    'Short circuit in the kitchen, it smelled like smoke. The electrician found the cause immediately and made everything safe.',
                    'حدث ماس كهربائي في المطبخ ورائحة دخان. وجد الكهربائي السبب فورًا وأمّن كل شيء.'],
                ['Thomas B.', 4, '-60 days',
                    'Schnelle Reaktion und freundliches Auftreten. Der Preis wurde vorher klar kommuniziert, keine bösen Überraschungen.',
                    'Fast response and friendly attitude. The price was communicated clearly beforehand, no nasty surprises.',
                    'استجابة سريعة وتعامل ودود. تم توضيح السعر مسبقًا بدون أي مفاجآت.'],
                ['Julia H.', 5, '-90 days',
                    'Endlich mal ein Handwerker, der sich meldet, wenn er sagt, dass er sich meldet. Kann ich uneingeschränkt weiterempfehlen.',
                    "Finally a tradesperson who actually calls back when they say they will. Can recommend without reservation.",
                    'أخيرًا حرفي يلتزم بما يقوله. أنصح به بدون تردد.'],
                ['Andreas P.', 5, '-100 days',
                    'Sicherung ist ständig rausgeflogen, andere Firma hat es "repariert" und es kam wieder. Bergmann hat die echte Ursache gefunden.',
                    'The breaker kept tripping, another company "fixed" it and it came back. Bergmann found the real cause.',
                    'كان القاطع يفصل باستمرار، وقامت شركة أخرى بـ"إصلاحه" لكنه عاد. وجد بيرجمان السبب الحقيقي.'],
                ['Nicole S.', 4, '-120 days',
                    'Sehr kompetent und ordentlich gearbeitet. Etwas Wartezeit am Telefon, aber der Termin danach hat alles wieder gutgemacht.',
                    'Very competent and tidy work. A bit of a wait on the phone, but the appointment afterward made up for it.',
                    'عمل احترافي ونظيف. كان هناك بعض الانتظار على الهاتف، لكن الموعد بعد ذلك عوّض عن ذلك.'],
            ];
            $rows = [];
            foreach ($reviews as $i => [$name, $rating, $when, $de, $en, $ar]) {
                $rows[] = [
                    'author_name' => $name,
                    'author_photo' => null,
                    'rating' => $rating,
                    'review_date' => now()->modify($when)->toDateString(),
                    'review_text' => $this->t($de, $en, $ar),
                    'is_placeholder' => true,
                    'sort_order' => $i + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DB::table('landing_reviews')->insert($rows);
        }

        if (DB::table('landing_faqs')->count() === 0) {
            DB::table('landing_faqs')->insert([
                [
                    'question' => $this->t('Wie schnell seid ihr wirklich vor Ort?', 'How fast are you really on-site?', 'ما مدى سرعة وصولكم فعليًا؟'),
                    'answer' => $this->t(
                        'Im Berliner Stadtgebiet erreichen wir Sie im Schnitt innerhalb von 30 Minuten — rund um die Uhr, auch nachts und am Wochenende.',
                        'In the Cologne city area we typically reach you within 30 minutes — around the clock, including nights and weekends.',
                        'في منطقة كولونيا، نصل إليك عادةً خلال 30 دقيقة — على مدار الساعة، بما في ذلك الليل وعطلات نهاية الأسبوع.'
                    ),
                    'sort_order' => 1, 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'question' => $this->t('Wer kommt tatsächlich zu mir nach Hause?', 'Who actually comes to my home?', 'من الذي سيأتي فعليًا إلى منزلي؟'),
                    'answer' => $this->t(
                        'Ausschließlich fest angestellte, geprüfte Elektriker unseres Meisterbetriebs — keine anonymen Subunternehmer.',
                        'Only permanently employed, vetted electricians from our master craftsman business — never anonymous subcontractors.',
                        'فقط كهربائيون معتمدون وموظفون بشكل دائم في شركتنا — لا مقاولون مجهولون من الباطن أبدًا.'
                    ),
                    'sort_order' => 2, 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'question' => $this->t('Was kostet der Einsatz?', 'What does the call-out cost?', 'كم تكلفة الخدمة؟'),
                    'answer' => $this->t(
                        'Den Preis nennen wir Ihnen immer vor Arbeitsbeginn, auf Basis der Vor-Ort-Diagnose — ohne versteckte Zuschläge.',
                        'We always tell you the price before work begins, based on the on-site diagnosis — no hidden surcharges.',
                        'نخبرك دائمًا بالسعر قبل بدء العمل، بناءً على التشخيص في الموقع — بدون رسوم خفية.'
                    ),
                    'sort_order' => 3, 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'question' => $this->t('Wie kann ich bezahlen?', 'How can I pay?', 'كيف يمكنني الدفع؟'),
                    'answer' => $this->t(
                        'Per EC-/Kreditkarte, Überweisung oder bar gegen ordnungsgemäße Rechnung — Sie erhalten immer einen Beleg.',
                        "By card, bank transfer, or cash against a proper invoice — you'll always receive a receipt.",
                        'بالبطاقة أو التحويل البنكي أو نقدًا مقابل فاتورة رسمية — ستحصل دائمًا على إيصال.'
                    ),
                    'sort_order' => 4, 'created_at' => now(), 'updated_at' => now(),
                ],
                [
                    'question' => $this->t('Gibt es eine Garantie auf die Arbeit?', 'Is there a warranty on the work?', 'هل هناك ضمان على العمل؟'),
                    'answer' => $this->t(
                        'Ja, auf alle durchgeführten Reparaturen gewähren wir gesetzliche Gewährleistung sowie unsere Betriebshaftpflicht bis 5 Mio. €.',
                        'Yes, all repairs are covered by statutory warranty as well as our business liability insurance up to €5 million.',
                        'نعم، جميع الإصلاحات مشمولة بالضمان القانوني بالإضافة إلى تأمين المسؤولية الخاص بشركتنا حتى 5 ملايين يورو.'
                    ),
                    'sort_order' => 5, 'created_at' => now(), 'updated_at' => now(),
                ],
            ]);
        }
    }
}
