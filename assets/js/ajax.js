function CarregaDadosJanela(iduser, ua) {
  elemento = document.getElementById("conteudobox");
  elemento.innerHTML = "<center><img src=\"engine/imgs/loader.gif\"></center>";
  request = createRequest();
  if (request == null) {
    alert("Unable to create request");
    return;
  }
  var url= "engine/ajax/getDetails.php?id=" + escape(iduser) + "&ua=" + escape(ua);
  request.open("GET", url, true);
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      if (request.status == 200) {
        elemento.innerHTML = request.responseText;
      }
    }
  };
  request.send(null);
}



function CarregaAba(id, ua) {
  elemento = document.getElementById("aba");
  elemento.innerHTML = "<center><img src=\"engine/imgs/loader.gif\"></center>";
  request = createRequest();
  if (request == null) {
    alert("Unable to create request");
    return;
  }
  var url= "engine/ajax/getAba.php?id=" + escape(id) + "&ua=" + escape(ua);
  request.open("GET", url, true);
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      if (request.status == 200) {
        elemento.innerHTML = request.responseText;
      }
    }
  };
  request.send(null);
}



function BtnLike(id, like) {
  request2 = createRequest();
  if (request2 == null) {
    alert("Unable to create request");
    return;
  }
  var url2= "engine/ajax/eng_like.php?id=" + escape(id) + "&like=" + escape(like);
  request2.open("GET", url2, true);
  request2.onreadystatechange = function () {
    if (request2.readyState == 4) {
      if (request2.status == 200) {
        alert('ok');
      }
    }
  };
  request2.send(null);
}