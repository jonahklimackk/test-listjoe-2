<?php

use App\Mail\WelcomeEmail;
use App\Mail\MailingCompleted;
use App\Models\User;
use App\Models\LoginAd; 
use App\Models\Logins;
use App\Models\Analytics;
use App\Models\CreditClicks;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TestController2;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginAdsController;
use App\Http\Controllers\SplashPageController;
use App\Http\Controllers\YourAccountController;
use App\Http\Controllers\SpotlightAdsController;
use App\Http\Controllers\TopMemberAdsController;
use App\Http\Controllers\CommissionsController;
use App\Http\Controllers\TopEmailAdsController;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SendMailingController;
use App\Http\Controllers\SendmailHistoryController;
use App\Http\Controllers\BuyCreditsController;
use App\Http\Controllers\BuySolosController;
use App\Http\Controllers\SolosController;
use App\Http\Controllers\GrowYourDownlineController;
use App\Http\Controllers\AffiliateTrackingController;
use App\Http\Controllers\RecommendedListbuildersController;
use App\Http\Controllers\StripePurchaseController;  
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\EarnCreditsController;
use App\Http\Controllers\CreditMailController;
use App\Http\Controllers\IframeController;
use App\Http\Controllers\PostController;
use Laravel\Nova\Contracts\ImpersonatesUsers;




/*
 * Admin Maillings
 *
 */
Route::get('/jkadmin/send-email', [AdminController::class,'showSendMailing']);








Route::get('/impersonation', function (Request $request, ImpersonatesUsers $impersonator) {
    if ($impersonator->impersonating($request)) {
        $impersonator->stopImpersonating($request, Auth::guard(), User::class);
    }
});

// uncomment for show spark scaffolding
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// }); 

//redirects to Listjoe Classic, handles first login oto
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),
])->group(function () {
    Route::get('/dashboard', [YourAccountController::class, 'dashboardRedirect'])->name('dashboard');
}); 





//any non defined routs go here
    // Padd
Route::fallback(function () {

    $routeName = Route::current()->parameters;
    $routePath = $routeName["fallbackPlaceholder"];
    Analytics::countClick($routePath);

    return redirect('/');
});





/*
 * Affiliate Tracking
 * http://listjoe.com/aff/username/campaign
 *
 */
Route::get('/', [AffiliateTrackingController::class,'index']);
Route::get('/aff/{username}', [AffiliateTrackingController::class,'aff']);
Route::get('/aff/{username}/{campaign}', [AffiliateTrackingController::class,'affAndCampaign']);

//supports /j/ routes
Route::get('/j/{username}', [AffiliateTrackingController::class,'aff']);
Route::get('/j/{username}/{campaign}', [AffiliateTrackingController::class,'affAndCampaign']);

Route::get('/test/aff', [AffiliateTrackingController::class, 'debug']);




//redirecting splash pages to tracking links
//splash pages
Route::get('splash/id/{splashId}/u/{affiliate}', [SplashPageController::class, 'splash']);






/*
 * Send a creditmail - testing
 *
 */
Route::get('/show/creditmail',[CreditMailController::class, 'showCreditMail']);

/*
 *
 * manually run the cron job
 * that dispatches a mmailing job
 * mimicks the cron job that runs every 
 * 15 min or so
 */
Route::get('/mailing/cronjob', function () {

    App\Helpers\SendsAMailing::cronjob();

});
Route::get('jkadmin/manual-mailing',[AdminController::class, 'showManualMailing']);

//manually sendsing out mailingsKB
Route::get('/process/next-mailing/{from}/{to}/{sort}',[AdminController::class, 'processMailing']);
// Route::get('/process/next-mailing/{from}/{to}', function ($from, $to) {

//     App\Helpers\SendsAMailingWithoutJobs::chooseMailing();

// });
Route::get('/mail/inactive/users/', function () {

    App\Helpers\SendsEmailToInactiveUsers::handle();

});


/*
 * Click for Credits
 *
 */
