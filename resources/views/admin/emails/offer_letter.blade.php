<p>Dear {{ $username }},<br /><br />I am pleased to inform you that we would like to extend an offer of employment
    to
    you as&nbsp;<strong>{{ $designation }}</strong>&nbsp;at&nbsp;<strong>Vristech Solutions</strong>. After careful
    consideration of your qualifications and experience, we believe that you would make a valuable addition to our
    team.<br /><br />The details of the offer are as follows:<br /><br />Start
    date:&nbsp;<strong>{{ \Carbon\Carbon::parse($date)->format('jS F Y') }}</strong><br />Annual
    salary: Rs. &nbsp;<strong>{{ $salary * 12 }}</strong> LPA<br />This offer is contingent upon the
    satisfactory completion of reference checks, verification of your employment eligibility, and a background check.
    Please let us know if there are any additional details you would like to discuss before accepting the
    offer.<br /><br />We are excited to welcome you to our team and believe that you will make a significant
    contribution to the success of our company.<br /><br />Please let us know if you have any questions or concerns, and
    if you are ready to accept this offer, please sign and return the attached offer letter
    by&nbsp;<strong>{{ \Carbon\Carbon::parse($date)->addDays(7)->format('jS F Y') }}</strong>.<br /><br />Thank you for
    your time and consideration. We look forward to working with
    you.<br /><br />Sincerely,<br /><br />Jagjit Singh</p>
