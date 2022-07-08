<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
        <img src="https://smktelkom-pwt.sch.id/wp-content/uploads/2019/02/SMA-Telkom-Bandung.png"
             class="img-fluid" width="200" height="75">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
