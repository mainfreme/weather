<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pogoda - Warszawa</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="/weather/public/js/app.js"></script>
        <link href="/weather/public/css/app.css" rel="stylesheet">
    </head>
    <body>
        <div class="weather-site">
            <div class="col-md-12">
                <div class="row">
                    <section class="weather">
                        <div class="col-md-5 col-md-offset-5 col-sm-6 col-sm-offset-5 box">

                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Pogoda dla Warszawy</h3>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-6">
                                            Lon: <?= $data->coord->lon ?>
                                        </div>
                                        <div class="col-md-6 col-xs-6">
                                            Lat: <?= $data->coord->lat ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="https://openweathermap.org/img/w/<?= $data->weather['0']->icon ?>.png" /> <?= $data->weather['0']->description ?>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12 col-xs-6">
                                                    <h4>Temperatura</h4>
                                                    <?= $data->main->humidity ?> &#186 F <br />
                                                    <?= round(5 / 9 * ($data->main->humidity - 32), 1) ?> &#186 C
                                                </div>
                                                <div class="col-md-12 col-xs-6">
                                                    <h4>Wiatr</h4>
                                                    <?= $data->wind->speed ?> ms
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
