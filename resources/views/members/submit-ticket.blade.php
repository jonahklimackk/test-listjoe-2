@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')
<div class="wrapper">
  @include('members.layout.spotlight-ads')
  <div class="description">
    <h1>Submit ticket</h1>
    <br/><br/>
    When submitting a ticket concerning a purchase please include your <br/> transaction ID <br/><br/>I usually answer tickets much sooner, however please allow 24 hours before sending<br/>
    a new ticket.

    <br><br>
    <font color="red">
        {{ $supportMessage ?? ''}}
    </font>
    <br/><br/>
    <form method="post" id="ticketForm" method="post" class="form" action="/members/submit-ticket">
        @csrf
        <table>
            <tr>
                <td style="width: 90px;">
                    <b>Name:</b>
                </td>
                <td>
                    <input type="text" name="name" value="{{ $user->name }}" style="width: 400px;"/>
                </td>
            </tr>
            <tr>
                <td style="width: 90px;">
                    <b>Email:</b>
                </td>
                <td>
                    <input type="text" name="email" value="{{ $user->email }}"style="width: 400px;"/>
                </td>
            </tr>
            <tr>
                <td style="width: 90px;">
                    <b>Subject:</b>
                </td>
                <td>
                    <input type="text" name="subject" style="width: 400px;"/>
                </td>
            </tr>
            <tr>
                <td style="vertical-align: middle;">
                    <b>Message:</b>
                </td>
                <td>
                    <textarea name="message" style="width: 400px;height: 130px;"></textarea>
                </td>
            </tr>
        </table>
        <br/><br/>
        <div align="center">
        <div class="blue_button" onclick="$('#ticketForm').submit()">Submit</div></div>
    </form>
</div>                </div>

</div>
</div>

@include('members.layout.footer')
