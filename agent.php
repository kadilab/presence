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
            <div class="row">
                <div class="col-lg-12">
                    <div class="modal fade" id="verticalycentered" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Formulaire agent</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row mb-3">
                                            <label for="nom" class="col-sm-3 col-form-label">Nom</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="nom" name="nom" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="post-nom" class="col-sm-3 col-form-label">Post-nom</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="postnom" name="post-nom" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="prenom" class="col-sm-3 col-form-label">Prenom</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="prenom" name="prenom" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="matricule" class="col-sm-3 col-form-label">Matricule</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="matricule" required name="matricule" class="form-control">
                                            </div>
                                        </div>
                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-2 pt-0">Genre</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input gender" type="radio"
                                                        name="gridRadios" id="gridRadios1" value="homme" checked="">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        Homme
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input gender" type="radio"
                                                        name="gridRadios" id="gridRadios2" value="femme">
                                                    <label class="form-check-label" for="gridRadios2">
                                                        Femme
                                                    </label>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fermer</button>
                                    <button id="user_add" class="btn btn-primary">Enregistrer</button>
                                </div>


                            </div>
                        </div>
                    </div><!-- End Vertically centered Modal-->
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#verticalycentered">Nouvelle agent</button>
                            <h5 class="card-title">Liste des agents</h5>
                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Poste-nom</th>
                                        <th scope="col">Prenom</th>
                                        <th scope="col">Genre</th>
                                        <th scope="col">Date de debut</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users">

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
           
        </section>
    </main><!-- End #main -->
    <?php include 'include/js.php';?>

    <script>
        $(document).ready(function () {
            $(document).on('click', '#user_add', function () {
                var nom = $('#nom').val();
                var postnom = $('#postnom').val();
                var prenom = $('#prenom').val();
                //Additional Info
                var matricule = $('#matricule').val();
                var gender = $(".gender:checked").val();
                $.ajax({
                    url: 'controler/add_agent.php',
                    type: 'POST',
                    data: {
                        'Add': 1,
                        'nom': nom,
                        'postnom': postnom,
                        'prenom': prenom,
                        'matricule': matricule,
                        'genre': gender,
                    },
                    success: function (response) {
                        $('#nom').val('');
                        $('#postnom').val('');
                        $('#prenom').val('');
                        $('#matricule').val('');
                        // $('#alert').show();
                        // $('#alert').text(response);
                        $.ajax({
                            url: "controler/get_agent.php"
                        }).done(function (data) {
                            $('#users').html(data);
                        });
                    }
                });
            });

            $(document).on('click', '.sup', function () {
                    var id = this.getAttribute('value');
                    $.ajax({
                    url: 'controler/add_agent.php',
                    type: 'POST',
                    data: {
                        'id': id

                    },
                });
            });
        });
    </script>



    <script>
        $(document).ready(function () {
            $.ajax({
                url: "controler/get_agent.php"
            }).done(function (data) {
                $('#users').html(data);
                //alert(data);
            });
            setInterval(function () {
                $.ajax({
                    url: "controler/get_agent.php"
                }).done(function (data) {
                    $('#users').html(data);
                });
            }, 10000);
        });
    </script>
</body>

</html>