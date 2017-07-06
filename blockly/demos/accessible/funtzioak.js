function move_forward2(){
  setTimeout(function(){
    document.getElementById("emaitza").innerHTML = "";
  }, time);
  switch (g) {
    case 1:
      var element=document.getElementById("minijokoaTable").rows[i].cells[j+1].innerHTML;
      if(element=="B" || element=="H"){
        //Bidea dagoela esan nahi du.
        if(i==bi && j==bj){
          document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="H";
        } else {
          document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="B";
        }
        j++;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="R";
        document.getElementById("emaitza").innerHTML = "Lauki bat mugitu da aurrerantz.  Norabidea: R, posizioa("+i+","+j+")";
      }else //TODO: ERROREA
      break;
    case 2:
      var element=document.getElementById("minijokoaTable").rows[i-1].cells[j].innerHTML;
      if(element=="B" || element=="H"){
        //Bidea dagoela esan nahi du.
        if(i==bi && j==bj){
          document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="H";
        } else {
          document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="B";
        }
        i--;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="U";
        document.getElementById("emaitza").innerHTML = "Lauki bat mugitu da aurrerantz.  Norabidea: U, posizioa("+i+","+j+")";
      }else //TODO: ERROREA
      break;
    case 3:
    var element=document.getElementById("minijokoaTable").rows[i].cells[j-1].innerHTML;
    if(element=="B" || element=="H"){
      //Bidea dagoela esan nahi du.
      if(i==bi && j==bj){
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="H";
      } else {
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="B";
      }
      j--;
      document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="L";
      document.getElementById("emaitza").innerHTML = "Lauki bat mugitu da aurrerantz. Norabidea: L, posizioa("+i+","+j+")";
    }else //TODO: ERROREA
      break;
    case 4:
      var element=document.getElementById("minijokoaTable").rows[i+1].cells[j].innerHTML;
      if(element=="B" || element=="H"){
        //Bidea dagoela esan nahi du.
        if(i==bi && j==bj){
          document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="H";
        } else {
          document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="B";
        }
        i;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="D";
        document.getElementById("emaitza").innerHTML = "Lauki bat mugitu da aurrerantz.  Norabidea: D, posizioa("+i+","+j+")";
      }else //TODO erroreaa;
        break;
    default:

  }
  document.getElementById("emaitza").setAttribute("role", "alert");
}
function move_forward(){
  setTimeout(function(){
    move_forward2();
  }, time);
  time=time+6000;
}
function bidea_eskubian(){
  switch (g) {
    case 1:
      return document.getElementById("minijokoaTable").rows[i+1].cells[j].innerHTML=="B";
      break;
    case 2:
      return document.getElementById("minijokoaTable").rows[i].cells[j+1].innerHTML=="B";
      break;
    case 3:
      return document.getElementById("minijokoaTable").rows[i-1].cells[j].innerHTML=="B";
      break;
    case 4:
      return document.getElementById("minijokoaTable").rows[i].cells[j-1].innerHTML=="B";
      break;
    default:

  }
}

function bidea_ezkerrean(){
  switch (g) {
    case 1:
      return document.getElementById("minijokoaTable").rows[i-1].cells[j].innerHTML=="B";
      break;
    case 2:
      return document.getElementById("minijokoaTable").rows[i].cells[j-1].innerHTML=="B";
      break;
    case 3:
      return document.getElementById("minijokoaTable").rows[i+1].cells[j].innerHTML=="B";
      break;
    case 4:
      return document.getElementById("minijokoaTable").rows[i].cells[j+1].innerHTML=="B";
      break;
    default:

  }
}
function bidea_aurrean(){
  switch (g) {
    case 1:
      return document.getElementById("minijokoaTable").rows[i].cells[j+1].innerHTML=="B";
      break;
    case 2:
      return document.getElementById("minijokoaTable").rows[i-1].cells[j].innerHTML=="B";
      break;
    case 3:
      return document.getElementById("minijokoaTable").rows[i].cells[j-1].innerHTML=="B";
      break;
    case 4:
      return document.getElementById("minijokoaTable").rows[i+1].cells[j].innerHTML=="B";
      break;
    default:
  }
}
function helmugara_iritsi(){
    if(i==bi){
        if(j==bj){
          return true;
        }else return false;
    }else return false;
}