//listjoe.com/earn/6f431a093bc22dc8bd1e687b9e428e57/jonahslistbuilders
//no need for sender username, it's all stored in creditClicks table
Route::get('earn/{key}/', [EarnCreditsController::class, 'clickedCreditsMail']);
Route::get('earn/redeem/{key}',[EarnCreditsController::class, 'afterCountdown']);
Route::get('frames/earn-credits-top-frame/{key}', [EarnCreditsController::class,"showTopFrameBeforeCountdown"]);
Route::get('record/earn/{key}/view', [EarnCreditsController::class,'mailingRecordView']);








/*
 * Stripe Purchases
 * After Payment Urls
 *
 */

//process user bought subscription
Route::get('payment/membership/{membershipId}/{checkoutSessionId}', [StripePurchaseController::class, 'processMembership']); 

//process user buying credits
Route::get('payment/credits/{productId}/{checkoutSessionId}', [StripePurchaseController::class, 'processCredits']);

Route::get('/payment/oto/{productId}/{checkoutSessionId}', [StripePurchaseController::class, 'processOto']);

Route::get('/payment/solo/{productId}/{checkoutSessionId}', [StripePurchaseController::class, 'processSoloAdTokens']);







/*
 * Outside Sales Pages
 */



Route::get('/terms', [SalesController::class, 'terms']);
Route::get('/testimonials', [SalesController::class, 'testimonials']);
Route::get('/contact', [SalesController::class, 'contact']);
Route::get('signup', [SalesController::class, 'signup']);
Route::get('privacy', [SalesController::class, 'privacy']);







/*
 * Members Area - stuff in the yuoraccocuntyconroller class
 */

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () {    
    Route::get('/members', [YourAccountController::class, 'home'])->name('members');
    Route::get('/members/upgrade', [YourAccountController::class, 'upgrade']);
    Route::get('/members/delete', [YourAccountController::class, 'showCancel']);
    Route::post('/members/delete', [YourAccountController::class, 'processCancel']);
    Route::get('/log/out', [YourAccountController::class, 'logout']);
    Route::get('/members/orders', [YourAccountController::class, 'showOrders']);
 // toggle Vacation Mode
// Route::get('/members/sendactivation', 'VacationModeController@sendConfirmationOrFlipStatus');
});


/*
 * Unsubscribe link - forces a login then goes to cancel page
  */
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () {
    Route::get('unsubscribe/u/{username}', [YourAccountController::class, 'showCancel']);
});


/*
 * Members Area -get testimonials
 */
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () { 
   Route::get('/members/testimonial', [TestimonialController::class, 'showTestimonial']);
   Route::post('/members/testimonial', [TestimonialController::class, 'update']);
});

/*
 * Members Area -asccount settitngs
 */

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () { 
    Route::get('/members/settings', [AccountSettingsController::class, 'settings']);
    Route::post('/members/settings', [AccountSettingsController::class, 'update']);
});



/*
 * Send Mailing Section
 */
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () { 
    Route::get('/sendmail', [SendMailingController::class,'show']);
    Route::post('/sendmail/queue', [SendMailingController::class,'queue']);
    Route::get('/sendmail/preview', [SendMailingController::class,'preview']);
    Route::get('/sendmail/previous/{id}', [SendMailingController::class,'loadMailing']);
    Route::get('/sendmail/thankyou', [SendMailingController::class,'thanks']);
    Route::get('/mail_history', [SendmailHistoryController::class,'show']);
});





// // Buy Credits
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () { 
    Route::get('/members/buycredits', [BuyCreditsController::class, 'show']);
    Route::get('/members/buycredits/thank-you', [BuyCreditsController::class, 'thanks']);
});



// // Work With Solo Ads
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () { 
    Route::get('/members/solos/', [SolosController::class,'show']);
    Route::post('/members/solos/queue', [SolosController::class,'queue']);
    Route::post('/members/solos/preview', [SolosController::class,'preview']);
    Route::get('/solos/history', [SolosController::class,'history']);
});



