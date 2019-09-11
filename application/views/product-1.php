<?php
require_once 'header.php';
?>
<style>
    .card-title{
        margin-bottom: 0 !important;
    }
    .card-body{
        padding: 0 !important;
    }
    .card-body img{
        height:200px !important;
        width:250px !important;
    }
</style>
<div class="clearfix py-3"></div>
<div class="w-100 breadcrumb mt-5">
    <div class="container d-inline-flex">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
    </div>
</div>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'tab1')" id="defaultOpen">Gateway Controller</button>
                    <button class="tablinks" onclick="openCity(event, 'tab2')">Basic Panel</button>
                    <button class="tablinks" onclick="openCity(event, 'tab3')">Elegant Panel</button>
                    <button class="tablinks" onclick="openCity(event, 'tab4')">Elegant Plus Panel</button>
                    <button class="tablinks" onclick="openCity(event, 'tab5')">Scenario Panel</button>
                    <button class="tablinks" onclick="openCity(event, 'tab6')">IR Blaster</button>
                    <button class="tablinks" onclick="openCity(event, 'tab7')">AC/Geyser Controller </button>
                    <button class="tablinks" onclick="openCity(event, 'tab8')">Dimmer Controller </button>
                    <button class="tablinks" onclick="openCity(event, 'tab9')">RGB Contoller </button>
                    <button class="tablinks" onclick="openCity(event, 'tab10')">Curtain Controller </button>
                    <button class="tablinks" onclick="openCity(event, 'tab11')">Gate Controller </button>
                    <button class="tablinks" onclick="openCity(event, 'tab12')">Project  Controller </button>
                    <button class="tablinks" onclick="openCity(event, 'tab13')">Yale Lock Controller</button>
                    <button class="tablinks" onclick="openCity(event, 'tab14')">LPG Valve Controller</button>
                    <button class="tablinks" onclick="openCity(event, 'tab15')">Wireless Signal Repeater</button>
                    <button class="tablinks" onclick="openCity(event, 'tab16')">480 Light Controller </button>
                    <button class="tablinks" onclick="openCity(event, 'tab17')">Simple Touch And Remote Operation</button>
                    <button class="tablinks" onclick="openCity(event, 'tab18')">Smart Plug</button>
                </div>
            </div>
            <div class="col-md-8">
                <div id="tab1" class="tabcontent">
                    <div class="w-100 p-3 row">
                        <div class="w-50 p-lg-3">
                            <div class="card">
                                <div class="card-title p-3 text-center"><h3>Basic Server - SR2100</h3></div>
                                <div class="card-body">
                                    <div class="col text-center">

                                            <img src="<?php echo base_url()  ?>data/images/navbar-product/product1.jpg" class="img-fluid ">

                                            <h3>Retis lapen casen</h3>
                                            <p>Touchnock Intelligent Controller is the brain of Touchnock Intelligent Automation Solution.</p>
