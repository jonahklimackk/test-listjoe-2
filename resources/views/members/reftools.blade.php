@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')



 <div class="wrapper">

      @include('members.layout.spotlight-ads')
                    <style>
    .affiliate_tools_tabs
    {
        width: 700px;
        height: 57px;
    }

    .affiliate_tools_tab{
        cursor: pointer;
        color: white;
        background: #1263A2;
        margin-top: 10px;
        display: inline-block;
        margin-left: 0px;
        width: 217px;
        height: 47px;
        text-align: center;
        line-height: 47px;
        font-size: 22px;
        border-radius: 6px 6px 0 0;
        box-shadow: inset rgba(0, 0, 0, 0.5) 0px 0px 5px;
    }
    .sel_bold, .sel_bold:hover {
        background: #F0CE2E !important;
        color: #1263A2;
        box-shadow: none;
    }

    .affiliate_tools_tab:hover {
        background: #509AD3;
        box-shadow: none;
    }

    .global_info_paragraph a {
        color: #3E95E7;
        text-decoration: underline;
        cursor: pointer;
        line-height: 24px;
    }
    .affiliate_tools_content {
        border: 5px #F0CE2E solid;
        margin-bottom: 50px;
    }
    .affiliate_tools_content p {
        margin-left: 20px;
    }

    .splash-pl {
        color: #333;
        font-size: 15px;
        font-weight: bold;
        margin: 8px 16px;
        letter-spacing: 1px;
    }
    .splash-pl-darked {
        color: #333;
    }
    .splash-input {
        width: 333px;
        height: 24px;
        border: 1px solid #747475;
        color: #747475;
        font-size: 14px;
        padding: 2px 15px;
    }
    .main-content-splashes {
        width: 100%;
        border: 0;
    }
    .main-content-splashes td {
        vertical-align: middle;
    }
    .main-content-splashes tr {
        height: 140px;
    }

    .splash {
        width: 200px;
        border:1px solid #444444;
        margin-left: 18px;
        padding: 4px
    }
</style>



<script type="text/javascript">
    $(document).ready(function()
    {
        $(".affiliate_tools_tab").click(function()
        {
            var id = $(this).attr("id");
            $(".affiliate_tools_tab").removeClass('sel_bold');
            $("#"+id).addClass('sel_bold');
            $(".affiliate_tools_content").hide();
            $("#"+id+"_tab").show();
        }
    )
    }
)
</script>

<div class="affiliate_tools_tabs">
    <span class="affiliate_tools_tab sel_bold" id="splash">Splash Pages</span>
    <span class="affiliate_tools_tab" id="email">Email Promos</span>
    <span class="affiliate_tools_tab" id="banners">Banners</span>
