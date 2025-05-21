<html>

<head>

  <script>
    const show = () => {
  const element = document.querySelector("#popup");
  element.style.visibility = "visible";
  element.style.opacity = "1";
  element.style.transform = "scale(1)";
  element.style.transition = "0.4s, opacity 0.4s";
};

document.addEventListener("DOMContentLoaded", () => {
  document.addEventListener("mouseout", (event) => {
    if (!event.toElement && !event.relatedTarget) {
      window.open("https://klickdream.com");  
      setTimeout(() => {
        show();
      }, 1000);
    }
  });
});
</script>

<style>
body {
  font-family: system-ui;
  background-color: #f6d198;
}

#popup {
  position: fixed;
  width: 100%;
  visibility: hidden;
  z-index: 10002;
  top: 0;
  opacity: 0;
  transform: scale(0.5);
  transition: transform 0.2s, opacity 0.2s, visibility 0s 0.2s;
  position: relative;
  margin: 0 auto;
  text-align: center;
  box-shadow: 0 1px 10px rgba(0, 0, 0, 0.5);
  width: 60%;
  background: #862a5c;
  padding-bottom: 100px;
  padding-top: 50px;
  color: #fff;
  font-size: 2rem;
}


</style>

</head>

<body>

<div id="popup">
  <h3>Popup!</h3>
</div>

</body>
</html>