// // Buy Solo Ads
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () { 
    Route::get('/members/buy_solos/', [SolosController::class,'buy']);
    // Route::get('/members/buy_solos/thank-you', [BuySolosController::class,'thanks']);
});






/*
 * Edit Photo
 */

Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');






/*
 * Profile Section
 */

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () { 
    Route::get('members/editphoto',[PhotoController::class,'showEditPhoto']);
    Route::get('/members/profile', [ProfileController::class,'showProfile']);
    Route::get('/members/editprofile',  [ProfileController::class,'showEditProfile']);
    Route::get('/members/edit-social-links',  [ProfileController::class,'showEditSocialLinks']);
    Route::post('/members/editprofile/update',  [ProfileController::class,'update']);
    Route::post('/members/uploadavatar', [ProfileController::class,'upload']);
        // Route::post('/upload/do', [PhotoController::class,'store']);
    // Route::post('/members/uploadavatar', [PhotoController::class,'uploadAvatar']);
});

//show profile to outside visitors
Route::get('/members/profile/u/{username}', [ProfileController::class,'showProfileOutside']);

/*
 * Profile Messages Section
 */

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () {
    Route::get('members/deletemessages/id/{id}', [MessagesController::class, 'delete']);
    Route::post('members/sendmessage', [MessagesController::class, 'send']);
});











/*
 * Backend Ads Section
 */
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () { 
    Route::get('/members/spotlight', [SpotlightAdsController::class, 'spotlight']);
    Route::post('/members/spotlight', [SpotlightAdsController::class, 'update']);
    Route::get('/members/spot/{id}', [SpotlightAdsController::class, 'countClick']);


    Route::get('/members/topmemberads', [TopMemberAdsController::class, 'topMemberads']);
    Route::post('/members/topmemberads', [TopMemberAdsController::class, 'update']);
    Route::get('/members/tma/{id}', [TopMemberAdsController::class, 'countClick']);


    Route::get('/members/loginads', [LoginAdsController::class, 'redirect']);
    Route::get('/members/loginads/edit/{edit}', [LoginAdsController::class, 'loginAds']);
    Route::post('/members/loginads', [LoginAdsController::class, 'update']);
    Route::get('/members/loginads/delete', [LoginAdsController::class, 'delete']);


    Route::post('/members/loginad/preview', [LoginAdsController::class, 'previewLoginAd']);
    Route::get('/members/loginad/', [LoginAdsController::class, 'showLoginAd']);
    Route::get('/members/la/{id}', [LoginAdsController::class, 'countClick']);


    Route::get('/members/topemail', [TopEmailAdsController::class,'topEmailAds']);
    Route::post('/members/topemail', [TopEmailAdsController::class,'update']);

    Route::get('/record/{id}/click', [TopEmailAdsController::class,'countClick']);
    Route::get('/record/tea/{id}/view', [TopEmailAdsController::class, 'recordView']);
});



/*
 * Grow Your Downline Section
 */

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () { 
    Route::get('members/downline', [GrowYourDownlineController::class, 'downline']);
    Route::get('members/reftools', [GrowYourDownlineController::class, 'reftools']); 
    Route::get('members/downline/level/{lv}', [GrowYourDownlineController::class, 'showDownlineLv']);
    Route::get('members/affiliatestat', [GrowYourDownlineController::class, 'affiliateStats']);

    //Commissions
    Route::get('members/earnings', [CommissionsController::class,'earnings']);

    //Recommended Listbuilders Section
    Route::get('members/recommendedlb', [RecommendedListbuildersController::class,'recommendedlb']);
});





/*
 * Support Section
 */

//not gonna do this one right now
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),
])->group(function () { 
    Route::get('support/knowledgebase', [SupportController::class,'knowledgeBase']);
    Route::get('members/show-submit-ticket', [SupportController::class,'showSubmitTicket']);
    Route::post('members/submit-ticket', [SupportController::class,'submitTicket']);
});




/*
 * Admin Section
 *
 */

// Route::get('admin', 'AdminController@dashboard');












