<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body{
                width:100%;
                height:100%;
            }

            .button{
                margin:auto;
            }
        </style>
    </head>
    <body>
        <button class="button" onClick="deleteAll()"> Button Seadanya</button>

        <script>
            function deleteAll(){
                var xhr = new XMLHttpRequest();

                // Configure it: GET-request for the URL /api/data
                xhr.open('GET', 'http://localhost:8000/api/delete_all', true);

                // Send the request
                xhr.send();

                // This will be called after the response is received
                xhr.onload = function() {
                    if (xhr.status != 200) {
                        // handle error
                        alert('gagal meneghapus data!');
                    } else {
                        // handle successful response
                        alert('berhasil menghapus data!');
                    }
                };
            }
        </script>
    </body>
</html>
