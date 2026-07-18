<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
        // User::factory(10)->create();


    // اول دسته بندی ها رو میسازیم (با همون ترتیبی که خودت گفتی)
    \App\Models\Category::create(['name' => 'روانشناسی', 'slug' => 'psychology']); // 1
    \App\Models\Category::create(['name' => 'تاریخی', 'slug' => 'history']); // 2
    \App\Models\Category::create(['name' => 'هنری', 'slug' => 'art']); // 3
    \App\Models\Category::create(['name' => 'کودک و نوجوان', 'slug' => 'kids']); // 4
    \App\Models\Category::create(['name' => 'خارجی', 'slug' => 'foreign']); // 5
    \App\Models\Category::create(['name' => 'ایرانی', 'slug' => 'iranian']); // 6
    \App\Models\Category::create(['name' => 'فلسفه', 'slug' => 'philosophy']); // 7
    \App\Models\Category::create(['name' => 'علمی', 'slug' => 'science']); // 8

    // حالا کتاب ها (من دسته بندی هاشون رو درست کردم)
    $books = [
        ['title' => 'بی نوایان', 'price' => 540000, 'image' => '/images/books/binavayan 2 jeldi.jpg', 'description' => 'بینوایان یک رمان تاریخی فرانسوی نوشتهٔ ویکتور هوگو است که اولین بار در سال ۱۸۶۲ منتشر شد و به‌عنوان یکی از بزرگ‌ترین رمانهای قرن ۱۹م شناخته می‌شود.', 'author' => 'ویکتور هوگو', 'category_id' => 5],
        ['title' => 'صد سال تنهایی', 'price' => 450000, 'image' => '/images/books/sad sal tanhaee.jpg', 'description' => 'صد سال تنهایی نام رمانی به زبان اسپانیایی نوشته گابریل گارسیا مارکز که چاپ نخست آن در سال ۱۹۶۷ منتشر شد.', 'author' => 'گابریل گارسیا مارکز', 'category_id' => 5],
        ['title' => 'بوف کور', 'price' => 400000, 'image' => '/images/books/bof koor.jpg', 'description' => 'بوف کور رمانی کوتاه اثر صادق هدایت است. این رمان به سبک فراواقع نوشته شده و تک‌گویی یک راوی است که دچار تَوَهُم و پندارهای روانی است.', 'author' => 'صادق هدایت', 'category_id' => 6],
        ['title' => 'انسان در جست و جوی معنا', 'price' => 450000, 'image' => '/images/books/ensan dar jostojoee maena.jpg', 'description' => 'اثر ویکتور فرانکل، روان‌پزشک و پدیدآورندهٔ لوگوتراپی است که در سال ۱۹۴۶ منتشر شد. این کتاب در بردارندهٔ خاطرات فرانکل از وضعیت خود در اردوگاه‌های کار اجباری است.', 'author' => 'ویکتور فرانکل', 'category_id' => 1],
        ['title' => 'عادت های اتمی', 'price' => 350000, 'image' => '/images/books/adat haye atomi.jpg', 'description' => 'روشی آسان و اثبات‌شده برای ساختن عادت‌های خوب و شکستن عادت‌های بد کتابی در زمینه خودسازی نوشتهٔ جیمز کلیر است.', 'author' => 'جیمز کلیر', 'category_id' => 1],
        ['title' => 'نیمه تاریک وجود', 'price' => 350000, 'image' => '/images/books/nime_tarik_vojod.jpg', 'description' => 'اثر دبی فورد و در ژانر موفقیت و خودیاری است. دبی فورد از زاویه‌های پنهان در وجود هر فرد صحبت می‌کند که معمولاً افراد سعی در پوشاندن آن‌ها دارند.', 'author' => 'دبی فورد', 'category_id' => 1],
        ['title' => 'هنر شفاف اندیشیدن', 'price' => 500000, 'image' => '/images/books/honar_andishidan.jpg', 'description' => 'نوشتهٔ رولف دوبلی، که در سال ۲۰۱۳ منتشر شد. این کتاب نود و نه خطای رایج هنگام اندیشیدن را در نود و نه فصل کوتاه توضیح می‌دهد.', 'author' => 'رولف دوبلی', 'category_id' => 1],
        ['title' => 'آنا کارنینا', 'price' => 700000, 'image' => '/images/books/anna.jpg', 'description' => 'رمانی پیچیده در هشت قسمت با بیشتر از دوازده شخصیت اصلی. محتوای داستان به خیانت، ایمان، خانواده، ازدواج، جامعۀ اشرافی روسیه می‌پردازد.', 'author' => 'لئو تولستوی', 'category_id' => 5],
        ['title' => 'گتسبی بزرگ', 'price' => 600000, 'image' => '/images/books/gatesbi.jpg', 'description' => 'رمانی نوشتهٔ اف. اسکات فیتزجرالد است که در سال ۱۹۲۵ منتشر شد. داستان آن در عصر جاز در لانگ آیلند رخ می‌دهد.', 'author' => 'اف. اسکات فیتزجرالد', 'category_id' => 5],
        ['title' => 'بلندی های بادگیر', 'price' => 500000, 'image' => '/images/books/bolandi2.jpg', 'description' => 'رمانی نوشتهٔ امیلی برونته که در ۱۸۴۷ منتشر شد. ویژگی متمایزکننده این رمان لحن شاعرانه و دراماتیک بیان آن بود.', 'author' => 'امیلی برونته', 'category_id' => 5],
        ['title' => 'سمفونی مردگان', 'price' => 500000, 'image' => '/images/books/samfoni.jpg', 'description' => 'این داستان یک حادثه را از منظر چند ناظر روایت می‌کند. شخصیت اصلی داستان شاعر جوانی است که گرفتار خشم پدر سنتی خود می‌شود.', 'author' => 'عباس معروفی', 'category_id' => 6],
        ['title' => 'شوهرآهو خانم', 'price' => 450000, 'image' => '/images/books/shohar.jpg', 'description' => 'انتشار این رمان حجیم در سال ۱۳۴۰ حادثه‌ای مهم در ادبیات داستانی ایران بود. علی‌محمد افغانی این رمان را در سال‌های زندان نوشت.', 'author' => 'علی‌محمد افغانی', 'category_id' => 6],
        ['title' => 'یک عاشقانه آرام', 'price' => 500000, 'image' => '/images/books/asheghane.jpg', 'description' => 'رمانِ نادر ابراهیمی نویسندهٔ ایرانی است که برای اولین بار در سال ۱۳۷۴ در تهران منتشر شد.', 'author' => 'نادر ابراهیمی', 'category_id' => 6],
        ['title' => 'دایی جان ناپلئون', 'price' => 600000, 'image' => '/images/books/dayi.jpg', 'description' => 'رمانی طنز در گونهٔ داستان بلوغ از ایرج پزشکزاد است که با لحنی طنز تیپ‌های شخصیت‌های جامعهٔ ایرانی را به ریشخند می‌گیرد.', 'author' => 'ایرج پزشکزاد', 'category_id' => 6],
        ['title' => 'چشم هایش', 'price' => 600000, 'image' => '/images/books/CHESHM.JPG', 'description' => 'رمانی از بزرگ علوی، نویسندهٔ واقع‌گرا که نخستین بار در سال ۱۳۳۱ منتشر شد. بزرگ علوی در این رمان روش استعلام و استشهاد را به کار برده است.', 'author' => 'بزرگ علوی', 'category_id' => 6],
        ['title' => 'قانون 5 ثانیه', 'price' => 400000, 'image' => '/images/books/ghanon_5_saniye.jpg', 'description' => 'می‌تواند در هر لحظه از زندگی روزمره یا در مواجهه با دشواری، عدم قطعیت و ترس موثر واقع شود و بهبود وضعیت سلامت و افزایش بهره‌وری کمک کند.', 'author' => 'مل رابینز', 'category_id' => 1],
        ['title' => 'هردو در نهایت میمیرند.', 'price' => 400000, 'image' => '/images/books/hardo.jpg', 'description' => 'یک رمان برای نوجوانان نوشته آدام سیلورا نویسندۀ آمریکایی است که در ۲۰۱۷ منتشر شده است.', 'author' => 'آدام سیلورا', 'category_id' => 4],
        ['title' => 'بادام', 'price' => 400000, 'image' => '/images/books/badam.jpg', 'description' => 'موضوع کتاب درباره‌ی نوجوانی به نام یونجی است که از بدو تولد مبتلا به بیماری آلکسی تیمیا بوده است.', 'author' => 'وون پیونگ سون', 'category_id' => 4],
        ['title' => 'انجمن شاعران مرده', 'price' => 400000, 'image' => '/images/books/anjoman.jpg', 'description' => 'ماجرای چند دانش‌اموز دبیرستانی است که در مدرسه‌ای بسیار معتبر درس می‌خوانند اما با ورود معلم ادبیات جدید با معنای جدیدی از زندگی آشنا می‌شوند.', 'author' => 'نانسی اچ کلاین', 'category_id' => 4],
        ['title' => 'بادبادک باز', 'price' => 300000, 'image' => '/images/books/badbadak.jpg', 'description' => 'نخستین اثر منتشر شدهٔ خالد حسینی نویسنده افغانستانی است. در سال ۲۰۰۷ میلادی فیلمی بر اساس این کتاب ساخته شد.', 'author' => 'خالد حسینی', 'category_id' => 4],
        ['title' => 'سم هستم بفرمایید', 'price' => 400000, 'image' => '/images/books/sam3.jpg', 'description' => 'جولی دختر هفده‌ساله‌ای است که تمام آینده‌ را برنامه‌ریزی کرده است اما اتفاقی وحشتناک تمام برنامه‌های جولی و سم را از بین می‌برد.', 'author' => '', 'category_id' => 4],
        ['title' => 'دختری که رهایش کردی', 'price' => 500000, 'image' => '/images/books/dokhtari ke rahayash kardi.jpg', 'description' => 'یک رمان عاشقانه نوشته‌ی جوجو مویز. این رمان بعد از انتشار در سال ۲۰۱۲ نامزد بهترین رمان سال شد.', 'author' => 'جوجو مویز', 'category_id' => 5],
        ['title' => 'دیزی دارکر', 'price' => 600000, 'image' => '/images/books/dixy.jpg', 'description' => 'این رمان تعلیق‌آمیز بر زندگی دختری به نام دیزی و خانواده‌ی پر از راز او تمرکز دارد. فضای بسته و گذشته‌ی پر از کینه حال‌وهوایی رازآلود به اثر داده است.', 'author' => 'آلیس فینی', 'category_id' => 4],
        ['title' => 'ثروتمندترین مرد بابل', 'price' => 450000, 'image' => '/images/books/servatmand_babol.jpg', 'description' => 'نوشتهٔ جورج سیموئل، اثری است که از طریق مجموعه‌ای از مثل‌های برگرفته از بابل باستان، توصیه‌هایی در زمینهٔ مدیریت مالی و ثروت‌اندوزی میکند.', 'author' => 'جورج سیموئل', 'category_id' => 1],
        ['title' => 'دنیای سوفی', 'price' => 450000, 'image' => '/images/books/donyaye.jpg', 'description' => 'یک رمان فلسفی اثر یوستین گردر است که تاریخ فلسفه را به زبان ساده برای نوجوانان تشریح می‌کند و تا کنون به ۵۹ زبان برگردانده شده است.', 'author' => 'یوستین گردر', 'category_id' => 7],
        ['title' => 'وابی سابی', 'price' => 400000, 'image' => '/images/books/vabi.jpg', 'description' => 'یک مفهوم در زیبایی‌شناسی سنتی ژاپنی است که یک جهان‌بینی بر پایهٔ پذیرش ناپایداری و زودگذری و پذیرش نقص‌هاست.', 'author' => '', 'category_id' => 7],
        ['title' => 'فلسفه ای برای زندگی', 'price' => 450000, 'image' => '/images/books/faalsafe.jpg', 'description' => 'ویلیام اروین در این کتاب به این پرسش می‌پردازد که کجا باید به دنبال فلسفهٔ زندگی بگردیم؟', 'author' => '', 'category_id' => 7],
        ['title' => 'تاریخ ایران', 'price' => 1000000, 'image' => '/images/books/tarikhiran.jpg', 'description' => 'تاریخ ایران قبل از اسلام نوشته حسن پیرنیا. این قسمت از شکل جغرافیایی فلات ایران آغاز و با مطالبی درباره آمدن آریان‌ها دنباله می‌یابد.', 'author' => 'حسن پیرنیا', 'category_id' => 2],
        ['title' => 'تئوری رنگ ها', 'price' => 550000, 'image' => '/images/books/teory.jpg', 'description' => 'نوشته خوزه م. پارامون، یک کتاب راهنمای جامع برای درک و کاربرد تئوری رنگ در هنر است.', 'author' => 'خوزه م. پارامون', 'category_id' => 3],
        ['title' => 'تاریخچه زمان', 'price' => 650000, 'image' => '/images/books/tarikhzaman.jpg', 'description' => 'کتاب در زمینهٔ کیهان‌شناسی نظری نوشتهٔ استیون هاوکینگ است که برای اولین بار در سال ۱۹۸۸ منتشر شد و بیش از ۲۵ میلیون نسخه فروخت.', 'author' => 'استیون هاوکینگ', 'category_id' => 8],
    ];

    // ارسال همه کتاب ها به دیتابیس
    foreach ($books as $book) {
        \App\Models\Book::create($book);
    }
}
}
