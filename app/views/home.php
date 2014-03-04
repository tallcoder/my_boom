<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Duane's BOOM</title>

    <link rel="stylesheet" href="assets/css/styles.css" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>

    <style>
    body {
        background-color: black !important;
    }

    .well a {
        float: left;
        margin-right: 15px;
        margin-bottom: 15px;
        width: 167px;
    }

    .top_well {
        font-family: 'Quicksand', sans-serif;
        text-align: center;
        font-size: 64px;
        color: white;
        text-shadow: black 0.1em 0.1em 0.2em
    }

    div.bottom_well {
        width: 835px;
        position: absolute;
        top: -100px;
        height: auto;
    }

    div.track_well {
        width: 835px;
        position: absolute;
        top: -475px;
    }

    div.track {
        margin-right: 5px;
        margin-bottom: 5px;
        padding: 5px;
        width: 260px;
        height: 17px;
        float: left;
        text-align: center;
    }

    div.track span {
        position: relative;
        top: 1px;
    }
    </style>

    <script src="assets/js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/js/lib.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>
    <div id="screenport">
        <div id="header">
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <div class="in">
                <div class="top_well">
                    Duane's BOOM
                    <br/>
                    <span style="font-size:12px;font-style:italic;">Built on Laravel</span>
					<br/>
					<span style="font-size:12px;margin-right:30px;"><a href="https://www.digitalocean.com/?refcode=1efc557fd786">Rent a server and help support my playground.</a></span>
                </div>
            </div>
        </div>

        <div id="content">
            <div class="in">
                <div class="well bottom_well">
                    <?php
                    foreach ($dirs AS $dir)
                    {
                        $replace_arr = array('.org', '.com', '.net', '.gov');
                        $dev_url = str_replace($replace_arr, '.duane.boom', $dir);

                        if (strlen($dir) > 24) {
                            $dir = substr($dir, 0, (strlen($dir) - 18)).'..';
                        }

                        echo '<a class="btn btn-inverse" target="_blank" href="http://'.$dev_url.'">'.$dir.'</a>';
                    }
                    ?>
                </div>

                <div class="well track_well">
                    <div style="margin: 0 auto; width:109px;">My Latest Tracks</div>
                    <br/>
                    <?php
                    for ($track_count = 0; $track_count <= 5; $track_count++) {
                        echo '<div class="track label label-info">'.($track_count == 0 ? '<i class="icon-play pull-left"></i> ' : '').'<span>'.$recent_tracks[$track_count]['artist']['#text'].' - '.$recent_tracks[$track_count]['name'].'</span></div>';
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
<?php
function is_dir_empty($dir)
{
    if (!is_readable($dir)) return NULL;
    return (count(scandir($dir)) == 2);
}
?>