// Route::get('test/dlcount', function () {
//     // dump((new App\Helpers\Downline())->printDownline(Auth::user(), 0));
//     // dump((new App\Helpers\Downline())->printDownline(App\User::find(), 0));
//     dump(App\Helpers\Downline::getCount(Auth::user(), 0));
//     // dump(App\Helpers\Downline::getCountOnLv(Auth::user(),1));
// });

// Route::get('test/faker', function() {

//     factory(App\User::class, 50)->create();
//     // $faker = Faker\Factory::create(50);
// });


// Route::get('test/sponsor', function() {
//     return App\User::getSponsor();
// });


// Route::get('test/hash', function() {
//     return Hash::make('super250');
// });

// Route::get('test/phpinfo', function() {
//      echo phpinfo();
// });


// Route::get('test/auth', function() {
//      dump(Auth::check());
// });

// Route::get('test/is-upgraded', function() {
//      return Auth::user()->isUpgradedToAtLeast('free');
// });


// Route::get('test/replies', function() {
//      App\Message::sortByReplies(App\Message::all());
// });

// Route::get('test/email', 'TestEmailController@test');
// Route::get('test/sendmailing', 'TestEmailController@testSendMailing');




// CalfSend  (moosend api)

// Route::get('test/moose', 'MoosendTestingController@test');
// Route::get('test/moose/queue-cron', 'MoosendTestingController@testQueueCron');

// mailing list test routes
// Route::get('test/mailinglist/create', 'TestMoosendMailingListController@create');
// Route::get('test/mailinglist/delete', 'TestMoosendMailingListController@delete');
// Route::get('test/mailinglist/get', 'TestMoosendMailingListController@get');
// Route::get('test/mailinglist/get-all', 'TestMoosendMailingListController@getAll ');

// send mailing test routes
// Route::get('test/send-mailing', 'TestEmailController@testSendMailing');

// Route::get('test/calf', 'TestController@calf');\

Route::get ('/create-users', function () {


    for($i=0;$i<100;$i++)
    {

        // $range = App\Models\User::get()->count();

        // $sponsorId = rand(1, $range);

        $user = new App\Models\User;
        $user->name = 'name'.rand(1,100000000000);
        $user->username = 'random'.rand(1,100000000000);
        $user->password = Hash::make('super250');

        $user->email ='random'.rand(1,100000000000).'@email.com';

        $range = App\Models\User::get()->count();
        $user->sponsor_id = rand(1, $range);

        dd($user);

        $user->save();

        // App\Models\User::create([
        //     'name' => 'name'.$i,
        //     'username' => 'username'.$i,
        //     'email' => $email,
        //     'password' => Hash::make('super250'),
        // ]);

    };

    // $users = App\Models\User::all();
    // foreach ($users as $user)
    // {
    //     $range = App\Models\User::get()->count();
    //     $user->sponsor_id = rand(1, $range);
    //     $user->save();
    // }

    // App\Models\User::create([
    //     'name' => 'name112',
    //     'username' => 'use111rname3',
    //     'email' => 'emaiq1qqqwfel@email.com',
    //     'password' => Hash::make('super250'),
    //     'sponsor_id' => 16,
    // ]);

});



Route::get('/emailjk', function () {

    $resend = Resend::client('re_7UKM5DtA_HRJWiFEDNfaG3JnEzUwgdudz');

    $resend->emails->send([
      'from' => 'istjoe@listjoe.com',
      'to' => 'jonahklimackk@gmail.com',
      'subject' => 'Hello World2',
      'html' => '<p>Congrats on sending your <strong>first email</strong>!</p>'
  ]);
});
Route::get('/mail/function', function () {

 dump(mail('jonahklimackk@gmail.com','subject','body'));
 exit;

});



Route::get('/show/auth', function () {

    dump(Auth::user());
});




Route::get('html-editor', function () {
    return View('members.layout.sendmailing.text-editor');
});


Route::get('iframe', function () {

   return 'test';
});

