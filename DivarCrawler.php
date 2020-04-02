<?php

namespace App;

class DivarCrawler
{
    const BASE_URL = 'https://api.divar.ir/v8/web-search/:city?q=:query';
    const BASE_LINK = 'https://divar.ir/v/:token';


    const CITIES = [
        "tehran" => 'تهران',
        "mashhad" => 'مشهد',
        "karaj" => 'کرج',
        "shiraz" => 'شیراز',
        "isfahan" => 'اصفهان',
        "ahvaz" => 'اهواز',
        "tabriz" => 'تبریز',
        "kermanshah" => 'کرمانشاه',
        "qom" => 'قم',
        "rasht" => 'رشت',

        "abadan" => 'آبادان',
        "abadeh" => 'آباده',
        "abdanan" => 'آبدانان',
        "abyek" => 'آبیک',
        "azarshahr" => 'آذرشهر',
        "astara" => 'آستارا',
        "astaneh-ashrafiyeh" => 'آستانه اشرفیه',
        "ashkhaneh" => 'آشخانه',
        "aq-qala" => 'آق قلا',
        "amol" => 'آمل',
        "abhar" => 'ابهر',
        "arak" => 'اراک',
        "ardabil" => 'اردبیل',
        "ardakan" => 'اردکان',
        "urmia" => 'ارومیه',
        "azna" => 'ازنا',
        "asadabad" => 'اسدآباد',
        "esfarāyen" => 'اسفراین',
        "eslamabad-gharb" => 'اسلام‌‌آباد غرب',
        "eslamshahr" => 'اسلام‌شهر',
        "oshnavieh" => 'اشنویه',
        "alvand" => 'الوند',
        "aligudarz" => 'الیگودرز',
        "andimeshk" => 'اندیمشک',
        "ahar" => 'اهر',
        "izeh" => 'ایذه',
        "iranshahr" => 'ایرانشهر',
        "ilam" => 'ایلام',
        "eyvan" => 'ایوان',
        "babol" => 'بابل',
        "babolsar" => 'بابلسر',
        "baneh" => 'بانه',
        "bojnurd" => 'بجنورد',
        "borazjan" => 'برازجان',
        "borujerd" => 'بروجرد',
        "boroujen" => 'بروجن',
        "bam" => 'بم',
        "bonab" => 'بناب',
        "bandar-imam-khomeini" => 'بندر امام خمینی',
        "bandar-anzali" => 'بندر انزلی',
        "bandar-torkaman" => 'بندر ترکمن',
        "bandar-abbas" => 'بندرعباس',
        "bandar-kangan" => 'بندر کنگان',
        "bandar-ganaveh" => 'بندر گناوه',
        "bandar-mahshahr" => 'بندر ماهشهر',
        "bushehr" => 'بوشهر',
        "bukan" => 'بوکان',
        "behbahan" => 'بهبهان',
        "behshahr" => 'بهشهر',
        "bijar" => 'بیجار',
        "birjand" => 'بیرجند',
        "parsabad" => 'پارس‌آباد',
        "piranshahr" => 'پیرانشهر',
        "pishva" => 'پیشوا',
        "takestan" => 'تاکستان',
        "talesh" => 'تالش',
        "torbat-jam" => 'تربت جام',
        "tonekabon" => 'تنکابن',
        "tuyserkan" => 'تویسرکان',
        "javanrud" => 'جوانرود',
        "juybar" => 'جویبار',
        "jahrom" => 'جهرم',
        "jiroft" => 'جیرفت',
        "chaboksar" => 'چابکسر',
        "chabahar" => 'چابهار',
        "chalus" => 'چالوس',
        "chahar-dangeh" => 'چهاردانگه',
        "hamidia" => 'حمیدیا',
        "khorramabad" => 'خرم‌آباد',
        "khorramdarreh" => 'خرمدره',
        "khorramshahr" => 'خرمشهر',
        "khalkhal" => 'خلخال',
        "khomein" => 'خمین',
        "khoy" => 'خوی',
        "darab" => 'داراب',
        "damghan" => 'دامغان',
        "dezful" => 'دزفول',
        "damavand" => 'دماوند',
        "dorud" => 'دورود',
        "dogonbadan" => 'دوگنبدان',
        "dehdasht" => 'دهدشت',
        "dehloran" => 'دهلران',
        "ramsar" => 'رامسر',
        "ramhormoz" => 'رامهرمز',
        "rafsanjan" => 'رفسنجان',
        "rudsar" => 'رودسر',
        "zabol" => 'زابل',
        "zahedan" => 'زاهدان',
        "zarand" => 'زرند',
        "zanjan" => 'زنجان',
        "sari" => 'ساری',
        "saveh" => 'ساوه',
        "sabzevar" => 'سبزوار',
        "sarab" => 'سراب',
        "saravan" => 'سراوان-سیستان و بلوچستان',
        "sarpol-zahab" => 'سرپل ذهاب',
        "sardasht" => 'سردشت',
        "saqqez" => 'سقز',
        "salmas" => 'سلماس',
        "semnan" => 'سمنان',
        "sonqor" => 'سنقر',
        "sanandaj" => 'سنندج',
        "susangerd" => 'سوسنگرد',
        "sahand" => 'سهند',
        "siahkal" => 'سیاهکل',
        "sirjan" => 'سیرجان',
        "shahroud" => 'شاهرود',
        "shahin-dej" => 'شاهین دژ',
        "shush" => 'شوش',
        "shooshtar" => 'شوشتر',
        "sadra" => 'صدرا-فارس',
        "shahrekord" => 'شهرکرد',
        "shirvan" => 'شیروان',
        "someh-sara" => 'صومعه‌سرا',
        "taleqan" => 'طالقان',
        "tabas" => 'طبس',
        "aliabad-katul" => 'علی‌آباد کتول',
        "farrokhshahr" => 'فرخ‌شهر',
        "ferdows" => 'فردوس',
        "fereydunkenar" => 'فریدون‌کنار',
        "falavarjan" => 'فلاورجان',
        "fuman" => 'فومن',
        "qaemshahr" => 'قائم‌شهر',
        "ghayen" => 'قاين',
        "qorveh" => 'قروه',
        "qazvin" => 'قزوین',
        "qeshm" => 'قشم',
        "qeydar" => 'قیدار',
        "kashan" => 'کاشان',
        "kordkuy" => 'کردکوی',
        "kerman" => 'کرمان',
        "kelachay" => 'کلاچای',
        "kangavar" => 'کنگاور',
        "kuhdasht" => 'کوهدشت',
        "kish" => 'کیش',
        "gorgan" => 'گرگان',
        "garmsar" => 'گرمسار',
        "golpayegan" => 'گلپایگان',
        "gomishan" => 'گمیشان',
        "gonabad" => 'گناباد',
        "gonbad-kavus" => 'گنبد کاووس',
        "lahijan" => 'لاهیجان',
        "lordegan" => 'لردگان',
        "langarud" => 'لنگرود',
        "masal" => 'ماسال',
        "maku" => 'ماکو',
        "mahalat" => 'محلات',
        "mohammadiyeh" => 'محمدیه-قزوین',
        "mahmudabad" => 'محمودآباد',
        "maragheh" => 'مراغه',
        "marand" => 'مرند',
        "marivan" => 'مریوان',
        "masjed-soleyman" => 'مسجد سلیمان',
        "meshgin-shahr" => 'مشکین‌شهر',
        "malayer" => 'ملایر',
        "mahabad" => 'مهاباد',
        "miandoab" => 'میاندوآب',
        "mianeh" => 'میانه',
        "meybod" => 'میبد',
        "minab" => 'میناب',
        "najafabad" => 'نجف‌آباد',
        "nasimshahr" => 'نسیم‌شهر',
        "nazarabad" => 'نظرآباد',
        "naqadeh" => 'نقده',
        "neka" => 'نکا',
        "nur" => 'نور',
        "nurabad" => 'نورآباد',
        "nowshahr" => 'نوشهر',
        "nahavand" => 'نهاوند',
        "neyshabur" => 'نیشابور',
        "hamedan" => 'همدان',
        "yasuj" => 'یاسوج',
        "yazd" => 'یزد',
    ];

