<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php';?>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <?php include 'include/header.php';?>
    </header><!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <?php include 'include/aside.php';?>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Agents disponble</h6>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Total <span>| Agents</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 id="agts">0</h6>
                                            <span class="text-success small pt-1 fw-bold">Agents</span> <span
                                                class="text-muted small pt-2 ps-1">dispo</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Agents present</h6>
                                        </li>


                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Presence <span>| Aujourd'hui</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-calendar-date"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 id="agtss">0</h6>
                                            <span class="text-success small pt-1 fw-bold">Agents</span> <span
                                                class="text-muted small pt-2 ps-1">present</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->
                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->

    <?php include 'include/js.php';?>
    <script>
    $(document).ready(function() {
        var date_select = new Date();
        var day = date_select.getDate();
        var month = date_select.getMonth() + 1;
        var year = date_select.getFullYear();
        $.ajax({
            url: "controler/cont.php",
            type: 'POST',
            data: {
                'table': 'agents',
            }
        }).done(function(data) {
            $('#agts').html(data);
        });
        $.ajax({
            url: "controler/cont.php",
            type: 'POST',
            data: {
                'table': 'agent_log',
                'date': [year, month, day].join('-'),
            }
        }).done(function(data) {
            $('#agtss').html(data);
        });
        setInterval(function() {
            $.ajax({
                url: "controler/cont.php",
                type: 'POST',
                data: {
                    'table': 'agents',
                }
            }).done(function(data) {
                $('#agts').html(data);
            });
            $.ajax({
                url: "controler/cont.php",
                type: 'POST',
                data: {
                    'table': 'agent_log',
                    'date': [year, month, day].join('-'),
                }
            }).done(function(data) {
                $('#agtss').html(data);
            });
        }, 100);
    });
    </script>
</body>

</html>