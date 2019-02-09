<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ url('css/app.css')}}">
</head>
<body>
<h1>Hello World</h1>

<!-- {{ $a=1 }} -->

@php ($a=2)

@if ($a==0)
	
		<h2>My First If Condition</h2>

@elseif ($a==2)

		<h2>My First Else If COndition</h2>

@else
		<h2>My First Else Condition</h2>

@endif


@php ($a=5)
<ul>
@for ($i=0;$i<$a;$i++)
	<li>
		{{$i}}
	</li>
@endfor
</ul>


@php ($arr=[1,2,5,3,1,4,5,5,3,3])
<table>
	<tr>
 @foreach($arr as $a)
       
        <td>
        	{{$a}}
        </td>
       
@endforeach

@php ($n=0)

@while ($n!=10)
	<p>Para tag</p>
	@php ($n++)
@endwhile

<img src="{{ url('img/values_chart.png')}}">


</tr>
</table>
</body>
</html>