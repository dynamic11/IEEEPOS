<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Billing e.g. invoices and receipts</title>
<link href="emailCSS/bill_styles.css" media="all" rel="stylesheet" type="text/css" />
</head>

<body itemscope itemtype="http://schema.org/EmailMessage">

<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" width="600">
			<div class="content">
				<table class="main" width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td class="content-wrap aligncenter">
							<h2 class="aligncenter">Your {{$orderedBook->book->book_name}} book is ready for pick up!</h2>
							<p>show the following code to a volunteer in our office to receive your book.</p>
							<h2 class="aligncenter">{{$orderedBook->order_code}}</h2>
							<p>Your order must be picked up by the last day of classes or it will be cancelled and no refund will be provided.</p>							
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