function hurrengo_maila(){
  time1 = time;
  setTimeout(function(){
    if(time==time1){
      if(helmugara_iritsi()){
          end = new Date();
          diff = end - start;

          var parametros={
                "idMinijokoa" : d,
                "saiakeraKop" : klikkop,
                "denbora" : diff
          };
          $.ajax({
                  data:  parametros,
                  url:   "../../../server/ikaslea_gordeMinijoko.php",
                  type:  'post',
                  success:  function (response) {
                    console.log("ondo")
                  }
          });
          alert("Zorionak! "+d+" maila gainditu duzu! Hurrengo mailara pasako zara. Hau da lortu duzun kodea:\n"+ kodea);
        maila++;
        localStorage.maila=maila;
        location.reload();
      }else{
        alert("Lastima ez duzu lortu, saiatu zaitez berriz");
        location.reload();
      }
    } else hurrengo_maila();
  },time+10000);

}
function biratu_ezkerreta(){
  setTimeout(function(){
    switch (g) {
      case 1:
        g++;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="U";
        break;
      case 2:
        g++;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="L";
        break;
      case 3:
        g++;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="D";
        break;
      case 4:
        g=1;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="R";
        break;
      default:

    }
  },time);
}
function biratu_eskubira(){
  setTimeout(function(){
    switch (g) {
      case 1:
        g=4;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="D";
        break;
      case 2:
        g--;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="R";

        break;
      case 3:
        g--;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="U";

        break;
      case 4:
        g--;
        document.getElementById("minijokoaTable").rows[i].cells[j].innerHTML="L";

        break;
      default:

    }
  },time);
}

function kargatu_minijokoa(m){
  klikkop=0;
  time=0;
  start = new Date();
	var xmlDoc=loadXMLDoc();
	var arniveles = xmlDoc.getElementsByTagName("maila");
  var momentuko_minijokoa = arniveles[m];
  maila = parseInt(m);
  d=maila+1;
  //d=parseInt(m)+1;
    document.getElementById("mailaT").innerHTML = d+"\. Minijokoa";
		var minijokoaTaula = momentuko_minijokoa.getElementsByTagName("table");
    tr = minijokoaTaula[0].getElementsByTagName('tr');
    var table = document.getElementById("minijokoaTable");
    table.innerHTML = "";
    for (e=0;e<tr.length;e++){
      row = table.insertRow(e);
      td = tr[e].getElementsByTagName('td');
      for(p=0;p<td.length;p++){
        cell = row.insertCell(p);
        cell.innerHTML = td[p].innerHTML;
      }
    }
    var minijokoToolbox = momentuko_minijokoa.getElementsByTagName("toolbox");
    console.log(minijokoToolbox);
    for(i=0; i<minijokoToolbox.length; i++){
      document.getElementById("blockly-toolbox-xml").appendChild(minijokoToolbox[i]);
      console.log(document.getElementById('blockly-toolbox-xml'));
    }
    var hEgoera = momentuko_minijokoa.getElementsByTagName("hasierakoEgoera");
    i = parseFloat(hEgoera[0].getElementsByTagName('i')[0].innerHTML);
    j = parseFloat(hEgoera[0].getElementsByTagName('j')[0].innerHTML);
    var bEgoera = momentuko_minijokoa.getElementsByTagName("bukaerakoEgoera");
    bi = parseFloat(bEgoera[0].getElementsByTagName('i')[0].innerHTML);
    bj = parseFloat(bEgoera[0].getElementsByTagName('j')[0].innerHTML);
 //	}
}
function loadXMLDoc(){
  if (window.XMLHttpRequest)

  {
  	xmlhttp=new XMLHttpRequest();

  }else{
  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.open("GET","minijokoak.xml",false);
  xmlhttp.send();
  return xmlhttp.responseXML;
}
