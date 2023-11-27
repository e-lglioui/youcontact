
<?php
require('config.php');

$result = mysqli_query($connect, "SELECT * FROM contact");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Liste des Contacts</title>
</head>
<body>
<?php  
        include("nav.php"); 
    ?>
        
        <div class="relative isolate overflow-hidden bg-gray-900  px-6 pt-14 lg:px-8">
          <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
          </div>
          <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
    <h1  class="mt-6 text-lg leading-8 text-withe  text-fuchsia-400 text-center ">Liste des Contacts</h1>
    <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="ajouter.php" class="rounded-md bg-fuchsia-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-fuchsia-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter un contact</a>
                
              </div>
    <table class="table-auto">
    <thead  class="border-separate border border-slate-400 ">
        <tr>
            <th class="border border-slate-300 text-fuchsia-400 ">Nom</th>
            <th class="border border-slate-300 text-fuchsia-400 ">Prenom</th>
            <th class="border border-slate-300 text-fuchsia-400">Email</th>
            <th class="border border-slate-300 text-fuchsia-400">Téléphone</th>
            <th class="border border-slate-300 text-fuchsia-400">Adresse</th>
            <th class="border border-slate-300 text-fuchsia-400">Actions</th>
        </tr>
</thead>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tbody>
            <tr>
                <td class="border border-slate-300 text-white"><?= $row['nom']; ?></td>
                <td class="border border-slate-300 text-white"><?= $row['prenom']; ?></td>
                <td class="border border-slate-300 text-white"><?= $row['email']; ?></td>
                <td class="border border-slate-300 text-white"><?= $row['tel']; ?></td>
                <td class="border border-slate-300 text-white"><?= $row['adress']; ?></td>
                <td class="border border-slate-300 text-white">
                    <a   href="modifier.php?id=<?= $row['id']; ?>"><i class="fa-solid fa-pen" style="color: #1780b5;"></i></a>
                    <a   href="supprimer.php?id=<?= $row['id']; ?>"> <i class="fa-solid fa-trash" style="color: #eb1414;"></i></a>
                </td>
            </tr>
        </tbody>
        <?php endwhile; ?>
    </table>
        </div>
        </div>
</body>
</html>

