<?php 
$slot = 'Laravel';
?>

@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://dhvsu.edu.ph/images/ArticleImages/2021/CCS_Logo_-_New.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