</div>
<div class="affiliate_tools_content" id="splash_tab">
    <div class="description">
        <div class="par">
            Splash pages are the most effective way to promote List Joe and build your downline.
            They are specially designed to quickly explain the benefits of joining List Joe,
            and they increase sign-up conversions 10 fold.
        </div>
        <div class="par">
            All the splash pages below are already set up with your affiliate link and ready to go.
            Some of the best places to promote these splash pages are on our <a href="/members/recommendedlb">Recommended list builders page</a>.
        </div>
        <div class="par">
            Test out different splash pages and see what works best for you. The more you promote,
            the more downlines you build and the <b>greater commissions</b> you will earn.
        </div>
        <div class="par">
            Remember, at List Joe you can build many downlines at the same time when you set up
            your <a href="/members/recommendedlb">Recommended List Builder page</a>, and earn up to $100 per referral.
            So why promote any other link? Start now.
        </div>
    </div>

    <table class="main-content-splashes">
                    <tr>
                <td width="260">
                    <a target="_blank" href="/splash/id/19/u/{{ Auth::user()->username }}">
                        <img class="splash" src="/upload/splashes/Splash_01.png" />
                    </a>
                </td>
                <td>
                    <div class="splash-pl">SPLASH PAGE LINK:</div>
                    <input class="splash-input"
                           type="text"
                           name="splash19"
                           value="http://listjoe.com/splash/id/19/u/{{ Auth::user()->username }}" />

                </td>
            </tr>
                    <tr>
                <td width="260">
                    <a target="_blank" href="/splash/id/20/u/{{ Auth::user()->username }}">
                        <img class="splash" src="/upload/splashes/Splash_002.png" />
                    </a>
                </td>
                <td>
                    <div class="splash-pl">SPLASH PAGE LINK:</div>
                    <input class="splash-input"
                           type="text"
                           name="splash20"
                           value="http://listjoe.com/splash/id/20/u/{{ Auth::user()->username }}" />

                </td>
            </tr>
                    <tr>
                <td width="260">
                    <a target="_blank" href="/splash/id/21/u/{{ Auth::user()->username }}">
                        <img class="splash" src="/upload/splashes/Splash_003.png" />
                    </a>
                </td>
                <td>
                    <div class="splash-pl">SPLASH PAGE LINK:</div>
                    <input class="splash-input"
                           type="text"
                           name="splash21"
                           value="http://listjoe.com/splash/id/21/u/{{ Auth::user()->username }}" />

                </td>
            </tr>
                    <tr>
                <td width="260">
                    <a target="_blank" href="/splash/id/22/u/{{ Auth::user()->username }}">
                        <img class="splash" src="/upload/splashes/Splash_004.png" />
                    </a>
                </td>
                <td>
                    <div class="splash-pl">SPLASH PAGE LINK:</div>
                    <input class="splash-input"
                           type="text"
                           name="splash22"
                           value="http://listjoe.com/splash/id/22/u/{{ Auth::user()->username }}" />

                </td>
            </tr>
                    <tr>
                <td width="260">
                    <a target="_blank" href="/splash/id/23/u/{{ Auth::user()->username }}">
                        <img class="splash" src="/upload/splashes/Splash_006.png" />
                    </a>
                </td>
                <td>
                    <div class="splash-pl">SPLASH PAGE LINK:</div>
                    <input class="splash-input"
                           type="text"
                           name="splash23"
                           value="http://listjoe.com/splash/id/23/u/{{ Auth::user()->username }}" />

                </td>
            </tr>
                    <tr>
                <td width="260">
                    <a target="_blank" href="/splash/id/24/u/{{ Auth::user()->username }}">
                        <img class="splash" src="/upload/splashes/santa.jpg" />
                    </a>
                </td>
                <td>
                    <div class="splash-pl">SPLASH PAGE LINK:</div>
                    <input class="splash-input"
                           type="text"
                           name="splash24"
                           value="http://listjoe.com/splash/id/24/u/{{ Auth::user()->username }}" />

                </td>
            </tr>
            </table>
</div>

<div class="affiliate_tools_content" style="display: none" id="email_tab">
    <div class="content">
        <div class="description">
            <div class="par">
                Do you have your own list, or accounts at other list builders?
                If so, we have some excellent emails for you to choose from that you can start sending out immediately.
                They are already set up with your affiliate link and ready to go!
            </div>
            <div class="par">
                The best thing to do is send out your emails consistently at <a href="/members/recommendedlb">other list builders</a>,
                or to your own list. If you do that, you can <b>easily earn some extra money each month</b>.
                Remember, upgraded members earn up to 4x more commissions (<u>up to $100 per referral!</u>).
                Don’t leave money on the table, <a href="/members/upgrade">upgrade now!</a>
            </div>
            <div class="par">
                Here are some emails you can use to get started. Feel free to use them as they are,
                or modify them to make them unique.
            </div></div>
        <p>&nbsp;</p>
        <p><strong>EMAIL #1</strong></p>
        <p>
            <strong>Subject:</strong> <input name="text1" value="what's happening in the next 5 minutes..?" size="80" type="text" />
            <textarea rows="15" cols="69" id="textarea" readonly="readonly" name="textarea1">
Hey,

5 minutes online can be a lifetime.

Sure, that might sound weird, but when
you have an online business, 5 minutes
can be life changing...

5 minutes can get you more traffic..

5 minutes can get you more leads..

5 minutes can bring your business to
a whole new level.

How?

Advertising.

And with this email advertising source,
you can send your email ad to a minimum
of 1000 real, home-based marketers in
the next 5 minutes.

Sound good?

You can send your email right now:

http://Listjoe.com/aff/{{ Auth::user()->username }}

All you have to do is fill out your
subject line and email, and click send.

