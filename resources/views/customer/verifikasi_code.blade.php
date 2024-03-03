<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code Form</title>
</head>

<body>
    <!-- messege  -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <h1>Verification Code Form</h1>
    <div class="verification-timer">
        <span id="timer">60</span> seconds remaining
        <button onclick="startTimer()">Resend Verification Code</button>
    </div>

    <form action="{{ url('/verification') }}" method="post">
        @csrf
        <label for="verification_code">Verification Code:</label>
        <input type="text" id="verification_code" name="verification_code" value="" required>
        <button type="submit">Submit</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let countdown;
        const timerDisplay = document.getElementById('timer');

        function startTimer() {
            let seconds = 60;
            displayTimeLeft(seconds);
            //remover
            $('.alert').remove();

            countdown = setInterval(() => {
                seconds--;
                displayTimeLeft(seconds);
                if (seconds <= 0) {
                    clearInterval(countdown);
                    timerDisplay.textContent = 'Time is up!';
                }
            }, 1000);
            $.ajax({
                url: "{{ url('/resend-verification-code') }}",
                type: "get",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);
                    let data = JSON.parse(response);
                    if (data.status == 'success') {
                        // alert-success
                        let html = +'<div class="alert alert-success" role="alert">' + data.message + '</div>';
                        $('.alert').remove();
                        $('body').append(html);

                    } else {
                        alert(data.message);
                    }
                },
            });
        }

        function displayTimeLeft(seconds) {
            timerDisplay.textContent = seconds + ' seconds remaining';
        }
    </script>
</body>

</html>