    const OBJECTIVES = [
        'helix',
        'هلیکس',
        'mosconi',
        'ماسکونی',
        'focal',
        'فوکال',
        'groundzero',
        'ground zero',
        'گرندزیرو',
        'rockford',
        'راکفورد',
        'zapco',
        'زپکو',
        'زاپکو',
        'dynaudio',
        'داین',
        'dls',
        'audison',
        'آدیسان',
    ];
    const STATES_FILENAME = 'states.dat';

    /**
     * @var array | null
     */
    protected $lastStates;

    /**
     * @var Telegram
     */
    protected $telegram;

    public function __construct(?Telegram $telegram = null)
    {
        $this->telegram = is_null($telegram) ? new Telegram : $telegram;
        $this->lastStates = file_exists(Util::getPathOf(self::STATES_FILENAME))
            ? include(Util::getPathOf(self::STATES_FILENAME)) : [];
    }

    public function crawl()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:75.0) Gecko/20100101 Firefox/75.0',
        ]);

        foreach (static::OBJECTIVES as $objective) {
            foreach (static::CITIES as $citySlug => $cityTitle) {
                $lastToken = Util::array_get($this->lastStates, "{$objective}.{$citySlug}");
                echo "searching `$objective` in `{$citySlug}` with lastToken `{$lastToken}`..." . PHP_EOL;

                $urlToCall = str_replace([':city', ':query'], [$citySlug, urlencode($objective)], static::BASE_URL);
                curl_setopt($curl, CURLOPT_URL, $urlToCall);
                $response = json_decode(curl_exec($curl));
                if (is_null($response)) {
                    continue;
                }
                $this->lastStates[$objective][$citySlug] = $this
                    ->handleResponseAndGetLastToken($response, $lastToken, $objective);
            }
        }
        $this->writeNewStatesToFile();
        curl_close($curl);
    }

    /**
     * @param object $response
     * @param string|null $lastToken
     * @return string|null
     */
    protected function handleResponseAndGetLastToken(object $response, ?string $lastToken, string $objective): ?string
    {
        $newLastToken = Util::object_get($response->widget_list[0] ?? [], 'data.token');
        foreach ($response->widget_list as $item) {
            if (!is_null($lastToken) && Util::object_get($item, 'data.token') == $lastToken) {
                return $newLastToken;
            }
            /*
                city: "تهران"
                district: "میدان آزادی"
                category: "قطعات یدکی و لوازم جانبی خودرو"
                title: "مزایده امپلی فایر هلیکس المان مدل d4"
                token: "gX_d4u0b"
                image: "https://s101.divarcdn.com/static/thumbnails/1585754051/gX_d4u0b.jpg"
                description: "توافقی"
                has_chat: false
                image_overlay_tag: null
                normal_text: "در میدان آزادی"
                red_text: "فوری "
             */
            $link = str_replace(':token', Util::object_get($item, 'data.token'), self::BASE_LINK);
            $text = '<i>' . Util::object_get($item, 'data.city', 'شهر') . '، '
                . Util::object_get($item, 'data.district', '<del>:منطقه:</del>') . '</i>' . PHP_EOL
                . '<b><a href="' . $link . '">' . Util::object_get($item, 'data.title', '???') . '</a></b>' . PHP_EOL
                . Util::object_get($item, 'data.description', '???') . PHP_EOL . PHP_EOL
                . '#' . Util::object_get($item, 'data.city', 'شهر') . " #" . str_replace(' ', '_', $objective);
            $image = Util::object_get($item, 'data.image');
            is_null($image) ? $this->telegram->sendMessage($text) : $this->telegram->sendPhoto($image, $text);
        }
        return $newLastToken;
    }

    protected function writeNewStatesToFile()
    {
        return file_put_contents(
            Util::getPathOf(self::STATES_FILENAME),
            '<?php' . PHP_EOL . 'return ' . var_export($this->lastStates, true) . ';'
        );
    }
}
