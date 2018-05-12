<?php

if(!isset($_SESSION["user"])){
    header("Location: ../../../DiaGenKri/public/home");
}


require_once '../app/database/DBfunctions.php';
include_once '../app/controllers/administrate.php';

$data = DBfunctions::getUsersData();

?>

<!DOCTYPE html>
<html lang="sl">

<head>
    <title>Administration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../DiaGenKri/app/res/css/main.css"

</head>

<header class="col-12 spacing-increased">
    <h1>User administration</h1>
</header>

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
                <li><a href="../../../DiaGenKri/public/visualisation"><span class="glyphicon glyphicon-pencil"></span> Visualisation</a></li>
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
                                    <div class="col-lg-4" id="login-size">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8" id="login-size">
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

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-12 text-left">
            <table class="table table-sc table-hover table-responsive table-striped">
                <thead>
                <tr class="tr-sc" style="text-align: center">
                    <th>User</th>
                    <th>E-mail</th>
                    <th style="width: auto">Privileges</th>
                </tr>
                </thead>
                <tbody class="tbody-sc">
                <?php foreach ($data as $key => $value){
                    $name = $value["name"];
                    $surname = $value["surname"];
                    $email = $value["e-mail"];
                    $fow = $value["fieldofwork"];
                    $admin = $value["admin"];
                    $readPR = $value["readPR"];
                    $editPR = $value["editPR"];
                    $deletePR = $value["deletePR"];
                    $addPR = $value["addPR"];
                    $confirmPR = $value["confirmPR"];

                    if($admin == 1){
                        $adminString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" checked=\"checked\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Admin</label>
</div> | ";
                    }else{
                        $adminString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Admin</label>
</div> | ";
                    }

                    if($readPR == 1){
                        $readString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" checked=\"checked\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Read</label>
</div> | ";
                    }else{
                        $readString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Read</label>
</div> | ";
                    }

                    if($editPR == 1){
                        $editString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" checked=\"checked\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Edit</label>
</div> | ";
                    }else{
                        $editString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Edit</label>
</div> | ";
                    }

                    if($deletePR == 1){
                        $deleteString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" checked=\"checked\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Delete</label>
</div> | ";
                    }else{
                        $deleteString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Delete</label>
</div> | ";
                    }

                    if($addPR == 1){
                        $addString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" checked=\"checked\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Add</label>
</div> | ";
                    }else{
                        $addString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Add</label>
</div> | ";
                    }

                    if($confirmPR == 1){
                        $confirmString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" checked=\"checked\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Confirm</label>
</div>";
                    }else{
                        $confirmString = "<div class=\"form-check form-check-inline form-group check-box-spacing\">
  <input class=\"form-check-input\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"option1\" disabled>
  <label class=\"form-check-label active\" for=\"inlineCheckbox1\">Confirm</label>
</div>";
                    }

                    echo "<tr class='tr-sc'><td style=\"white-space: nowrap; width: 25%\">$name $surname</td><td>$email</td><td style=\"white-space: nowrap; width: 50%\"><form class='form-inline'>" . $adminString . $readString . $editString . $deleteString . $addString . $confirmString . "</form></td></tr>";

                }
                ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-info row-increased-bottom row-increased-top" data-toggle="modal" data-target="#editModal">Change</button>
        </div>
        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Administration warning</h4>
                    </div>
                    <div class="modal-body">
                        <p>You are about to enter the page for changing user privileges. Please proceed with caution, as changes to user rights may affect the content of the application. Do you wish to continue?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="../../../DiaGenKri/public/administrate/change" class="btn btn-warning row-increased-bottom btn-block">Yes, continue</a>
                        <button class="btn btn-info row-increased-bottom btn-block" data-dismiss="modal">No, cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>©DiaGenKri</p>
</footer>