<a href="<?php echo base_url() ?>product-desc" class="pull-right">Read More..</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-50 p-lg-3">
                            <div class="card ">
                                <div class="card-title text-center p-3"><h3>Advanced Server - SR2110</h3></div>
                                <div class="card-body">
                                    <div class="col text-center">

                                            <img src="<?php echo base_url() ?>data/images/products/product2.jpg" class="img-fluid mr-3">

                                            <h3>Retis lapen casen</h3>
                                            <p>Touchnock Intelligent Controller is the brain of Touchnock Intelligent Automation Solution.</p>
                                            <a href="<?php echo base_url() ?>product-desc" class="pull-right">Read More..</a>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                  <!--  <ul class="nav nav-tabs " role="tablist ">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab21" role="tab" data-toggle="tab">Basic Server - SR2100</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab22" role="tab" data-toggle="tab">Advanced Server - SR2110</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <!--<div class="tab-content">
                        <div role="tabpanel" class="tab-pane  in active" id="tab21">
                            <div class="w-100 p-3 row">

                          <div class="w-25">
                              <img src="<?php /*echo base_url() */?>data/images/products/product1.jpg" class="img-fluid mr-3">
                          </div>
                          <div class="w-75">
                              <h3 class="text-center">Basic Server - SR2100</h3>
                              <p class="mt-3">Touchnock Intelligent Controller is the brain of Touchnock Intelligent Automation Solution. It is the system controller that integrates gateways to external networks including ZigBee (Sensor network), and Access-point (IP network). All triggers and alerts originating from the connected devices first reach the Touchnock Controller which processes the data based on the information in the internal database and then issues appropriate commands and signals to the target devices.</p>
                             <br>
                              <p>It is an ideal and economical choice for homes and business. It can coordinate all of the systems in your home to talk to each other. The system provides enhanced comfort, safety, convenience and energy savings by coordinating lighting, heating and air, security, scenes and messaging based on activity.</p>
                              <br>
                              <p>Touchnock systems are simple to understand and operate (More User-friendly), which is why they are Automation Simplified®.</p>
                          </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab22">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php /*echo base_url() */?>data/images/products/product2.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">Advanced Server - SR2110</h3>
                                    <p class="mt-3">Touchnock Intelligent Controller is the brain of Touchnock Intelligent Automation Solution. It is the system controller that integrates gateways to external networks including ZigBee (Sensor network), and Access-point (IP network). All triggers and alerts originating from the connected devices first reach the Touchnock Controller which processes the data based on the information in the internal database and then issues appropriate commands and signals to the target devices.</p>
                                    <br>
                                    <p>It is an ideal and economical choice for homes and small business. It can coordinate all of the systems in your home to talk to each other. The system provides enhanced comfort, safety, convenience and energy savings by coordinating lighting, heating and air, security, scenes and messaging based on activity and schedules.</p>
                                    <br>
                                    <p>Touchnock systems are simple to understand and operate (More User-friendly), which is why they are Automation Simplified®</p>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>

                <div id="tab2" class="tabcontent">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab31" role="tab" data-toggle="tab">
                                7V1F</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab32" role="tab" data-toggle="tab">7VWS1F</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab33" role="tab" data-toggle="tab">
                                4VBT1F</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab34" role="tab" data-toggle="tab">

                                4VSBT1F</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane  in active" id="tab31">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php echo base_url() ?>data/images/products/product1.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">7+1 Variant </h3>
                                    <p class="mt-3">7+1 Basic Panel controls 7 light circuits and a fan regulator is designed for elegance and robustness. Easily flush mounted into existing switch boxes it requires no additional wiring or alterations to the aesthetics of your home. With capacitive touch controls, ready to use IR remote control and an app designed to take control of your lights from anywhere makes it the most competitive product in the market. Ideal for homes that exhibit the latest in modern comforts, these inserts possess an unmistakable, enduring aura that will set the trend for the future.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab32">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php echo base_url() ?>data/images/products/product2.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">Advanced Server - SR2110</h3>
                                    <p class="mt-3">Touchnock Intelligent Controller is the brain of Touchnock Intelligent Automation Solution. It is the system controller that integrates gateways to external networks including ZigBee (Sensor network), and Access-point (IP network). All triggers and alerts originating from the connected devices first reach the Touchnock Controller which processes the data based on the information in the internal database and then issues appropriate commands and signals to the target devices.</p>
                                    <br>
                                    <p>It is an ideal and economical choice for homes and small business. It can coordinate all of the systems in your home to talk to each other. The system provides enhanced comfort, safety, convenience and energy savings by coordinating lighting, heating and air, security, scenes and messaging based on activity and schedules.</p>
                                    <br>
                                    <p>Touchnock systems are simple to understand and operate (More User-friendly), which is why they are Automation Simplified®</p>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab33">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php echo base_url() ?>data/images/products/product1.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">4+1 Variant BASIC Touch </h3>
                                    <p class="mt-3">7+1 Basic Panel controls 7 light circuits and a fan regulator is designed for elegance and robustness. Easily flush mounted into existing switch boxes it requires no additional wiring or alterations to the aesthetics of your home. With capacitive touch controls, ready to use IR remote control and an app designed to take control of your lights from anywhere makes it the most competitive product in the market. Ideal for homes that exhibit the latest in modern comforts, these inserts possess an unmistakable, enduring aura that will set the trend for the future.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab34">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php echo base_url() ?>data/images/products/product1.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">4+1 Variant With Scenario BASIC Touch</h3>
                                    <p class="mt-3">4+1 Basic Panel controls 4 light circuits and a fan regulator is designed for elegance and robustness. Easily flush mounted into existing switch boxes it requires no additional wiring or alterations to the aesthetics of your home. With capacitive touch controls, ready to use IR remote control and an app designed to take control of your lights from anywhere makes it the most competitive product in the market. Ideal for homes that exhibit the latest in modern comforts, these inserts possess an unmistakable, enduring aura that will set the trend for the future.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tab3" class="tabcontent">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#tab41" role="tab" data-toggle="tab">
                                7VPA1F</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab42" role="tab" data-toggle="tab">7VPA2F</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab43" role="tab" data-toggle="tab">
                                5VPA1F</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab44" role="tab" data-toggle="tab">
                                5VPA2F</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab45" role="tab" data-toggle="tab">
                                4VPA2F</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab46" role="tab" data-toggle="tab">
                                2VPA</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane  in active" id="tab41">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php echo base_url() ?>data/images/products/product1.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">7+1 Variant  Premium Acrylic </h3>
                                    <p class="mt-3">7+1 Elegant Panel controls 7 light circuits and a fan regulator is designed for elegance and robustness. Easily flush mounted into existing switch boxes it requires no additional wiring or alterations to the aesthetics of your home. With capacitive touch controls, ready to use IR remote control and an app designed to take control of your lights from anywhere makes it the most competitive product in the market. Ideal for homes that exhibit the latest in modern comforts, these inserts possess an unmistakable, enduring aura that will set the trend for the future.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab42">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php echo base_url() ?>data/images/products/product2.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">7+2 Variant Premium Acrylic </h3>
                                    <p class="mt-3">7+2 Elegant Panel controls 7 light circuits and 2 fan regulator is designed for elegance and robustness. Easily flush mounted into existing switch boxes it requires no additional wiring or alterations to the aesthetics of your home. With capacitive touch controls, ready to use IR remote control and an app designed to take control of your lights from anywhere makes it the most competitive product in the market. Ideal for homes that exhibit the latest in modern comforts, these inserts possess an unmistakable, enduring aura that will set the trend for the future.</p>

                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab43">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php echo base_url() ?>data/images/products/product1.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">5+1 Variant Premium Acrylic</h3>
                                    <p class="mt-3">5+1 Elegant Panel controls 5 light circuits and 1 fan regulator is designed for elegance and robustness. Easily flush mounted into existing switch boxes it requires no additional wiring or alterations to the aesthetics of your home. With capacitive touch controls, ready to use IR remote control and an app designed to take control of your lights from anywhere makes it the most competitive product in the market. Ideal for homes that exhibit the latest in modern comforts, these inserts possess an unmistakable, enduring aura that will set the trend for the future.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab44">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php echo base_url() ?>data/images/products/product1.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">5+2  Variant Premium Acrylic</h3>
                                    <p class="mt-3">5+2 Elegant Panel controls 2 light circuits and 2 fan regulator is designed for elegance and robustness. Easily flush mounted into existing switch boxes it requires no additional wiring or alterations to the aesthetics of your home. With capacitive touch controls, ready to use IR remote control and an app designed to take control of your lights from anywhere makes it the most competitive product in the market. Ideal for homes that exhibit the latest in modern comforts, these inserts possess an unmistakable, enduring aura that will set the trend for the future.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab45">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php echo base_url() ?>data/images/products/product1.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">4+2 Variant Premium Acrylic </h3>
                                    <p class="mt-3">4+2 Elegant Panel controls 4 light circuits and 2 fan regulator is designed for elegance and robustness. Easily flush mounted into existing switch boxes it requires no additional wiring or alterations to the aesthetics of your home. With capacitive touch controls, ready to use IR remote control and an app designed to take control of your lights from anywhere makes it the most competitive product in the market. Ideal for homes that exhibit the latest in modern comforts, these inserts possess an unmistakable, enduring aura that will set the trend for the future.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab46">
                            <div class="w-100 p-3 row">
                                <div class="w-25">
                                    <img src="<?php echo base_url() ?>data/images/products/product1.jpg" class="img-fluid mr-3">
                                </div>
                                <div class="w-75">
                                    <h3 class="text-center">2 Variant Premium Acrylic</h3>
                                    <p class="mt-3">2+2 Elegant Panel controls 2 light circuits  is designed for elegance and robustness. Easily flush mounted into existing switch boxes it requires no additional wiring or alterations to the aesthetics of your home. With capacitive touch controls, ready to use IR remote control and an app designed to take control of your lights from anywhere makes it the most competitive product in the market. Ideal for homes that exhibit the latest in modern comforts, these inserts possess an unmistakable, enduring aura that will set the trend for the future.</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'footer.php';
?>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
