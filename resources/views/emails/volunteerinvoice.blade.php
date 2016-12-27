<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Billing e.g. invoices and receipts</title>
<link href="css/common.css" media="all" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>

<body itemscope itemtype="http://schema.org/EmailMessage">

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="content-wrap">
							<p>Thank you <b>{{$volunteer->name}}</b>,</p>
              <p>We look forward to seeing you at the following volunteer shifts:</p>
              <ul>
                @foreach($shiftsSelected as $shift)
                  <li>{{$shift->day}} @ {{$shift->shift_time}}</li>
                @endforeach
              </ul>
							<p>Happy Volunteering,<br />
								<b>IEEE Carleton</b></p>
						</td>
					</tr>
				</table>
				</div>
		</td>
		<td></td>
	</tr>
</table>

</body>
</html>
