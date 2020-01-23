<!DOCTYPE html>

<html lang="en" dir="ltr">
<section>
  <link rel="stylesheet" href="../styles/stylesheet.css">
  <script type="text/javascript">
      function toggleMenu(){
        document.getElementById('sidemenu').classList.toggle('triggered');
      }
      function closeMenu(){
        document.getElementById('sidemenu').classList.toggle('close');
      }
      function toggleDisplay() {
        var togglebtn = document.getElementById("toggle-btn");
        var closebtn= document.getElementById("close-btn");
        if (togglebtn.style.display === "none") {
          togglebtn.style.display = "block";
          closebtn.style.display ="none";
          closeMenu();

          } else {
          togglebtn.style.display = "none";
          closebtn.style.display = "block";
          toggleMenu();
        }
}
  </script>

  <div id="toggle-btn" onclick="toggleDisplay()">
  <img src="../assets/menu_icon_open.png">
  </div>

  <div id="close-btn" onclick="toggleDisplay()">
  <img src="../assets/menu_icon_close.png">
  </div>

  <nav id="sidemenu">
    <h1 class="MenuTitle">Menu</h1>
    <ul>
      <li><a href="">Pagina Inicial</a><li>
      <li><a href="">Propriedades</a><li>
      <li><a href="">Area Clientes</a><li>
      <li><a href="">Gestao Funcionarios</a><li>
      <li><a href="">Area Finaceira</a><li>
    </ul>
  <nav>
  </section>

</html>
