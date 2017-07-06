var workspace;
var m;
var toolbox;
var clickKop=0;
var startTime = 0
var start = 0
var end = 0
var diff = 0
var timerID = 0
function hasieratuJokoa(){
  document.getElementById("exekutatu").disabled = false;
  var s = ""
  switch (m) {
    case 1:
      //  var val = (parseInt(document.getElementById('maribloki').style.left, 10) || 0) + 190;
      //  alert(parseInt(document.getElementById('maribloki').style.left,10)||0)

        document.getElementById('maribloki').style.left = 96.80 + 'px';
        document.getElementById('maribloki').style.top = 96.80 + 'px';
        var val = (parseInt(document.getElementById('maribloki').style.left, 10) || 0) + 90;
        val = (parseInt(document.getElementById('fondo').style.left, 10) || 0) + val;
        document.getElementById('gezia').style.left = val + 'px';
        val = (parseInt(document.getElementById('maribloki').style.top, 10) || 0) + 20;
        val = (parseInt(document.getElementById('fondo').style.top, 10) || 0) + val;
        document.getElementById('gezia').style.top = val + 'px';
       break;
    case 2:
        //TODO pertsonaia kokatu bere lekuan eta enuntziatua aldatu
        document.getElementById('maribloki').style.left = 96.80 + 'px';
        document.getElementById('maribloki').style.top = 380.8 + 'px';
        var val = (parseInt(document.getElementById('maribloki').style.left, 10) || 0) + 90;
        val = (parseInt(document.getElementById('fondo').style.left, 10) || 0) + val;
        document.getElementById('gezia').style.left = val + 'px';
        val = (parseInt(document.getElementById('maribloki').style.top, 10) || 0) + 20;
        val = (parseInt(document.getElementById('fondo').style.top, 10) || 0) + val;
        document.getElementById('gezia').style.top = val + 'px';
       break;
    default:
  }
  return s;
}
function sartuJokoa(){
  //TODO Maila eman m balioari
   //document.getElementById("toolbox1").innerHTML = hasieratuJokoa(1);
   m=1;
   toolbox = '<xml id="toolbox1" style="display: none">';
     toolbox += '<block type="controls_if"></block>';
      toolbox += '<block type="controls_repeat_ext"></block>';
      toolbox += '<block type="logic_compare"></block>';
      toolbox += '<block type="math_number"></block>';
      toolbox += '<block type="math_arithmetic"></block>';
      toolbox += '<block type="text"></block>';
      toolbox += '<block type="move_forward"></block>';
      toolbox += '<block type="move_left"></block>';
      toolbox += '</xml>';
   workspace = Blockly.inject('blocklyDiv', {toolbox: toolbox});
   chronoStart();
   hasieratuJokoa();
}
  /*function myUpdateFunction(event) {
      var code = Blockly.JavaScript.workspaceToCode(workspace);
      document.getElementById('textarea').value = code;
  }
  workspace.addChangeListener(myUpdateFunction);*/
  function exekutatu(){
    clickKop++;
    chronoStop();
    var code = Blockly.JavaScript.workspaceToCode(workspace);
    if(code==""){
      alert("Mugitu blokeak aginduak emateko")
    }else{
      document.getElementById("exekutatu").disabled = true;
      try {
        i=0;
        j=0;
        eval(code)
      } catch (e) {
        alert(e);
      }
    }
  }
  function move_forward(){
      i++;

      element = document.getElementById("maribloki");


      element.addEventListener("webkitAnimationEnd", changePosition);

      element.classList.remove("run-animation");
      void element.offsetWidth;
      element.classList.add("run-animation");

      // Code for Chrome, Safari and Opera
      //document.getElementById('gezia').style.visibility="hidden";


    }
    function move_left(){


    }



  function changePosition(){
    j++

    var val = (parseInt(document.getElementById('maribloki').style.left, 10) || 0) + 96.80;
    document.getElementById('maribloki').style.left = val + 'px';

    var val = (parseInt(document.getElementById('maribloki').style.left, 10) || 0) + 90;
    val = (parseInt(document.getElementById('fondo').style.left, 10) || 0) + val;
    document.getElementById('gezia').style.left = val + 'px';
    val = (parseInt(document.getElementById('maribloki').style.top, 10) || 0) + 20;
    val = (parseInt(document.getElementById('fondo').style.top, 10) || 0) + val;
    document.getElementById('gezia').style.top = val + 'px';
    document.getElementById('gezia').style.visibility="visible";


    if(j!=i){
      i--;
      //document.getElementById('gezia').style.visibility="visible";
      move_forward();
    }else{
      if(((parseInt(document.getElementById('maribloki').style.left, 10) || 0)>475 && (parseInt(document.getElementById('maribloki').style.left, 10) || 0)< 485) &&
              ((parseInt(document.getElementById('maribloki').style.top, 10) || 0)<100 && (parseInt(document.getElementById('maribloki').style.top, 10) || 0)> 90)){
          alert("Zuri esker lortu dut helmugara iristea, eskerrik asko. Hurrengo mailan ikusiko gara. Saiakera kopurua:" + clickKop+" eta denbora:" + document.getElementById("chronotime").innerHTML)
          //TODO gorde datubasean ikaslearen maila berria eta pasa orria hurrengo minijokora
          hurrengoMaila();
      }else{
        alert("Lastima, ez naiz helmugara iritsi. Berriz saiatuko al gara?")
        hasieratuJokoa();
        chronoContinue();
      }
    }
  }
  function hurrengoMaila(){
    clickKop=0;
    m++;
    hasieratuJokoa();
    chronoStopReset();
    chronoStart();
  }
  function chrono(){
  	end = new Date()
  	diff = end - start
  	diff = new Date(diff)
  	var msec = diff.getMilliseconds()
  	var sec = diff.getSeconds()
  	var min = diff.getMinutes()
  	var hr = diff.getHours()-1
  	if (min < 10){
  		min = "0" + min
  	}
  	if (sec < 10){
  		sec = "0" + sec
  	}
  	if(msec < 10){
  		msec = "00" +msec
  	}
  	else if(msec < 100){
  		msec = "0" +msec
  	}
  	document.getElementById("chronotime").innerHTML = hr + ":" + min + ":" + sec + ":" + msec
  	timerID = setTimeout("chrono()", 10)
  }
  function chronoStart(){
  	start = new Date()
  	chrono()
  }
  function chronoContinue(){
  	start = new Date()-diff
  	start = new Date(start)
  	chrono()
  }
  function chronoReset(){
  	document.getElementById("chronotime").innerHTML = "0:00:00:000"
  	start = new Date()
  }
  function chronoStopReset(){
  	document.getElementById("chronotime").innerHTML = "0:00:00:000"
  }
  function chronoStop(){
  	clearTimeout(timerID)
  }
