
<?php
    require('cofig.php');
    if(isset($_POST['submit'])){
      $nom=$_POST['nom'];
      $prenom=$_POST['prenom'];
      $email=$_POST['email'];
      $pass_word=$_POST['password'];
      
      $nom =  validerInput($nom);
      $prenom = validerInput($prenom);
      $email=validerInput($email);
      $sql = "INSERT INTO `utilisateur` (nom, prenom, email, pass_word) VALUES ('$nom', '$prenom', '$email', '$pass_word')";
      $result = mysqli_query($connect, $sql);
      
      if ($result) {
        header("Location: contact.php");
        exit();
    } else {
        header("Location: regester.php");
       
        exit();
    }
    
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


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
        <img src="image/sing_up.png" alt="sing up" />
            </div>
            <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                <div class="text-center mb-10">
                    <h1 class="font-bold text-3xl text-gray-900">REGISTER</h1>
                    <p>Enter your information to register</p>
                </div>
                <div>
                <form method="post" name="registrationForm" onsubmit="validateForm(event)">
    <div class="flex -mx-3">
        <div class="w-1/2 px-3 mb-5">
            <label for="" class="text-xs font-semibold px-1">First name</label>
            <div class="flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                <input type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Enter your name" name="nom" autocomplete="off">
            </div>
            <span id="nomError" class="text-red-500"></span>
        </div>
        <div class="w-1/2 px-3 mb-5">
            <label for="" class="text-xs font-semibold px-1">Last name</label>
            <div class="flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                <input type="text" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Enter your last name" name="prenom" autocomplete="off">
            </div>
            <span id="prenomError" class="text-red-500"></span>
        </div>
    </div>
    <div class="flex -mx-3">
        <div class="w-full px-3 mb-5">
            <label for="" class="text-xs font-semibold px-1">Email</label>
            <div class="flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                <input type="email" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Enter your email" name="email" autocomplete="off">
            </div>
            <span id="emailError" class="text-red-500"></span>
        </div>
    </div>
    <div class="flex -mx-3">
        <div class="w-full px-3 mb-12">
            <label for="" class="text-xs font-semibold px-1">Password</label>
            <div class="flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                <input type="password" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************" name="password" autocomplete="off">
            </div>
            <span id="passwordError" class="text-red-500"></span>
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
        e.preventDefault();

        var nom = document.forms["registrationForm"]["nom"].value;
        var prenom = document.forms["registrationForm"]["prenom"].value;
        var email = document.forms["registrationForm"]["email"].value;
        var password = document.forms["registrationForm"]["password"].value;

        var nameRegex = /^[a-zA-Z\s]+$/;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

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

        if (!passwordRegex.test(password)) {
            errors.push("Password must contain at least one uppercase letter, one lowercase letter, one digit, and be at least 8 characters long");
        }

        document.getElementById("nomError").innerText = errors.find(e => e.includes("first name")) || "";
        document.getElementById("prenomError").innerText = errors.find(e => e.includes("last name")) || "";
        document.getElementById("emailError").innerText = errors.find(e => e.includes("email")) || "";
        document.getElementById("passwordError").innerText = errors.find(e => e.includes("Password")) || "";

        if (errors.length === 0) {
        document.forms["registrationForm"].submit();
    }
}
    
    </script>

<style>@import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css')</style>


</body>
</html>