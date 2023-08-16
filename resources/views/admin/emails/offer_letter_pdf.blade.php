<html>

<head>
    <style>
        /**
            * Set the margins of the PDF to 0
            * so the background image will cover the entire page.
            **/
        @page {
            margin: 0cm 0cm;
        }

        /**
            * Define the real margins of the content of your PDF
            * Here you will fix the margins of the header and footer
            * Of your background image.
            **/
        body {
            margin-top: 3.5cm;
            margin-bottom: 1cm;
            margin-left: 1cm;
            margin-right: 1cm;
        }

        /**
            * Define the width, height, margins and position of the watermark.
            **/
        #watermark {
            position: fixed;
            bottom: 0px;
            left: 0px;
            /** The width and height may change
                    according to the dimensions of your letterhead
                **/
            width: 21.8cm;
            height: 28cm;

            /** Your watermark should be behind every content**/
            z-index: -1000;
        }
    </style>
</head>


<body>
    <div id="watermark">
        <img src="https://www.helpandsupportllc.net/public/<?php echo $letter_head; ?>" height="100%" width="100%" />
    </div>

    <main>
        <!-- The content of your PDF here -->


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
            must report to our head of the H.R department on
            <b>{{ \Carbon\Carbon::parse($date)->addDays(7)->format('jS F Y') }}
            </b>.<br /><br />

            We are delighted to send you this offer letter for the {{ $designation }} job which you have to sign in
            front of
            our H.R manager on the first day of your job. </b><br /><br />
            We are happily waiting to
            work with you.<br /><br /> Thank you very much! <br />Regards<br /><br /> Jagjit Singh<br /> HR
            Manager<br />
            Vrsitech
            Solutions
        </p>

    </main>
</body>

</html>
