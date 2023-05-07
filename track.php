<?php
require 'config/config.php';
require 'config/pdo.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
include 'form_handler/fetchdata.php';



?>
<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
</div>
<div class="toasts-top-right fixed" id="toastsContainerTopRight">

</div>
<div class="sub-wrapper2">
    <h1 class="main-header1">Track Parcel</h1>
    <hr class="line">
</div>
<div class="container-fluid">
    <div class="fluid-col">
        <div class="card-1 card-outline card-primary">
            <div class="card-body">
                <div class="track-div">
                    <!-- <label for="">Enter Tracking Number</label> -->
                    <div class="input-group">
                        <form action="track.php" method="POST" id="tracker" class="capture-input">
                            <input type="search" name="track_no" class="form-control form-control2" id="ref_no" placeholder="Enter tracking Number" required>
                            <input type="submit" name="submit" class="search-btn" value="Track">
                            <br>
                        </form>
                    </div>
                </div>
                <div class="error-display">
                    <?php
                    if (in_array("<span style='color: red;'>Tracking Number Not Found</span><br>", $err_array)) {
                        echo "<span style='color: red;'>Tracking Number Not Found</span><br>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            // while ($rows = mysqli_fetch_assoc($result)) :
            ?>

            <!-- <?php //endwhile; 
                    ?> -->



            <!-- <div class="sub-col">
                <div class="timeline" id="parcel_history">

                </div>
            </div> -->
        </div>
        <!-- <div id="clone_timeline-item" class="d-none">
            <div class="item">
                <i class="fas fa-box bg-blue"></i>
                <div class="timeline-item">
                    <span class="time"></span>
                    <div class="timeline-body">

                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div id="map" class="mymap"></div>
</div>

<script src="assets/js/handler.js"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>
    (g => {
        var h, a, k, p = "The Google Maps JavaScript API",
            c = "google",
            l = "importLibrary",
            q = "__ib__",
            m = document,
            b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
            r = new Set,
            e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a)
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })
    ({
        key: "AIzaSyB3OescahbXQEeGpLf3N61FwiIVSiIvaVk",
        v: "beta"
    });
</script>
<script src="assets/js/map.js"></script>
<!-- <script defer src="https://maps.googleapis.com/maps/api/js?Key=AIzaSyB3OescahbXQEeGpLf3N61FwiIVSiIvaVk&callback=initMap"> -->
</script>