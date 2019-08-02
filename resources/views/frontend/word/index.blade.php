{{-- Extending main layout --}}
@extends('layouts.frontend.main')

{{-- Page Title --}}
@section('title' , 'RaSa Online Dictionary')

{{-- Including search and messages --}}
@section('search')
     @include('partials.message')
     @include('layouts.frontend.search')
@endsection


@section('content')
<br><br>
     {{-- bootstrap row class for a row of two cards --}}
     <div class="row">

          {{-- Left word card --}}
          <div class="col-lg-6">
               <div class="card" id="left-card">
                    <div class="card-body">
                         <h5 class="card-title">Random English Word</h5>
                         <hr>
                         <h6 class="card-subtitle mb-2 text-muted d-inline">{!! $randomWord1->word !!}</h6>
                         <div class="card-text">{!! $persianDefinition1 !!}</div>
                         <a href="{{route('word.show', $randomWord1->id)}}" class="card-link float-left">Word Page</a>
                    </div>
               </div>
          </div>

          {{-- Right word card --}}
          <div class="col-lg-6">
               <div class="card" id="right-card">
                    <div class="card-block">
                         <h5 class="card-title">Random English Word</h5>
                         <hr>
                         <h6 class="card-subtitle mb-2 text-muted d-inline">{!! $randomWord2->word !!}</h6>
                         <div class="card-text">{!! $persianDefinition2 !!}</div>
                         <a href="{{route('word.show', $randomWord2->id)}}" class="card-link float-left">Word Page</a>
                    </div>
               </div>
          </div>

     </div>

     {{-- The site introduction --}}
     <div lang="fa" class="text-right" id="introduction">

          <div class="section-title">
               دیکشنری آنلاین رسا
          </div>

          <div>
          	<img src="/img/introduction.png" alt="introduction" class="center">
          	<br>
          	<p>
          	     برای استفاده از دیکشنری رسا لطفا کلمه خود رو در بخش بالا بنویسید. بعد از نمایش معنی، با کلیک بر روی آیکون بلندگو، تلفظ به زبان انتخاب شده، پخش می شود.
          	</p>
          </div>

          <hr class="sky-hr">

          <div>
               <br>
               <h4><b>دیکشنری</b></h3>
               <p>
                    دیکشنری (Dictionary) که گاهی اوقات به عنوان یک واژه نامه، فرهنگ لغت، لغت نامه یا فرهنگنامه شناخته می شود، مجموعه ای از کلمات در یک یا چند زبان خاص است، که اغلب بر اساس حروف الفبا مرتب سازی می شود، و ممکن است شامل اطلاعاتی در مورد تعاریف، کاربردها، ریشه شناسی، تلفظ، ترجمه، و غیره باشد. واژه نامه کتابی است که معانی لغات یک زبان در آن توضیح داده شده باشد. واژه ها به صورت الفبایی مرتب شده اند و معمولاً املا و تلفظ و معنای هر کلمه یاد شده است. فرهنگ لغات در یک رشته خاص، معمولاً حاوی معانی هر واژه است. اگرچه تصور می شود که دیکشنری فقط با واژه ها سر و کار دارد ولی دامنه پوشش آن اغلب می تواند از این هم فراتر برود.
               </p>
               <img src="/img/Dictionary.jpg" class="center">
          </div>

          <div>
               <br>
               <h4><b>دیکشنری آنلاین</b></h3>
               <p>
                    دیکشنری آنلاین (Online Dictionary) وب سایت و یا اپلیکیشنی است که به صورت اینترنتی خدماتی مربوط به دیکشنری ها و فرهنگنامه ها را ارائه می دهد. مانند سایت دیکشنری رسا. در دیکشنری آنلاین شما با وارد کردن هر واژه ای در بخش مشخص شده و زدن دکمه جستجو، به سرعت معنی و توضیحات مربوطه را می توانید مشاهده کنید.
               </p>
               <img src="/img/OnlineDictionary.jpg" class="center">
          </div>

          <div>
               <br>
               <h4><b>واژه</b></h3>
               <p>
                    مجموعهٔ حروفی که یک واحد را تشکیل دهند، واژه یا کلمه (انگلیسی: Word) نام دارند. در دستور زبان فارسی، معمولاً کلمه را به نُه بخش تقسیم می کنند: اسم، صفت، عدد، کنایه، فعل، قید، حرف اضافه، حرف ربط، صوت. «واژه» کوچک ترین شکل معنادار از حروف است، اگر بتواند به تنهایی به کار رود. برای نمونه، «-انه» در واژه هایی مانند مردانه، زنانه، مهربانانه، دارای معنی ویژهٔ خود است، ولی از آنجا که نمی توان آن را به تنهایی به کار برد، واژه نامیده نمی شود. بسیاری از واژه ها به بخش های کوچک تری بخش پذیرند که به آن ها تکواژ گفته می شود. تکواژ کوچکترین بخش کلمه است که در بسیاری از موارد یک کلمهٔ مستقل محسوب شده و در برخی موارد نیز کلمه به حساب نمی آید.
               </p>
               <img src="/img/Word.jpg" class="center">
          </div>

          <div>
               <br>
               <h4><b>دیکشنری تخصصی</b></h3>
               <p>
                    دیکشنری رسا بیش از بیست زمینه تخصصی را پشتیبانی می کند. در دیکشنری تخصصی (Specialized Dictionary) معنی هر کلمه با توجه به آن رشته تخصصی نمایش داده می شود.
               </p>
               <img src="/img/SpecializedDictionary.jpg" class="center">
          </div>

          <div>
               <br>
               <h4><b>تفاوت دیکشنری با دانشنامه</b></h3>
               <p>
                    دیکشنری با دانشنامه (انگلیسی: Encyclopaedia) (دایرة المعارف) کمی تفاوت دارد. در یک دیکشنری معمولاً، به معنای واژه ها اکتفا می شود و اطلاعات دیگری (نظیر تاریخچه) کمتر داده می شود. به علاوه، در واژه نامه ها فقط به واژه های عمومی یک زبان اشاره می شود، و اسامی خاص (مانند اسم مکان ها و اشخاص) کمتر نوشته می شود. با این حال، مرز دقیقی بین دیکشنری و دانشنامه نمی توان تعیین کرد، و برخی کتب به نوعی در هر دو طبقه جا می گیرند، مانند لغتنامهٔ دهخدا
               </p>
               <img src="/img/DictionaryVsWiki.jpg" class="center">
          </div>

          <div>
               <br>
               <h4><b>تعریف یا معنی در دیکشنری</b></h3>
               <p>
                    تعریف (واکـَـران) (انگلیسی: Definition) عبارتی است که معنای یک اصطلاح (کلمه، عبارت یا دسته ای از نمادها) یا نوع یک چیز را شرح می دهد. تعریف واژه به ما می گوید که یک چیز باید چه ویژگی هایی (مشخصه هایی کیفیاتی، خواصی) داشته باشد تا آن واژه بر آن اطلاق شود. تعریف باید جامع و مانع باشد، این بدان معناست که «تعریف واژهٔ مورد نظر باید جامع همهٔ جنبه های تعریف کننده و مانع همهٔ جنبه هایی باشد که جنبه های غیر تعریف کننده|تعریف کننده نیستند.». یعنی تعریفی که ارائه می شود ویژگی هایی که آن چیز را از بقیه جدا می کند را بیان کند. جنبه های تعریف کننده ویژگی هایی هستند که اگر اعضای یک طبقه دارای آن ویژگی ها نباشند، دیگر به آن طبقه تعلق ندارند. مانند ویژگی داشتن سه ضلع برای مثلث، که اگر چیزی سه ضلع نداشته باشد به هیچ وجه نمی تواند مثلث باشد.
               </p>
               <img src="/img/Definition.jpg" class="center">
          </div>

          <div>
               <br>
               <h4><b>مفهوم در دیکشنری</b></h3>
               <p>
                    مفهوم یا کانسپت (انگلیسی: Concept) در لغت آنچه مورد فهم واقع شده است. مفهوم یعنی، معنا و مدلولی که لفظ بر آن دلالت می کند و از لفظ فهمیده می شود. به نظر متفکران بزرگی از قبیل ارسطو، هربرت پوتنام، ... مفهوم به صورت ساده معرفی و ترکیب برداشتهای حسی است به نظر دسته دیگری از متفکران از قبیل جان دیویی مغز نمی تواند یک دریافت کنندهٔ مفعول و بدون مداخله باشد. مفهوم به دو دسته طبقه بندی می شود: مفهوم جزئی و کلی. اولی شامل تمام خصوصیات تشکیل دهنده یک مفهوم می باشد، برداشت از یک مفهوم در واقع مجموعی از ویژگی هایی است که باعث تمایز آن مفهوم از بقیه مفاهیم می شود. و دومی (کلی) مجموع خصوصیاتی که تشکیل دهنده برداشت اول هستند (مانند مفهوم انسان بدون مشخصات یک مصداق خاص)
               </p>
               <img src="/img/Concept.jpg" class="center">
          </div>

          <div>
               <br>
               <h4><b>تلفظ</b></h3>
               <p>
                    تلفظ (Pronunciation) از مباحث ویژه دانش زبان شناسی است که در آن به روند و نحوه ادای هجاها و واج ها میان اهل زبان پرداخته می شود. یک واژه به گونه های متفاوتی تلفظ می گردد. چگونگی تلفظ یک واژه که از واج ها و هجا تشکیل شده ممکن است تحت تاثیر عواملی مانند سن و سال، طبقه اجتماعی، قومیت، سواد، جنسیت و مخاطب متفاوت باشد.
               </p>
               <img src="/img/Pronunciation.jpg" class="center">
               <br>
          </div>

     </div>

@endsection