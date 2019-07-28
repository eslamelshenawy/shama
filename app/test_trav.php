<style type="text/css">
    body{background: #eee}
    .flightsAvailability-head{width: 100%;height: 50px;background: #e87601;line-height: 50px;}
    .title-flights-search p{font-size: 18px;font-weight: bold;color: #fff;}
    .title-flights-search p span{margin-left: 25px;}
    .Wefound {text-align: left;}
    .Wefound p{font-size:18px;color: #fff;}
    .Wefound p .bold{font-size:110%;font-weight: bold;}
    .date-flight{text-align: right;}

    .date-flight .date-flight-prev,
    .date-flight .date-flight-next{width: 25px;height: 25px;border: 2px solid #fff;border-radius: 50%;
        display: inline-block;cursor: pointer;padding: 0;margin: 0;
        line-height: 22px;text-align: center;font-size: 10px;font-weight: bold;outline: none;}

    .date-flight .date-flight-prev i,
    .date-flight .date-flight-next i{color:#fff;}
    .date-flight-DD-YY{color: #fff;font-size:14px;font-weight: bold;}

    .flightsAvailability-filters{width: 100%;line-height: 50px;height: 50px;background: #fff;}
    .flightsAvailability-filters .btn-primary{background: #337ab7!important;}
    .flightsAvailability-filters .a-dropdown{width: 120px;display: inline-block;text-align: center;border-right: 1px solid #999}
    .flights-company{margin-top: 20px;}
    .flights-company .item{padding: 10px;background: #fff;text-align: center;}
    .flights-company .item img{width:25%;float: left;margin-right: 10px;}
    .flights-company .owl-nav.disabled{display: block;;margin-top: 3px;text-align: left}
    .tacket-on-ward{width:55%;}
    .tacket-on-ward-head{}
    .tacket-on-ward-head span{width: 33%;line-height: 40px;font-weight: bold;font-size:16px;float: left;display: inline-block;text-align: center;}
    .tacket-on-body{border-top:1px solid #eee;}
    .tacket-on-ward-head span.change-color{background: #e87601;color: #fff}
    .tacket-on-ward-head p.date-onward{margin-bottom: 0;font-size: 14px;font-weight: bold;padding-left: 15px;color:#999999;}

    .img-air-company{width:30%;float: left;}
    .tacket-time-arrive{width:70%;float: right}
    .info-trib{margin-bottom: 0;border-bottom: 1px solid #ccc;padding-bottom: 5px;color: #e87601;margin-top: 10px;}
    .info-air-company i{color: #e87601}



    .start-time{float: left;padding: 25px 0;width: 15%;text-align: center;}
    .description-trib{display: inline-block;text-align: center;width: 70%;}
    .end-time{float: right;padding: 25px 0;width: 15%;text-align: center;}
    .img-air-company{text-align: left;font-size:14px;color:#666;font-weight: bold;padding: 15px;}
    .img-air-company img{
        width: 30%;
        margin: 5px 15px;
        display: block;
    }

    .tacket-encomy{width:45%;text-align:center;float: left}
    .tacket-encomy .encomy-head{width: 22%;float: left;margin: 0px 1px;background: #337ab7;height: 60px;color: #fff;line-height: 60px;font-size: 14px;font-weight: bold;}

    .encomy-body{
        border: 1px solid #cacaca;
        height: 130px;
        width: 22%;
        padding-top: 35px;
        font-size: 16px;
        font-weight: bold;
        color: #999;
        border-bottom: 0;
        margin: 0 1px;
        float: left;
    }
    .setting-help span.more-tackets {
        width: 110px;
        border-radius: 0;
        background: #337ab7;
        color: #fff;
    }
    .tacket-nots{width:32%;}
    .nots-head{height: 60px;}
    .nots-body{border-bottom: 1px solid #eee;}
    .setting-help{padding:15px;}
    .setting-help span{width:34px;height: 34px;border:1px solid #337ab7;color:#337ab7;border-radius: 50%;line-height: 34px;text-align: center;display: inline-block;margin:5px 0px;cursor: pointer;}
    .footer-price-span{display: inline-block;margin-right: 15px;}
    .footer-price-span span.footer-total-price{display: block;font-size:16px;font-weight: bold;color: #337ab7}

    .more-tackets{float: left;display:inline-block;width: 110px;height: 30px;background:#fff;text-align: center;line-height: 30px;font-size: 12px;font-weight: bold;cursor: pointer;}

    .collapse.show{display: block!important}


</style>

<?php
$offers = $data['dom']->getElementsByTagName('AirlineOffer');
$xpath = new \DOMXpath($data['dom']);

$ns = $data['dom']->documentElement->namespaceURI;
if($ns) {
    // echo 'ns: '.$ns.'<br>';
    $xpath->registerNamespace("ns", $ns);
    // $nodes = $xpath->query("//ns:AirShoppingRS/DataLists/FlightSegmentList/FlightSegment[@SegmentKey='SEG-NE170-NE170-201812060300-201812060600-O']");
    // $nodes = $xpath->query("//*[@SegmentKey='SEG21']");
} else {
    // $nodes = $xpath->query("//AirShoppingRS/DataLists/FlightSegmentList/FlightSegment[@SegmentKey='SEG-NE170-NE170-201812060300-201812060600-O']");
}

// print_r($nodes->item(0)->query());
?>


<!-- flightsAvailability-head -->
<div class="flightsAvailability-head hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 title-flights-search">
                <p>Cairo <i class="fas fa-plane"></i> Jeddah |<span class="small"><?=$data['language']['adults']?>(s): 1 <?=$data['language']['child']?>: 0 <?=$data['language']['Infant']?>(s): 0</span></p>
            </div>
            <div class="col-lg-6 ">
                <div class="col-lg-8 Wefound text-left">
                    <p><?=$data['language']['Wefound']?> <span class="bold">28</span> <?=$data['language']['flightsavailability']?></p>
                </div>
                <div class="col-lg-4 date-flight text-right">
                    <a class="date-flight-prev"><i class="fas fa-chevron-left"></i></a>
                    <span class="date-flight-DD-YY">15/2/2018</span>
                    <a class="date-flight-next"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
//['language']['SAR']
//var_dump($data['language']['SAR']);exit();
//var_dump($data);exit();
//?>
<!-- flightsAvailability-filters -->
<div class="flightsAvailability-filters hidden hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <span class="dropdown">
                <a class="a-dropdown" data-toggle="dropdown">
                <i class="fas fa-dollar-sign"></i>  <?=$data['language']['price']?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"><?=$data['language']['Action']?></a>
                    <a class="dropdown-item" href="#">
                        <?=$data['language']['Anotheraction']?></a>
                    <a class="dropdown-item" href="#"><?=$data['language']['Anotheraction']?></a>
                </div>
                </span>
                <span class="dropdown">
                <a class="a-dropdown" data-toggle="dropdown">
                    <i class="fas fa-map-marker-alt"></i> <?=$data['language']['Stops']?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"><?=$data['language']['Action']?></a>
                    <a class="dropdown-item" href="#">
                        <?=$data['language']['Anotheraction']?></a>
                    <a class="dropdown-item" href="#">
                        <?=$data['language']['Somethingelsehere']?></a>
                </div>
                </span>
                <span class="dropdown">
                <a class="a-dropdown" data-toggle="dropdown">
                    <i class="far fa-clock"></i> <?=$data['language']['Timings']?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"><?=$data['language']['Action']?></a>
                    <a class="dropdown-item" href="#">
                        <?=$data['language']['Anotheraction']?></a>
                    <a class="dropdown-item" href="#">
                        <?=$data['language']['Somethingelsehere']?></a>
                </div>
                </span>

            </div>
            <div class="col-lg-6 text-right">
                <button class="btn btn-primary"><i class="fas fa-search"></i> Modify Search</button>
                <button class="btn btn-primary"><i class="far fa-calendar-alt"></i> Weekly Fares</button>
            </div>
        </div>
    </div>
</div>
<!-- slider flights -->
<div class="slider-flights hidden">
    <div class="container">
        <div class="row">
            <div class="flights-company owl-carousel owl-theme">
                <div class="item">
                    <img src="eg-air.png" />
                    <div class="info-air">
                        <span><?=$data['language']['EGYPTON']?></span>
                        <h5><?=$data['language']['SAR']?> 251.52</h5>
                    </div>
                </div>
                <div class="item">
                    <img src="eg-air.png" />
                    <div class="info-air">
                        <span><?=$data['language']['EGYPTON']?></span>
                        <h5><?=$data['language']['SAR']?> 251.52</h5>
                    </div>
                </div>
                <div class="item">
                    <img src="eg-air.png" />
                    <div class="info-air">
                        <span><?=$data['language']['EGYPTON']?></span>
                        <h5><?=$data['language']['SAR']?> 251.52</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach ($offers as $key => $offer): ?>

    <?php
//    var_dump($offer);exit();
    $ref = $offer->getElementsByTagName('FlightSegmentReference')[0]->getAttribute('ref'); ?>
    <div class="col-lg-12">
        <div class="flightsAvailability">
            <!-- tiket air flight -->
            <div class="tacket-air">
                <div class="container"  style="background: #fff;min-height: 200px;margin-top: 25px;">
                    <div class="row tacket-hhead">
                        <div class="tacket-on-ward">
                            <div class="tacket-on-ward-head">
                                <span class="change-color"><?=$data['language']['Onward']?></span>
                                <span><?php
                                    echo @preg_replace('/\)/', '', explode('(', $xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                        ->getElementsByTagName('Departure')[0]
                                        ->getElementsByTagName('AirportName')[0]->nodeValue)[1]);
                                    ?></span>
                                <span><?php
                                    echo @preg_replace('/\)/', '', explode('(', $xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                        ->getElementsByTagName('Arrival')[0]
                                        ->getElementsByTagName('AirportName')[0]->nodeValue)[1]);
                                    ?></span>
                                <p class="date-onward"><?php
                                    $date = $xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                        ->getElementsByTagName('Departure')[0]
                                        ->getElementsByTagName('Date')[0]->nodeValue;

                                    if ($data != '') {
                                        $date = new \DateTime($date);
                                        echo $date->format('D d, M Y');
                                    }

                                    ?></p>
                            </div>
                        </div>
                        <div class="tacket-encomy">
                            <?php
                            $offer_offers = [];
                            $FlightSegmentReferences = $offer->getElementsByTagName('FlightSegmentReference');
                            foreach ($FlightSegmentReferences as $FlightSegmentReference) {
                                if (!in_array($FlightSegmentReference->getElementsByTagName('MarketingName')[0]->nodeValue, $offer_offers)) {
                                    $offer_offers[] = $FlightSegmentReference->getElementsByTagName('MarketingName')[0]->nodeValue;
                                }
                                else {
                                    continue;
                                }
                                echo '
                                <div class="encomy-head">
                                    '.$FlightSegmentReference->getElementsByTagName('MarketingName')[0]->nodeValue.'
                                </div>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tacket-body row">
                        <div class="tacket-on-ward">
                            <div class="tacket-on-body">
                                <div class="img-air-company">
                                    <img src="https://s3-us-west-2.amazonaws.com/tpconnects-property/airline/<?php echo $xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                        ->getElementsByTagName('MarketingCarrier')[0]
                                        ->getElementsByTagName('AirlineID')[0]->nodeValue; ?>.png">
                                    <p><?php
                                        echo $xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                            ->getElementsByTagName('MarketingCarrier')[0]
                                            ->getElementsByTagName('Name')[0]->nodeValue;
                                        ?>
                                        <?php
                                        echo ' '.$xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                                ->getElementsByTagName('MarketingCarrier')[0]
                                                ->getElementsByTagName('AirlineID')[0]->nodeValue;
                                        ?>
                                        <?php
                                        echo ' '.$xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                                ->getElementsByTagName('MarketingCarrier')[0]
                                                ->getElementsByTagName('FlightNumber')[0]->nodeValue;
                                        ?>
                                    </p>
                                </div>
                                <div class="tacket-time-arrive">
                                    <div class="start-time"><?php
                                        echo $xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                            ->getElementsByTagName('Departure')[0]
                                            ->getElementsByTagName('Time')[0]->nodeValue;
                                        ?></div>
                                    <div class="description-trib">
                                        <p class="info-trib"><?=$data['language']['Nonstop']?></p>
                                        <span class="info-air-company"> <i class="fas fa-plane"></i>
                                    <?php
                                    if ($xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                            ->getElementsByTagName('Equipment')[0]
                                            ->getElementsByTagName('Name')[0]->nodeValue != '') {
                                        echo $xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                            ->getElementsByTagName('Equipment')[0]
                                            ->getElementsByTagName('Name')[0]->nodeValue;
                                    }
                                    else {
                                        echo $xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                            ->getElementsByTagName('Equipment')[0]
                                            ->getElementsByTagName('AircraftCode')[0]->nodeValue;
                                    }

                                    ?>
                                    <i class="far fa-clock"></i> <?php
                                            $fref = $offer->getElementsByTagName('FlightReferences')[0]->nodeValue;
                                            $time = $xpath->query('//*[@FlightKey="'.$fref.'"]')->item(0);

                                            if ($time != '') {
                                                $time = $time
                                                    ->getElementsByTagName('Journey')[0]
                                                    ->getElementsByTagName('Time')[0]->nodeValue;

                                                $time = preg_replace('/PT/', '', $time);
                                                $time = preg_replace('/H/', ' Hr(s) ', $time);
                                                $time = preg_replace('/M/', ' Mins ', $time);
                                                echo $time;
                                            }
                                            else {
                                                echo '-';
                                            }
                                            ?></span>
                                    </div>
                                    <div class="end-time"><?php
                                        echo $xpath->query('//*[@SegmentKey="'.$ref.'"]')->item(0)
                                            ->getElementsByTagName('Arrival')[0]
                                            ->getElementsByTagName('Time')[0]->nodeValue;
                                        ?></div>
                                </div>
                                <div class="setting-help text-right">
                                    <span class="more-tackets" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">SHOW MORE</span>
                                    <span  data-toggle="modal" data-target="#helpModal_<?=$key?>">
                                <i class="fas fa-info"></i>
                                </span>
                                    <span  data-toggle="modal" data-target="#settingsModal_<?=$key?>">
                                <i class="fas fa-cogs"></i>
                                </span>
                                    <span  data-toggle="modal" data-target="#planeModal_<?=$key?>">
                                <i class="fas fa-plane"></i>
                                </span>

                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <?php
                        foreach ($offer->getElementsByTagName('Total') as $offer_details) {
//                        var_dump($offer_details);

                        }
                        ?>
                        <div class="tacket-encomy">
                            <div class="encomy-body">
                                <input type="radio" id="blue" name="name">
                                <label for="blue" style="display: block">
                                    <?= @floatval($offer->getElementsByTagName('Total')[0]->nodeValue) ?>
                                    <?= @$offer->getElementsByTagName('Total')[0]->getAttribute('Code') ?>
                                </label>
                            </div>
                        </div>

                    </div>
                    <!-- collaps div -->
                    <div class="collapse" id="collapseExample" style="margin-top: -5px;">
                        <div class="tacket-body row">
                            <div class="tacket-on-ward">
                                <div class="tacket-on-body">
                                    <div class="img-air-company">
                                        <img src="eg-air.png">
                                        <p>EGYPT, Air</p>
                                    </div>
                                    <div class="tacket-time-arrive">
                                        <div class="start-time">10:40</div>
                                        <div class="description-trib">
                                            <p class="info-trib">
                                                <?=$data['language']['Nonstop']?>
                                            </p>
                                            <span class="info-air-company"> <i class="fas fa-plane"></i> Airbus - 320  <i class="far fa-clock"></i> 2<?=$data['language']['Hr']?>(s) 20<?=$data['language']['Mins']?></span>
                                        </div>
                                        <div class="end-time">14:00</div>
                                    </div>
                                    <div class="setting-help text-right">
                                        <span  data-toggle="modal" data-target="#helpModal">
                                        <i class="fas fa-info"></i>
                                        </span>
                                        <span  data-toggle="modal" data-target="#settingsModal">
                                        <i class="fas fa-cogs"></i>
                                        </span>
                                        <span  data-toggle="modal" data-target="#planeModal">
                                        <i class="fas fa-plane"></i>
                                        </span>

                                        <!--  -->
                                    </div>
                                </div>
                            </div>
                            <div class="tacket-encomy">
                                <div class="encomy-body">
                                    <input type="radio" id="blue" name="name">
                                    <label for="blue" style="display: block">
                                        645 <?=$data['language']['SAR']?></label>
                                </div>
                            </div>
                            <div class="tacket-nots">
                                <div class="nots-body">

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tacket-footer row " style="background: #ccc;padding: 10px 15px">
                        <div class="col-lg-12 text-right">

                            <div class="footer-price-span">
                                <span class="footer-total-price"><?=$data['language']['SAR']?><?= @floatval($offer->getElementsByTagName('Total')[0]->nodeValue) ?></span>
                                <span class="footer-info"><i class="fas fa-info-circle"></i>
                                <?=$data['language']['FareBaggageDetails']?></span>
                            </div>
                            <button style="background: #337ab7;" class=" btn btn-primary float-right"><i class="fas fa-check"></i><?=$data['language']['book_now']?></button>
                        </div>
                    </div>

                </div>
            </div>



        </div>
        <!--
        <span class="tacket-encomy-info"><i class="fas fa-info"></i></span>
        -->
        <!-- Modal settings -->
        <div class="modal fade" id="settingsModal_<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?=$data['language']['settings.']?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$data['language']['Close']?></button>
                        <button type="button" class="btn btn-primary">
                            <?=$data['language']['SaveChanges']?>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal help -->
        <div class="modal fade" id="helpModal_<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?=$data['language']['help.']?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$data['language']['Close']?></button>
                        <button type="button" class="btn btn-primary"><?=$data['language']['SaveChanges']?></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal plane -->
        <div class="modal fade" id="planeModal_<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"
                        <?=$data['language']['Modaltitle']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$data['language']['Close']?></button>
                        <button type="button" class="btn btn-primary"><?=$data['language']['save_changes']?></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php endforeach; ?>


<script type="text/javascript">
    $(document).ready(function(){
        owl = $('.flights-company').owlCarousel({
            loop:true,
            margin:20,
            responsive:{
                0:{
                    items:2
                },
                600:{
                    items:3
                },
                1000:{
                    items:6
                }
            }
        });

    });
</script>
