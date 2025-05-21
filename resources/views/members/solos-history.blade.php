@include('members.layout.header')
@include('members.layout.menu')


</div>
<div class="wrapper">
	<div class="description">
		<h1>Solo Mailing History and Tracking</h1>
		<div class="par">

			How many people read your solo ad email? This is where you find out.
			Notice the opens and the clicks.
		</div>
	</div>

	<div class="main-content-main">

		<div class="main-content-wrapper2">

			<table class="main_table" border="1">
				<thead>
					<tr>
						<th>Message Subject</th>
						<th>Send Date</th>
						<th>Status </th>
						<th># of emails sent</th>
						<th># of opens</th>
						<th># of clicks</th>
						{{-- <th>Resend</th> --}}
					</tr>
				</thead>
				<tbody>

					@foreach($mailings as $mailing)
					<tr>
						<td width="250px"> {{ $mailing->subject }}</td>
						<td width="90px" style="text-align: center">{{ $mailing->updated_at }}</td>
						<td width="120px" style="text-align: center">
							{{ $mailing->status }}
						</td>
						@if($mailing->status == 'queued')
						<td width="120px" style="text-align: center">
							0
						</td>
						@else
						<td width="120px" style="text-align: center">
							{{ $mailing->recipients }}
						</td>
						@endif
						<td width="120px" style="text-align: center">
							{{ $mailing->views }}
						</td>
						<td width="100px" style="text-align: center">
							{{ $mailing->clicks }}
						</td>
						{{-- 						<td width="90px" style="text-align: center">
							<a href='/listjoe/index/sendmail/id/242721'>
								Load message
							</a>
						</td> --}}
					</tr>
					@endforeach


				</tbody>
			</table>
		</div>
	</div>
</div>


@include('members.layout.sidebar-spotlight')
@include('members.layout.footer')