That's the power of online marketing.

If you have 5 minutes to spare, then
send your email right now:

http://Listjoe.com/aff/{{ Auth::user()->username }}

Enjoy!


            </textarea>
        </p>

        <p>&nbsp;</p>
        <p><strong>EMAIL #2</strong></p>
        <p>
            <strong>Subject:</strong> <input name="text2" value="got Joe..? " size="80" type="text" />
            <textarea rows="15" cols="69" id="textarea" readonly="readonly" name="textarea2">
Hey,

Have you heard of Joe?

He's a pretty powerful guy that's been
helping online businesses grow since 2005.

And the best part about it is..that he
does all the work for you.

Sound to good to be true?

Well, all you need is 5 minutes to find
out for yourself.

http://Listjoe.com/aff/{{ Auth::user()->username }}

In 5 minutes, Joe can send your email ad
to 1000 home-based internet marketers.

That's right, Joe's a happy guy, because
he's seen 1000s of people succeed online
through email marketing.

And now, he wants to help you.

Will you let him?

Click this link now:

http://Listjoe.com/aff/{{ Auth::user()->username }}

Send your ad out to a minimum of 1000
people today, and see what Joe can do
for your business.

Enjoy!
            </textarea>
        </p>
        <p>&nbsp;</p>
        <p><strong>EMAIL #3</strong></p>
        <p>
            <strong>Subject:</strong> <input name="text3" value="who's Joe..?" size="80" type="text" />
            <textarea rows="15" cols="69" id="textarea" readonly="readonly" name="textarea3">
Hey,

You might have seen him around.

His name is Joe, and he loves email
marketing.

In fact, he's been doing it since 2005.

Who is Joe?

Joe is the helpful and friendly mascot at
ListJoe.

And what he loves doing is sending
YOUR email ads to 1000s of home-based
marketers.

That's right, in the next 5 minutes you
can send your email ad to at least 1000
people.

http://Listjoe.com/aff/{{ Auth::user()->username }}

Just add your subject line and email, and
let Joe do the rest.

Imagine what that kind of advertising
can do for your business.

Make Joe happy now and start getting results
today.

http://Listjoe.com/aff/{{ Auth::user()->username }}

Enjoy!
            </textarea>
        </p>

        <p>&nbsp;</p>
        <p><strong>EMAIL #4</strong></p>
        <p>
            <strong>Subject:</strong> <input name="text3" value="have you been ranked yet..?" size="80" type="text" />
            <textarea rows="15" cols="69" id="textarea" readonly="readonly" name="textarea3">
Hey,

Online marketing is changing.

You used to be able to just grab an affiliate
link and start making money.

Sure, that still works a bit. But to build
real, long-term profits online you need to go
a bit further.

So how do you do that?

With branding.

And at ListJoe, they do it for you.

Every email ad you send at ListJoe is fully
branded, just like all the big online businesses
like Amazon and Ebay.

You will literally sky-rocket your social
network and brand with every email you send
at ListJoe.

http://Listjoe.com/aff/{{ Auth::user()->username }}

And the best part about it is that the more you
use ListJoe, the more you build your social
ranking.

That's right, you will get your brand ranked just
by being an active member at ListJoe.

The higher your rank, the better your brand.

Start building your brand now.

http://Listjoe.com/aff/{{ Auth::user()->username }}

Enjoy!
            </textarea>
        </p>

        <p>&nbsp;</p>
        <p><strong>EMAIL #5</strong></p>
        <p>
            <strong>Subject:</strong> <input name="text3" value="are you in a pickle?" size="80" type="text" />
            <textarea rows="15" cols="69" id="textarea" readonly="readonly" name="textarea3">
Hey,

Can your online business use a bit of a
pick-me-up...

What if you could get a lot more eyes on your
links in the next 5 minutes..?

Well, now you can.

At ListJoe, you can send your ad out to 1000
home-based marketers right now.

And it's 100% free.

http://Listjoe.com/aff/{{ Auth::user()->username }}

All you need to do is sign up to get started.

If you need more traffic to your site, this
is by far the best and easiest place to drive
tons of targeted marketers to YOUR website.

In fact, ListJoe has been helping internet marketers
succeed online since 2005.

