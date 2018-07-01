<?php
require_once '../app/database/DBfunctions.php';
include_once '../app/controllers/administrate.php';

$data = DBfunctions::getGraphs();

?>

<!DOCTYPE html>
<html lang="sl">

<head>
    <title>Graphs table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../DiaGenKri/app/res/css/main.css">
    <script src="../../../DiaGenKri/app/res/js/filter.js"></script>

    <script src="../../../DiaGenKri/app/res/js/raphael/raphael.min.js"></script>
    <script src="../../../DiaGenKri/app/res/js/raphael/raphael.json.js"></script>

    <script type="text/javascript" src="../../../DiaGenKri/app/res/js/david/notify.min.js"></script>
    <script type="text/javascript" src="../../../DiaGenKri/app/res/js/david/raphael.pan-zoom.js"></script>

    <script type="text/javascript" src="../../../DiaGenKri/app/res/js/david/david.js"></script>
    <script type="text/javascript" src="../../../DiaGenKri/app/res/js/nermin/test.js"></script>
    <script type="text/javascript" src="../../../DiaGenKri/app/res/js/david/diagnose.js"></script> 

</head>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../../DiaGenKri/public/home">DiaGenKri</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION["user"])): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span> 
                            <strong><?php
                                echo $_SESSION["user-name"];
                                ?>
                            </strong>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-center">
                                                <span class="glyphicon glyphicon-user icon-size"></span>
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="text-left"><strong><?php
                                                    echo $_SESSION["user-name"] . " " . $_SESSION["user-surname"];
                                                    ?>
                                                </strong></p>
                                            <p class="text-left small"><?php
                                                echo $_SESSION["user"];
                                                ?>
                                            </p>
                                            <p class="text-left">
                                                <a href="../../../DiaGenKri/public/profile" class="btn btn-primary btn-block btn-sm">My profile</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <a href="logIn/logOutUser/" class="btn btn-danger btn-block">Log out</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class=flex-wrap id="main-container">
    <div class=wrap-table>
        <table id="pacientTable" class="table table-hover table-responsive table-striped">
            <thead>
                <tr style="text-align: center">
                <th>Name of disease</th>
                <th>Diagnose yourself</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $value){
                $id = $value["id"];
                $name = $value["name"];
                $button = "<button class='btn btn-block btn-primary dpacient-button' id='$id'>Diagnose</button>";
                echo "<tr><td class='pacient-disease'>$name</td><td class='pacient-button'>$button</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal TEST -->
<div class="modal fade" id="testmodal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Disease diagnosing</h4>
            </div>
            <div class="modal-body">
                <h3 id="h3id"></h3>
                <pre><p id="question"></p></pre>
                <div id="testdiv">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div class="modal" id="content"></div>


<footer class="container-fluid text-center">
    <p>©DiaGenKri</p>
</footer>