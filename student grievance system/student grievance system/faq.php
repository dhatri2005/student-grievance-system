<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        body {
            background-color: #f2f2f2;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        .faq-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
        }

        .faq-question {
            font-weight: bold;
            color: #007bff;
            margin-bottom: 5px;
        }

        .faq-answer {
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Frequently Asked Questions</h1>

        <?php
        // Sample questions with hardcoded answers
        $faqData = [
            "How to get mess rebate?" => "Mess rebate can be applied online through the student portal under the 'Services' section.",
            "How to pay semester fee?" => "Login to ERP, go to the 'Finance' tab, and choose 'Pay Semester Fee'.",
            "How to submit a complaint?" => "Navigate to the 'Complaint' section in your dashboard and fill out the form.",
           
            "What are the library hours?" => "The library is open from 6 AM to 10 PM on weekdays, and 10 AM to 4 PM on weekends.",
            "How to access online resources?" => "Use your institution login on the digital library portal ",
            "How to register for courses?" => "Course registration is available during the registration window on ERP > Academics > Register Courses."
        ];

        foreach ($faqData as $question => $answer) {
            echo '<div class="faq-item">';
            echo '<div class="faq-question">' . htmlspecialchars($question) . '</div>';
            echo '<div class="faq-answer">' . htmlspecialchars($answer) . '</div>';
            echo '</div>';
        }
        ?>
    </div>

</body>
</html>