It's time for Joe to help your business:

http://Listjoe.com/aff/{{ Auth::user()->username }}

And now, ListJoe's been completely revamped with
some cutting-edge features that will seriously
boost your business.

Sign up now and see what 5 minutes can do for your
business.

http://Listjoe.com/aff/{{ Auth::user()->username }}

Enjoy!
            </textarea>
        </p>

        <p>&nbsp;</p>
        <p><strong>EMAIL #6</strong></p>
        <p>
            <strong>Subject:</strong> <input name="text3" value="what's new at ListJoe?" size="80" type="text" />
            <textarea rows="15" cols="69" id="textarea" readonly="readonly" name="textarea3">
Hey,

ListJoe has been one of the best and highest
ranked list builders online since 2005.

It was originally created by Jonah Klimack, and
now it's been completely revamped and modernized.

In fact, you have to see it to believe it.

http://Listjoe.com/aff/{{ Auth::user()->username }}

Now you can fully brand your emails.

That means every email you send will have the
look and feel of huge online businesses like
Amazon, Twitter, and Ebay.

Plus, you will get your brand ranked and build
your social network just by being an active
member.

http://Listjoe.com/aff/{{ Auth::user()->username }}

ListJoe is not your ordinary list builder.

It's now an extremely profitable and social
email advertising network that you can use
to seriously build your business.

If you haven't seen it yet, click below to
see what it can do for you.

http://Listjoe.com/aff/{{ Auth::user()->username }}

Enjoy!
            </textarea>
        </p>

    </div>
</div>


<div class="affiliate_tools_content" style="display: none" id="banners_tab">
    <div class="content">
        <div class="description">
            <div class="par">
                Banners are an excellent way to passively promote List Joe.
                There are many resources online including blogs, forums,
                and other advertising networks that allow banner advertising.
            </div>
            <div class="par">
                Choose a banner below and add the code to your own site or an advertising site of your choice.
                They have your affiliate code embedded, all you have to do is copy and paste it to start!
            </div>
        </div>


        <p align="center">
            <img alt="" src="/upload/bans/1.png" border="0"><br>
            <textarea cols="60" rows="3" style="font-size: 11px; font-family: verdana;" name="b1">
<a href="http://listjoe.com/aff/{{ Auth::user()->username }}">
    <img src="http://listjoe.com/upload/bans/1.png" border="0">
</a>
            </textarea>
        </p>
        <br/>
        <br/>
        <br/>
        <p align="center">
            <img alt="" src="/upload/bans/2.png" border="0"><br>
            <textarea cols="60" rows="3" style="font-size: 11px; font-family: verdana;" name="b1">
<a href="http://listjoe.com/aff/{{ Auth::user()->username }}">
    <img src="http://listjoe.com/upload/bans/2.png" border="0">
</a>
            </textarea>
        </p>
        <br/>
        <br/>
        <br/>
        <p align="center">
            <img alt="" src="/upload/bans/3.png" border="0"><br>
            <textarea cols="60" rows="3" style="font-size: 11px; font-family: verdana;" name="b1">
<a href="http://listjoe.com/aff/{{ Auth::user()->username }}">
    <img src="http://listjoe.com/upload/bans/3.png" border="0">
</a>
            </textarea>
        </p>
        <br/>
        <br/>
        <br/>
        <p align="center">
            <img alt="" src="/upload/bans/4.png" border="0"><br>
            <textarea cols="60" rows="3" style="font-size: 11px; font-family: verdana;" name="b1">
<a href="http://listjoe.com/aff/{{ Auth::user()->username }}">
    <img src="http://listjoe.com/upload/bans/4.png" border="0">
</a>
            </textarea>
        </p>
        <br/>
        <br/>
        <br/>
        <p align="center">
            <img alt="" src="/upload/bans/5.png" border="0"><br>
            <textarea cols="60" rows="3" style="font-size: 11px; font-family: verdana;" name="b1">
<a href="http://listjoe.com/aff/{{ Auth::user()->username }}">
    <img src="http://listjoe.com/upload/bans/5.png" border="0">
</a>
            </textarea>
        </p>
        <br/>
        <br/>
        <br/>
    </div>
</div>                </div>

                            </div>
        </div>

@include('members.layout.footer')
