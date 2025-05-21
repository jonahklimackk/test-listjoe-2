@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')




<div class="wrapper">
	<div class="description">
		<h1>Thank You For Your Order!</h1>
		<div class="par">
			{{ $message }}
		</div>
		<div class="par">
			I wish you the best of luck with your promotions!
		</div>
        

	</div>
</div>



@include('members.layout.sidebar-spotlight')
@include('members.layout.footer')

