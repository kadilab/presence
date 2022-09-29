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
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row mt-3 mb-3">
                        <label for="inputDate" class="col-sm-1 col-form-label">Date :</label>
                        <div class="col-sm-3">
                            <input type="date" id="date_select" class="form-control">
                        </div>
                        <div class="col-sm-3">
                        <button class="btn btn-primary" id="jsPDF">Imprimer</button>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped"  id="styledTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Poste-nom</th>
                                <th scope="col">Prenom</th>
                                <th scope="col">Date</th>
                                <th scope="col">Heure d'arriver</th>
                                <th scope="col">Heure de sortie</th>
                                <th scope="col">Etat</th>
                            </tr>
                        </thead>
                        <tbody id="users">

                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </section>
    </main><!-- End #main -->
    <?php include 'include/js.php';?>

    <script>
    $(document).ready(function() {


        $.ajax({
            url: "controler/get_agent_log.php",
            type: 'POST',
            data: {
                'date': "NaN-NaN-NaN",
            }
        }).done(function(data) {
            $('#users').html(data);
        });
        setInterval(function() {
            var date_select = new Date($('#date_select').val());
            var day = date_select.getDate();
            var month = date_select.getMonth() + 1;
            var year = date_select.getFullYear();
            $.ajax({
                url: "controler/get_agent_log.php",
                type: 'POST',
                data: {
                    'date': [year, month, day].join('-'),
                }
            }).done(function(data) {
                $('#users').html(data);
            });
        }, 100);
    });
    </script>

</body>

</html>