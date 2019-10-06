<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		th{background-color:#3C8DBC;color:#fff;}
	</style>
</head>
<body>
<table>
	<head>
		<tr>
			<th>SL</th>
			<th>Mobile Number</th>
			<th>Present Organization</th>
			<th>Present Designation</th>
			<th>Salary Expectation</th>
			<th>Siganture</th>
			<th>Remarks</th>
		</tr>
	</head>
	<tbody>
		@php
			$i=0;
		@endphp
		@foreach ($results as $result)
		@php
				$i++;
			@endphp	
		<tr>
			<td>{{$i}}</td>
			{{-- <td><img src="{{asset('storage/employee_photo/'.$result->Photo)}}" alt="Picture Not Found!"></td> --}}
			<td>{{$result->FirstName}} {{$result->LastName}}</td>
			<td>{{$result->Company}}</td>
			<td>{{$result->Possition}}</td>
			<td>{{$result->ExpectedSalary}}</td>
			<td>{{$result->Position}}</td>
			<td></td>
			<td></td>
		</tr>
		@endforeach
	</tbody>
</table> 
</body>
</html>