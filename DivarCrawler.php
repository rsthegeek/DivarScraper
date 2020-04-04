<?php

namespace App;

class DivarCrawler
{
    const BASE_URL = 'https://api.divar.ir/v8/web-search/:city?q=:query';
    const BASE_LINK = 'https://divar.ir/v/:token';


    const CITIES = [
        'high' => [
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
            "arak" => 'اراک',
            "hamedan" => 'همدان',
            "bushehr" => 'بوشهر',
            "gorgan" => 'گرگان',
            "kerman" => 'کرمان',
        ],
        'low' => [
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
            "kelachay" => 'کلاچای',
            "kangavar" => 'کنگاور',
            "kuhdasht" => 'کوهدشت',
            "kish" => 'کیش',
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
            "yasuj" => 'یاسوج',
            "yazd" => 'یزد',
        ]
    ];

    const OBJECTIVES = [
        'high' => [
            'پروسسور',
            'helix',
            'هلیکس',
            'mosconi',
            'ماسکونی',
            'zapco',
            'زپکو',
            'زاپکو',
        ],
        'low' => [
            'focal',
            'فوکال',
            'groundzero',
            'ground zero',
            'گرند زیرو',
            'گرندزیرو',
            'اورانیوم',
            'rockford',
            'راکفورد',
            'dynaudio',
            'داین',
            'dls',
            'audison',
            'آدیسان',
            'hertz',
            'هرتز',
            'کلاریون',
            'clarion',
            'JL',
        ],
    ];
    const STATES_FILENAME = 'states.dat';

    /**
     * @var array | null
     */
    protected $handledTokens;

    /**
     * @var array | null
     */
    protected $lastStates;

    /**
     * @var Telegram
     */
    protected $telegram;

    /**
     * @var string
     */
    protected $cityPriority;

    /**
     * @var string
     */
    protected $objectivePriority;

    public function __construct(
        ?Telegram $telegram = null,
        string $cityPriority,
        string $objectivePriority
    ) {
        $this->telegram = is_null($telegram) ? new Telegram : $telegram;

        if (!in_array($cityPriority, array_keys(self::CITIES))) {
            throw new \Exception("cityPriority '{$cityPriority}' is not valid.");
        }
        $this->cityPriority = $cityPriority;

        if (!in_array($objectivePriority, array_keys(self::OBJECTIVES))) {
            throw new \Exception("objectivePriority '{$objectivePriority}' is not valid.");
        }
        $this->objectivePriority = $objectivePriority;

        $this->lastStates = file_exists(Util::getPathOf(self::STATES_FILENAME))
            ? include Util::getPathOf(self::STATES_FILENAME) : [];
    }

    public function crawl()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:75.0) Gecko/20100101 Firefox/75.0',
        ]);

        foreach (static::OBJECTIVES[$this->objectivePriority] as $objective) {
            foreach (static::CITIES[$this->cityPriority] as $citySlug => $cityTitle) {
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
            $token = Util::object_get($item, 'data.token');
            if (!is_null($lastToken) && $token == $lastToken) {
                return $newLastToken;
            }
            if (in_array($token, $this->handledTokens)) {
                continue;
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
            $link = str_replace(':token', $token, self::BASE_LINK);
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
