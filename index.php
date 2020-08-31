<html>
    <head>      
        <link rel="stylesheet" href="cruise.css">
        <link rel="stylesheet" href="responsive.css">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <title>
            Cruise | Home Page
        </title>
        <a href="index.php"><img src="img/cruiselogo.png" alt="Cruise Logo" id="logo"></a>
        <br><br><br>        
        <nav class="main-menu">
            <ul>
<!--                <li><a href="#">Home</a></li>-->
                <li><a href="#">News</a></li>
                <li><a href="#">Cruise Lines</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="#">Reviews</a></li>
            </ul>
        </nav> 
        <?php $total = 0; ?>
        <script>var total = "<?= json_encode($total) ?>"</script>
    </head>
   
    <body>        
        <div class="container">
            <img src="img/header.jpeg" alt="Header Image" id="header">
            <div class="searchDetails">
                <div class="departfrom" onclick="document.getElementById('departfromDetails').style.display='block'">
                    <button> Depart From &#9660;  </button>                  
                </div>
                <div class="departfromDetails" id="departfromDetails" style="display:none;">
                    <div class="exit" onclick="document.getElementById('departfromDetails').style.display = 'none'" style="float:right;"> X</div>
                    <div class="items">
                        <button>All</button>
                        <button>North America</button> 
                        <button>Transatlantic</button>
                        <button>Caribbean</button>
                        <button>Mediterranean</button>
                        <button>Alaska</button>
                        <button>Africa</button>
                        <button>Australasia</button>
                        <button>British Isles</button>
                        <button>Canaries</button>
                        <button>Dutch Waterways</button>
                        <button>Middle East</button>
                        <button>Mini Cruise</button>
                    </div>
                </div>
                <div class="destination" onclick="document.getElementById('destinationDetails').style.display='block'">
                    <button> Destination &#9660; </button>
                </div>
                <div class="destinationDetails" id="destinationDetails" style="display:none;">
                    <div class="exit" onclick="document.getElementById('destinationDetails').style.display = 'none'" style="float:right;">X</div>
                    <div class="items">
                        <button>All Destinations</button>
                        <button>North America</button> 
                        <button>Transatlantic</button>
                        <button>Caribbean</button>
                        <button>Mediterranean</button>
                        <button>Alaska</button>
                        <button>Africa</button>
                        <button>Australasia</button>
                        <button>British Isles</button>
                        <button>Canaries</button>
                        <button>Dutch Waterways</button>
                        <button>Middle East</button>
                        <button>Mini Cruise</button>
                    </div>
                </div>
               <div class="departureDate" onclick="document.getElementById('departureDateDetails').style.display='block'">
                   <button>Departure Date &#9660;</button>                   
               </div>
                <div class="departureDateDetails" id="departureDateDetails" style="display:none;">
                    <div class="exit" onclick=" document.getElementById('departureDateDetails').style.display = 'none'" style="float:right;">X</div>
                    <div class="items">
                        <?php
                        $months = array();
                        for ($i = 0; $i <= 18; $i++) {
                            $timestamp = mktime(0, 0, 0, date('n') + $i, 1);
                            $months[date('M Y', $timestamp)] = date('M Y', $timestamp);
                        }

                        foreach ($months as $num => $name) {
                            echo '<button>' . $name;
                        }
                        ?></button>
                    </div>
                </div>
               <div class="cruiseline" onclick="document.getElementById('cruiseLineDetails').style.display='block'">
                   <button>Cruise Line &#9660;</button>
               </div>
               <div class="cruiseLineDetails" id="cruiseLineDetails" style="display:none;">
                    <div class="exit" onclick="document.getElementById('cruiseLineDetails').style.display = 'none'" style="float:right;">X</div>
                    <div class="items">
                        <button>All Cruise Lines</button> 
                        <button>Royal Caribbean Cruises</button>
                        <button>Celebrity Cruises</button>
                        <button>Princess Cruises</button>
                        <button>MSC Cruises</button>
                        <button>NCL Cruises</button>
                        <button>P&O Cruises</button>
                        <button>Cunard Cruises</button>
                        <button>Marella Cruises</button>
                        <button>Fred Olsen Cruises</button>
                        <button>Cruise & Maritime Voyages</button>
                        <button>Holland American Line</button>
                        <button>Carnival Cruises</button>
                    </div>
                </div>
               <div class="cruiseship" onclick="document.getElementById('cruiseShipDetails').style.display='block'">             
                   <button>Cruise Ship &#9660;</button>
               </div>
               <div class="cruiseShipDetails" id="cruiseShipDetails" style="display:none;">
                    <div class="exit" onclick=" document.getElementById('cruiseShipDetails').style.display = 'none'" style="float:right;">X</div>
                    <div class="items">
                        <button>All Cruise Ships</button> 
                        <button>A Rosa Stella Titan</button>
                        <button>Adventures of the Seas</button>
                        <button>Aegeean Odyssey</button>
                        <button>AIDAbella</button>
                        <button>AIDAcara</button>
                        <button>AIDAdiva</button>
                        <button>AIDAura</button>
                        <button>AIDAvita</button>
                        <button>Allure of the Seas</button>
                        <button>AmaBella</button>
                        <button>AmaCello</button>
                        <button>AmaCerto</button>
                    </div>
                </div>
            </div>                
        </div>
        <br><br>
        <div class="searchResults">


            
            <?php    
            $file = fopen("cruise.csv","r");
           
            for ($x = 0; $x <= 4; $x++) {
                $data = fgetcsv($file); 
                $total ++;
            ?>
                <br>
                <div class="resultContainer" id="results">
                    <div class="right-side">    
                        <div class="cruiseLineName">
                            <?= //Cruise Line Name 
                            $data[2] ?> <br><br>        
                        </div>
                        <div class="priceArea">
                            From <br>                           
                            <div class="price">
                                &pound;<?=$data[4]?> pp
                            </div>
                        </div><br>
                        <button>View Details &#x25B6;</button> <br><br>
                    </div>
                    <div class="result">
                        <h1>
                            <?= //Destination Name
                            $data[5] ?>
                        </h1>
                        <div class="resultDetails">
                            <?= //Date & Nights
                            $data[0] . '<small>' . $data[1] . '</small>'?>           
                            <p>
                                <?= //Destinations
                                $data[3] ?>
                            </p>   
                        </div>
                        <br><br>    
                    </div>
                </div>
                
            <?php }
            fclose($file);
            ?>
                <br><br>
                <div class="showMore">
                    <button id="loadMore"> Load more results </button>
                </div>
                <div class="scroll">
                    <button onclick="topFunction()" id="scroll" title="Go to top">&#9650;</button>
                </div>
        </div>
        <div class="space">&nbsp;</div>
        <footer>
            <img src="img/footerlogos.png">
            <nav class="footer-menu">
                <ul>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Legal & Privacy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Sitemap</a></li>
                </ul>
            </nav>
        </footer>
        
        <script type="text/javascript" src="cruise.js"></script>
       
    </body>
</html>
