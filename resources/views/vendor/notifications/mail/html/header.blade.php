@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://www.arsatraining.com/img/arsa_logo.png" class="logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
