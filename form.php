<!DOCTYPE HTML>
<html>

<head>
</head>

<body>
        <script>
        $(function(){
            $("input").prop('required',true);
            $("textarea").prop('required',true);
        });
        </script>

        <?php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $subject = $_POST['subject'];
        $from = 'From: WebsiteForms';
        $to = 'comment@comments.com';


        $body = "From: $name\n E-Mail: $email\n Message:\n $message";

         if ($_POST['submit']) {
            if (mail ($to, $subject, $body, $from)) {

            } else {
                echo '<p class="smaller">Sorry! Something went wrong, please go back and try again.</p>';
            }
        }

        ?>


</body>
</html>
