@if($mailData['action'] == 'sendRequestMessage' )
<p>
    Hi, <br>
        You have a new email from the website system. <br><br>
        <strong>Details</strong><br>
        <strong>Name:</strong>{{$mailData['name']}}<br>
        <strong>Company:</strong>{{$mailData['company']}}<br>
        <strong>Title:</strong>{{$mailData['title']}}<br>
        <strong>Email:</strong>{{$mailData['email']}}<br>
        <strong>Phone:</strong>{{$mailData['phone']}}<br>
        <strong>Required Service:</strong>{{$mailData['service']}}<br>
        <strong>Message:</strong><br>
        <p>{{$mailData['message']}}</p>
    </p>
@else
<p>
Hi, <br>
    You have a new appointment request sent from the MirafConsult web system. <br><br>
    <strong>Details</strong><br>
    <strong>Name:</strong>{{$mailData['name']}}<br>
    <strong>Email:</strong>{{$mailData['email']}}<br>
    <strong>Phone:</strong>{{$mailData['phone']}}<br>
    <strong>Date:</strong>{{$mailData['date']}}<br>
    <strong>Time:</strong>{{$mailData['time']}}<br>
    <strong>Message:</strong>{{$mailData['message']}}<br>
</p>
@endif