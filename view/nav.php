<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Tieg pharmacie </title>
    <link rel="stylesheet" href="http://localhost/PHARMACYTIEG/mvcc/view/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <!-- ///////////////////////////////////////////////////////////////////////////////////: -->
  <div class="sidebar ">
    <div class="logo-details">
      
      <img  class=" tieg" src="http://localhost/PHARMACYTIEG/mvcc/image/tieg.png" alt="">
      <span class="logo_name">TIEG Pharmacie</span>
    </div>
    <!-- ********************************************************************************* -->
    <ul class="nav-links">
      <!-- ------------------------------------------------------------------------------ -->
      <li>
        <a href="http://localhost/PHARMACYTIEG/mvcc/">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Page d'accueil</span>
        </a>
       
      </li>
      
      <!-- ----------------------------------------------------------------------------- -->
      <li>
        <div class="icon-link">
          <a href="#">
          <i class='bx bx-plus-medical'></i>
            <span class="link_name">medicament</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">medicament</a></li>
          <li><a href="#">chercher par terme</a></li>
          <li><a href="#">chercher par type</a></li>
          <li><a href="#">chercher par familé</a></li>
          <li><a href="http://localhost/PHARMACYTIEG/mvcc/medicament/ajouter">ajouter medicament</a></li>
          
        </ul>
      </li>
      <!-- ----------------------------------------------------------------------------- -->
      <li>
        <div class="icon-link">
          <a href="#">
          <i class='bx bxs-user-detail'></i>
            <span class="link_name">fournisseur</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">fournisseur</a></li>
          <li><a href="http://localhost/PHARMACYTIEG/mvcc/fournisseur">afficher fournisseur</a></li>
          <li><a href="#">chercher fournisseur</a></li>
          
          <li><a href="http://localhost/PHARMACYTIEG/mvcc/fournisseur/ajouter">ajouter fournisseur</a></li>
         

        </ul>
      </li>
      <!-- ------------------------------------------------------------------ -->
    
      <!-- ------------------------------------------------------------------------------ -->
      
      <!-- ------------------------------------------------------------------------------ -->
     
      <!-- <li>
        <div class="profile-details">
      
          <div class="name-job">
            admin
          </div>
          <i class='bx bx-log-out' ></i>
        </div>
      </li> -->
    </ul>
  </div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
  

  <script>
   let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}




 </script>

</body>
</html>