Route::get('iframe', [IframeController::class,'startHere']);




Route::get('testcreditmail', function () {

   return View('emails.testcreditmail');
});


Route::get('ckeditor', function () {

   return View('ckeditor');
});


Route::get('sendmailing/queue/{creditsSpent}', function ($creditsSpent) {

   return $creditsSpent;
});


Route::get('testmail', function () {
    $from = "test@president.com";
    $to = "jonahklimackk@gmail.com";
    $subject = "Cdhecking PHP mail";
    $message = "PHP mail works just fine";
    $headers = "From:" . $from;
    if (mail($to,$subject,$message, $headers))
        echo "The email message was sent.";
});


Route::get('phpmyinfo', function () {
    phpinfo(); 
})->name('phpmyinfo');




Route::get('show-welcome-mail', function () {
    // $sender = Auth::user();
    $recipient = User::get()->random(1)->first();
    // dd($recipient);
    return view('emails.transactions.welcome',compact('recipient'));

    // Mail::to($recipient)->send(new WelcomeEmail($recipient));
});

Route::get('show-mailing-completed', function () {
    $recipient = Auth::user();
    // dd($recipient);
    $numRecipients = 345;
    // return view('emails.transactions.mailing-completed',compact('recipient','numRecipients'));
    Mail::to($recipient)->send(new MailingCompleted($recipient,$numRecipients));
});

Route::get('show-referral-notice', function () {
    $recipient = Auth::user();
    $newMember = User::get()->random(1)->first();
    return view('emails.transactions.referral-notice', compact('recipient','newMember'));
});

Route::get('show-sponsor-commission', function () {
    $recipient = Auth::user();
    $customer = User::get()->random(1)->first();
    $subscriptionOrder = App\Models\SubscriptionOrders::get()->random(1)->first();
    $subscriptionOrder->name = App\Models\Membership::where('id', $subscriptionOrder->membership_id)->pluck('name')->first();

    return view('emails.transactions.sponsor-commission', compact('recipient','customer','subscriptionOrder'));
});

//importing db into this one
Route::get('import-db', function () {
    return App\Helpers\ImportsDatabase::import();
});



Route::get('test-php-mail', function () {

    $from = "listjoe@listjoe.com";
    $to = "jonahklimackk@gmail.com";
    $subject = "Checking PHP mail";
    $message = "PHP mail works just fine";
    $headers = "From:" . $from;
    dump(mail($to,$subject,$message, $headers));
});

Route::get('test-laravel-mail/{smtp}', function ($smtp) {
    $sender = Auth::user();

    Mail::to($sender)->send(new App\Mail\TestMail($smtp));   
    // Mail::to('hovorot744@mowline.com')->send(new App\Mail\TestMail());
});


Route::get('test-batch-send', function () {

    $resend = Resend::client('re_7UKM5DtA_HRJWiFEDNfaG3JnEzUwgdudz');

    $resend->batch->send([
      [
        'from' => 'listjoe@listjoe.com',
        'to' => ['listbuildersj@gmail.com'],
        'subject' => 'hello world',
        'html' => '<h1>it works!</h1>',
    ],
    [
        'from' => 'listjoe@listjoe.com',
        'to' => ['jonahklimackk@gmail.com'],
        'subject' => 'world hello',
        'html' => '<p>it works!</p>',
    ]
]);
});

Route::get('batch-send', function () {
    App\Helpers\SendsABatchMailing::cronjob();
});


Route::get('show/oto/{otoId}', function ($otoId) {
    if ($otoId == 1)
        return view('members.upgrade.first-login-upgrade');
    else if ($otoId == 2)
        return view('members.upgrade.second-login-upgrade');
    else
       return view('members.upgrade.first-login-upgrade');
});


Route::get('gmail', function () {
    return view('gmail');
});

Route::get('spaces', function () {

    $users = App\Models\User::all();
    foreach ($users as $user)
    {
        echo "'$user->username'";
        echo '<br>';
    }

});

Route::get('popup', function () {
    return view('sales.popup');


});


