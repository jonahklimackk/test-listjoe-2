@include('members.layout.header')
@include('members.layout.menu')
@include('members.layout.sidebar-vda')




<div class="wrapper">
	<div class="description">
		<h1>Add Testimonial</h1>
		<div class="par">
			Please let us know how List Joe is working for you! We love hearing the feedback and greatly appreciate it. <br/>
			Are you getting good results on your emails or earning solid commissions from our affiliate program? If so, please tell us. We might use your testimonial on our page which will give you some great exposure.
			<br/><br/>
			Also, if you think we can improve something, we would love to hear that too!
		</div>

		@include('members.layout.form-feedback')

		<form id="testimonialsForm" method="post" class="form" action="/members/testimonial">
			@csrf
			@if(isset($testimonial))
			<textarea name="testimonial" style="width: 100%;;height: 100px">{{ $testimonial['testimonial'] }}</textarea>
			@else
			<textarea name="testimonial" style="width: 100%;;height: 100px"></textarea>
			@endif
			<br/>
			@include('members.layout.form-errors')
			<br/>
			<div class="blue_button" data-submit="form">Add Testimonial</div>
		</form>
	</div>
</div>



@include('members.layout.sidebar-spotlight')
@include('members.layout.footer')