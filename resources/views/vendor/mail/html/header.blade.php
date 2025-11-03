@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<!-- <img src="{{ asset('assets/images/anssi2.png') }}" class="logo" alt="Logo CERT-BFA"> -->
 <span style="color: #2563eb; font-size: 24px; font-weight: bold;">CERT-BFA</span>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>