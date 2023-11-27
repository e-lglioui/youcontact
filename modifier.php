<?php

require('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($connect, "SELECT * FROM contact WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    if(isset($_POST['submit'])){
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $adress=$_POST['adresse'];
        $nom =  validerInput($nom);
        $prenom = validerInput($prenom);
        $email=validerInput($email);
        $tel=validerInput($tel);
        $adress=validerInput($adress);
        $sql = "UPDATE contact SET nom='$nom', prenom='$prenom', email='$email', tel='$tel', adress='$adress'   WHERE id=$id";
        $result = mysqli_query($connect, $sql);
        echo "sqdfghjklm";
        header('Location: contact.php');
        exit();
    }

} else {
    
}
function validerInput($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data= htmlspecialchars($data);
    return $data;
 }



?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
require('nav.php');
?>

<main> 

<div class="min-w-screen min-h-screen bg-gray-900 flex items-center justify-center px-5 py-5">
<div class="bg-fuchsia-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
    <div class="md:flex w-full">
    <div class="hidden md:block w-1/2 bg-fuchsia-500 py-10 px-10">
    <img src="image/Contact us-bro.png" alt="sing up" />
        </div>
        <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
            <div class="text-center mb-10">
                <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
                <p>Entre vos informations</p>
            </div>
            <div>
 <form method="POST" name="/registrationForm" >
   <div class="flex -mx-3">
     <div class="w-1/2 px-3 mb-5">
        <label for="" class="text-xs font-semibold px-1">NOM</label>
        <div class="flex">
            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
            <input type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Enter your name" name="nom" value="<?= $row['nom']; ?>" autocomplete="off">
        </div>
        <span id="nomError" class="text-red-500"></span>
    </div>
    <div class="w-1/2 px-3 mb-5">
        <label for="" class="text-xs font-semibold px-1">Prenom</label>
        <div class="flex">
            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
            <input type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Enter your last name" name="prenom" value="<?= $row['prenom']; ?>" autocomplete="off">
        </div>
        <span id="prenomError" class="text-red-500"></span>
    </div>
    </div>
   <div class="flex -mx-3">
    <div class="w-full px-3 mb-5">
        <label for="" class="text-xs font-semibold px-1">Email</label>
        <div class="flex">
            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
            <input type="email" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Enter your email" name="email" value="<?= $row['email']; ?>" autocomplete="off">
        </div>
        <span id="emailError" class="text-red-500"></span>
    </div>
   </div>
   <div class="flex -mx-3">
    <div class="w-full px-3 mb-5">
        <label for="" class="text-xs font-semibold px-1">Télephon</label>
        <div class="flex">
            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
            <input type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Enter your numbre tel" name="tel" autocomplete="off" value="<?= $row['tel']; ?>">
        </div>
        <span id="télephonError" class="text-red-500"></span>
    </div>
   </div>
   <div class="flex -mx-3">
    <div class="w-full px-3 mb-5">
        <label for="" class="text-xs font-semibold px-1">Adresse</label>
        <div class="flex">
            <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
            <input type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="adresse" name="adresse" value="<?= $row['adress']; ?>" autocomplete="off">
        </div>
        <span id="télephonError" class="text-red-500"></span>
    </div>
  </div>
  <button class="block w-full max-w-xs mx-auto bg-fuchsia-500 hover:bg-fuchsia-600 focus:bg-fuchsia-700 text-white rounded-lg px-3 py-3 font-semibold" type="submit" name="submit">Register NOW</button>

 </form>
</div>
</div>
</div>
</div>
</div>


</main>

<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<script>
 function validateForm(e) {

    var nom = document.forms["registrationForm"]["nom"].value;
    var prenom = document.forms["registrationForm"]["prenom"].value;
    var email = document.forms["registrationForm"]["email"].value;
    var tel = document.forms["registrationForm"]["tel"].value;
    var adresse = document.forms["registrationForm"]["adresse"].value;

    var nameRegex = /^[a-zA-Z\s]+$/;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    var telRegex=  / ^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/
    var errors = [];

    if (!nameRegex.test(nom)) {
        errors.push("Invalid first name (only letters and spaces)");
    }

    if (!nameRegex.test(prenom)) {
        errors.push("Invalid last name (only letters and spaces)");
    }

    if (!emailRegex.test(email)) {
        errors.push("Invalid email address");
    }
    if (!telRegex.test(tel)) {
        errors.push("Invalid numbre phone");
    }



    document.getElementById("nomError").innerText = errors.find(e => e.includes("first name")) || "";
    document.getElementById("prenomError").innerText = errors.find(e => e.includes("last name")) || "";
    document.getElementById("emailError").innerText = errors.find(e => e.includes("email")) || "";
    document.getElementById("télephonError").innerText = errors.find(e => e.includes("numbre tel")) || "";
  
}

</script>

<style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')</style>


</body>
</html>
