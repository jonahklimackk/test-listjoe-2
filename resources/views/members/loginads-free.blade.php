@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')


 <div class="wrapper">
                    <style>
    .loginad_table .name {
        vertical-align: middle;
        font-weight: bold;
        font-size: 12px;
        width: 150px;
    }
    .loginad_table textarea {
        width: 467px;
        height: 126px;
    }
</style>
    <div class="description">
        <h1>Your List Joe Login Ads</h1>
        <div class="par">
            Welcome to the <b><u>most powerful advertising available at List Joe!</u></b>
            Every business owner knows how well login ads work,
            and having your ad placed into List Joe’s login ad system is extremely valuable.
        </div>

        <div class="par">
            In fact, nearly every day we get a fellow business owner asking if we can run an ad for them on our logins.
            However, we have to say no because we saved these ads only for our <a href="/members/upgrade">Gold members!</a>
        </div>

        <div class="par">
            Do you want your ad shown to everyone who logs into List Joe?
            If so, <a href="/members/upgrade">upgrade to Gold now</a> <u>and unlock this powerful spot</u>.
            Your ad will be fully integrated in our login ad system (it’s truly <b>set-and-forget traffic!</b>)
            for as you are upgraded. <a href="/members/upgrade">Upgrade Now!</a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#previewButton').click(function(){
            $('#addloginadForm')
            .attr('target','_blank')
            .attr('action','/members/loginad')
            .submit()
            .attr('target','')
            .attr('action','/members/loginads');
        })
    })

</script>



@include('members.layout.sidebar-spotlight')
@include('members.layout.footer')