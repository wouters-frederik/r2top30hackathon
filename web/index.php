<?php

//dont cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>


<!DOCTYPE html>
<html>
	<head>
		<title>R2Hackathon</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="R2Hackathon">
    <meta name="og:image" content="/img/FB-share-img.jpg">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <link rel="stylesheet" href="css/top30.css">
	</head>
	<body class="index">
		<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form id="mainform" role="form" action="save.php" METHOD="POST">
                        <fieldset class="form-group">
                            <label for="name">Hallo! Wat is je naam?</label>
                            <input type="text" class="form-control" id="name" name="name" />
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="input2">Dag <span class="inputname"></span>, in welk jaar ben je geboren?</label>
                            <input type="text" class="form-control" id="year" name="year"/>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="maand">En in welke maand?</label>
                            <select class="form-control"  id="maand" name="maand" >
                              <option value="1">Januari</option>
                              <option value="2">Februari</option>
                              <option value="3">Maart</option>
                              <option value="4">April</option>
                              <option value="5">Mei</option>
                              <option value="6">Juni</option>
                              <option value="7">Juli</option>
                              <option value="8">Augustus</option>
                              <option value="9">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="dag">Welke dag?</label>
                            <select class="form-control" id="dag" name="dag">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11">11</option>
                              <option value="12">12</option>
                              <option value="13">13</option>
                              <option value="14">14</option>
                              <option value="15">15</option>
                              <option value="16">16</option>
                              <option value="17">17</option>
                              <option value="18">18</option>
                              <option value="19">19</option>
                              <option value="20">20</option>
                              <option value="21">21</option>
                              <option value="22">22</option>
                              <option value="23">23</option>
                              <option value="24">24</option>
                              <option value="25">25</option>
                              <option value="26">26</option>
                              <option value="27">27</option>
                              <option value="28">28</option>
                              <option value="29">29</option>
                              <option value="30">30</option>
                              <option value="31">31</option>
                            </select>
                        </fieldset>
                        <button id="submitbutton" type="submit" class="btn btn-default">Indienen</button>
                    </form>
                </div>
            </div>
        </div>
		<script src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
		<script src="js/formToWizard.js"></script>
		<script src="js/top30.js"></script>
	</body>
</html>
