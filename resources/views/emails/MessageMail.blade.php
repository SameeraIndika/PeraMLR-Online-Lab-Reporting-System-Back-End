<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content=width-device-widdth, initiial-scale=1.0>
<meta http-equiv="X-UA-Compatible content="ie=edge>
<title>User Mail</title>
</head>
<body>
<h3>Hello PeraMLR!</h3>
<table>
<tr>
<td><b>Customer Name:</b></td>
<td></td><td></td><td></td><td></td><td></td>
<td>{{$customer_message['sender_name']}}</td>
</tr>
<tr>
<td><b>Customer Email:</b></td>
<td></td><td></td><td></td><td></td><td></td>
<td>{{$customer_message['sender_email']}}</td>
</tr>
<tr>
<td><b>Subject:</b></td>
<td></td><td></td><td></td><td></td><td></td>
<td>{{$customer_message['subject']}}</td>
</tr>
<tr>
<td><b>Message:</b></td>
<td></td><td></td><td></td><td></td><td></td>
<td>{{$customer_message['message']}}</td>
</tr>
</table>
<h3>Thank You!</h3>

</body>
</html>