<table>
	<tr></tr>

	@foreach($data as $image)
		@if($loop->even)
			{{-- SKIP --}}
		@else
			<tr>
				<td></td>
				<td rowspan="17" colspan="7"></td>
				<td></td>
				<td rowspan="17" colspan="7"></td>
			</tr>

			@for($i = 0; $i < 16; $i++)
				<tr>
					<td></td>
					<td></td>
				</tr>
			@endfor

			<tr>
				<td></td>
				<td colspan="7"></td>
				<td></td>
				<td colspan="7"></td>
			</tr>
			
			{{-- spacing --}}
			<tr>
				@for($i = 0; $i < 4; $i++)
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				@endfor
			</tr>

			<tr>
				@for($i = 0; $i < 4; $i++)
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				@endfor
			</tr>
		@endif
	@endforeach
</table>