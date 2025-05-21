
@extends('members.layout.full')


@section('content')


<form method="post" id="cancelForm">
	@csrf
	<div class="description">
		<h1>Cancel Account</h1>
		<div class="par">
			Are you sure you want to cancel your List Joe account?
			By doing so, all of your mail history, downline and other information
			will be permanently deleted, and we will not be able to recover it.
		</div>

		<div class="blue_button" id="button_yes">Yes</div>

		<div class="blue_button" id="button_no">No</div>

		<div class="par" id="remove-confirm" style="display: none">
			If you still want to cancel, please let us know why you no longer wanted
			to use List Joe. This will help us improve our service for our members.
			<br/><br/>
			Thanks for trying us out!
			<textarea rows="4" name="feedback" style="width:100%;margin-top:20px;"></textarea>
			<br/><br/>
			<div class="blue_button" id="button_remove">Yes, remove my account now</div>
		</div>
	</div>
</form>

<script>
	$(document).ready(function(){
		$('#button_remove').click(function(){
			$('#cancelForm').submit();
		})
		$('#button_no').click(function(){
			document.location.href = '/members';
		})
		$('#button_yes').click(function(){
			$('#button_no').slideUp('fast');
			$('#button_yes').slideUp('fast', function(){
				$('#remove-confirm').slideDown('fast');
			});
		})
	})

</script>

@endsection