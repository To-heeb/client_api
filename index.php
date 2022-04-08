<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Animate.css Stylesheet-->
    <link href="path/animate.css" type="text/css" rel="stylesheet">
    <!--Bootstrap Stylesheet-->
    <link href="../../path/css/bootstrap.css" type="text/css" rel="stylesheet">
    <!--Fontawesome Stylesheet-->
    <link href="path/fontawesome/css/all.css" type="text/css" rel="stylesheet">
    <!-- Favicon image -->
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGp7GuRC0yD309N0PL_2zkbb5GSplS07CbBA&usqp=CAU" type="image/png" sizes="16x16">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Yuji+Hentaigana+Akebono&display=swap');

        * {
            border: 0px solid red;
        }

        body {
            background-color: #6d7cc5;
        }

        #neumorph-div {
            border-radius: 50px;
            background: #6d7cc5;
            box-shadow: 20px 20px 60px #5d69a7,
                -20px -20px 60px #7d8fe3;
        }

        #random-api-logo {
            font-family: 'Yuji Hentaigana Akebono', cursive;
            font-style: italic;
        }

        #info {
            font-size: large;
        }

        .btn-reload {
            border-radius: 50px;
            background: linear-gradient(315deg, #c9c0c7, #a9a1a7);
            box-shadow: -20px 20px 60px #a0989e,
                20px 20px 60px #d8ced6;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
            $base_url = "https://randomuser.me/api/";

            //initailize session with the base url
            $curl_session = curl_init($base_url);

            //curl set options
            curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($curl_session, CURLOPT_HEADER, FALSE);

            //execute curl sesssion
            $response = curl_exec($curl_session);

            //close curl session
            curl_close($curl_session);

            //decode response from json to object
            $result = json_decode($response);

            //play with the result
            if (!empty($result)) {
                // echo "<pre>";
                // print_r($result);
                // echo "</pre>";

                if (count($result->results) > 0) {
                    include_once "countries.php";
                    //var_dump($countries_list);
            ?>
                    <div class="offset-md-2 offset-1 col-md-8 col-10 text-center mt-md-5 mt-5 mb-5 pb-5" style="border: 0px solid black;" id="neumorph-div">
                        <p class="text-center">
                        <h1 id="random-api-logo">Random Api</h1>
                        </p>
                        <div class="row">
                            <div class="col-md-4 col-4 offset-md-4 offset-4">
                                <div class="text-center">
                                    <img src="<?php echo $result->results[0]->picture->large; ?>" alt="" class="img-fluid" height="150px" width="150px" style="z-index: 0; border-radius: 50%; border: 3px dashed black ;">
                                    <p>Hi, I am</p>
                                    <h3><?php echo  $result->results[0]->name->first . " " . $result->results[0]->name->last; ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center mt-2">
                                <b id="info"><?php echo $result->results[0]->location->country; ?>
                                    <img src="<?php foreach ($countries_list as $key => $value) {
                                                    if ($result->results[0]->location->country == $value) {
                                                        $country_code = strtolower($key);
                                                        echo "https://flagcdn.com/16x12/$country_code.png";
                                                    }
                                                } ?>" alt="<?php echo $result->results[0]->location->country . "'s flag"; ?>" width="20" height="17"> | <?php echo $result->results[0]->dob->age; ?> | <?php echo $result->results[0]->email; ?>
                                </b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" onclick="reload()" class="btn btn-reload d-block mx-auto mt-4 px-5">Refresh</button>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "The result is empty";
            }
            ?>
        </div>
    </div>
    <script type="text/javascript" language="javascript">
        function reload() {
            location.reload();
        }
    </script>
</body>

</html>