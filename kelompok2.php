<?php
/*
Kelomok 1
- Aidika Akbar Assufa
- Dimas Agung Budianto
- Rio Adjie Wiguna
- Yuniar Friska Aprillia
- Ken Affila Syach Maulana
*/

$url = "https://berita-indo-api.vercel.app/v1/cnn-news";

$option = [
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        'Accept: application/json',
        'Content-Type: application/json; charset=utf8',
    ],
    CURLOPT_RETURNTRANSFER => 1,
];

$channel = curl_init($url);
curl_setopt_array($channel, $option);
$res = curl_exec($channel);
curl_close($channel);
$data = json_decode($res, true); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>UTS INTEROPABILITAS KELAS 2C</title>

</head>
<body>
    <h1><center>BERITA TERKINI FROM CNN NEWS</center></h1>
    <h2><center>From Kelompok 2 Kelas 2C</center></h2>
    <br>
    
    <div class="container">
        <div class="card">
            <div class="card-header">
                Berita berasal dari Berita Indonesia CNN-News
            </div>
            <?php
            $i = 0;
            foreach ($data['data'] as $key => $value) if ($i < 30) { ?>
                <?php foreach ($value['image'] as $item) { ?> 
                <img src="<?= $item ?>" class="card-img-top" alt="...">
                <?php
                } ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $value['title']?></h5>
                    <p class="card-text"><?= $value['contentSnippet'] ?></p>
                    <a href="<?= $value['link'] ?>" class="btn btn-primary">Klik untuk melihat berita selengkapnya..</a>
                </div>       
            <?php $i += 1; 
            } ?>
        </div>
    </div>
    
</body>
</html>