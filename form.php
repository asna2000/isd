<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormAdd</title>
    <link href="assets/img/logo.ico" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</head>

<body>
    <?php include('errors.php'); ?>
    <title>Add New Announcement</title>

    </head>

    <body>

        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/logo.png" alt="" width="36" height="36" class="d-inline-block align-text-top"> Istudent
                </a>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row">

                <div class="col-12">
                    <h3><a href="/gambar" class="btn btn-sm btn-primary mr-3">Back</a>Add New Announcement</h3>
                    <hr>
                    <!-- Title -->
                    
                    <form action="form.php" method="POST" id="addform" style="width: 100%;" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" id="title" class="form-control" name="title" required>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">

                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Date to del -->
                        <div class="form-group row">
                            <label for="dt" class="col-sm-2 col-form-label">Date to Delete</label>
                            <div class="col-sm-5">
                                <input type="date" id="dt" name="dt" required>
                            </div>
                        </div>

                        <!-- image -->
                        <div class="form-group row ">
                            <label for="image" class="col-sm-2 col-form-label">Image/File</label>
                            <div class="col-sm-4">

                                <div class="input-group mb-3 mt-3">
                                    <!-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                            </div> -->
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="nama_fail" name="file_name" aria-describedby="inputGroupFileAddon01" required>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- link -->
                        <div class="form-group row">
                            <label for="reflink" class="col-sm-2 col-form-label">Announcement Link</label>
                            <div class="col-sm-10">
                                <input type="text" id="reflink" class="form-control" name="reflink">
                            </div>
                        </div>
                        <button class="btn btn-primary float-right mb-2" type="submit" name="add_new" form="addform">Save</button>
                    </form>

                </div>

            </div>
        </div>
        <!-- end container -->
    </body>

</html>