<?php
$path2 = 'admin/images/watermark.png';
$type2 = pathinfo($path2, PATHINFO_EXTENSION);
$data2 = file_get_contents($path2);
$base642 = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);
?>
<img src="<?php echo $base642; ?>" alt="watermark" style="position: absolute; z-index:-1" />
<style>
    @page {
        size: a4 portrait;
        background-color: red;
    }
</style>

<table width="111%">
    <tbody>
        <tr>
            <td width="72">
                <?php
                $path = 'admin/images/vristch.jpg';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                ?>
                <img src="<?php echo $base64; ?>" width="72px" alt="logo" />
            </td>
            <td width="303">&nbsp;</td>
            <td width="321">
                <p>35640 56th Ave S Auburn 98001 WA</p>
                <p>+1 (888) 927-5608</p>
                <p>contact@vrismetacommunication.com</p>
            </td>
        </tr>
    </tbody>
</table>
<p>
    To,<br />

    {{ $username }},<br />

    {{ $address }}<br />
    {{ \Carbon\Carbon::parse($date)->format('d-m-Y') }}
    <br />

    <b>Sub: Job Offer Letter for {{ $designation }}</b><br />
    Dear candidate, <br /><br />

    We are very excited to inform you that you have been selected to work for our
    company <b>Vristech Solutions</b> as a <b>{{ $designation }}</b>. <br /><br />
    Your duties will be to help our sales department reach the goal
    before or within the given time. You must work hard and be well communicative to work out properly our given
    tasks.<br /><br />

    We hope that you will be very forward to selling our products to the clients. Your salary will be <b>Rs.
        {{ $salary }} per
        month</b>.<br /><br />

    You will get other benefits and the appointment letter after the completion of your training period of <b>3
        Months</b>. You
    must report to our head of the H.R department on <b>{{ \Carbon\Carbon::parse($date)->addDays(7)->format('jS F Y') }}
    </b>.<br /><br />

    We are delighted to send you this offer letter for the {{ $designation }} job which you have to sign in front of
    our H.R manager on the first day of your job. </b><br /><br />
    We are happily waiting to
    work with you.<br /><br /> Thank you very much! <br />Regards<br /><br /> Jagjit Singh<br /> HR Manager<br />
    Vrsitech
    Solutions
</p>
