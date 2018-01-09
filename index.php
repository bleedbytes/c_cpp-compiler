<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>C COMPILER</title>
        <meta name="description" content="">
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
       <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.8/ace.js"></script>
    <script src="ace/src-noconflict/ace.js"></script>
     <script src="ace/src-noconflict/ext-language_tools.js"></script>
     <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
     #editor{ 
  width: 100%;
  height:92%;
   font-size: 18px; 
        
}
    label{
        font-weight: bold;
        font-size: 22px;
    }
    label1{
        color: rebeccapurple;
        font-size: 22px;
        font-weight: bold;
    }
    select{
        font-size: 20px;
        border-radius: 6px;
    }
    textarea{
        border-radius: 8px;
        border-color: skyblue;
        box-shadow: 2px 2px 2px 2px;
        font-size: 18px;
    }
     #outr{
    width: 600px;
    height:500px;
    border: 2px solid #F0F8FF;
         border-radius: 4px;
    }
    #iner{
        width: 100%;
        height: 40px;
        
        border-radius: 4px;
        background: #FAEBD7;
    }
    #dwn{
        background: none;
        height: 35px;
         padding: 10px 15px;float: right;
        border: none;
    }
    .fa-download{
       font-size: 20px;
    }
     input[type=submit]{
            padding: 15px 30px;
            border-radius: 4px;
            background-color:green;
            border: none;
            font-size: 15px;
            color: white;
           }
     button[type=button]{
            padding: 15px 30px;
            border-radius: 4px;
            background-color: #00FFFF;
            border: none;
            font-size: 15px;
            color: black;
         font-weight: bold;
           }
    #htmledtor{
        float: right;
        height: 60px;
    }
    
    </style>
</head>
<body bgcolor="#5F9EA0">
<div class="main">
    <center><h1>ONLINE C & C++ COMPILER</h1></center>
    <div id="htmledtor">
    <a href="html.php" target="_blank"><button type="button">HTML EDITORS</button></a>
    </div>
<form action="compile.php" id="form" name="f2" method="POST" >
<label for="lang">Choose Language</label>
<select name="language" id="lan">
<option value="c">C</option>
    <option value="cpp">C++</option>
</select><br><br>
  <label1> SELECT THEME:</label1> <select id="theme" onchange="themchng()">
        <option value="twilight" >Twilight</option>
            <option value="monokai">Monokai</option>
            <option value="terminal">Terminal</option>
            <option value="eclipse">Eclipse</option>
            <option value="tomorrow_night_blue">Tomorrow night blue</option>
        <option value="iplastic">Iplastic</option>
        <option value="merbivore_soft">Merbivore Soft</option>
        <option value="cobalt">Cobalt</option>
        </select><br><br>
<label for="ta">Write Your Code</label>
    <div id="outr"> 
    <div id="iner">
         <button type="button" onclick="downld()" id="dwn"><i class="fa fa-download fa-fw"style="color:black"></i></button>
          </div>
    <div id="editor" onkeyup="disp()"></div><br>
<textarea  name="code" rows="10" cols="50" id="txtar" style="display:none"></textarea>
    </div><br><br>
<label for="in">Enter Your Input</label><br>
<textarea name="input" rows="10" cols="50" id="inpe"></textarea><br><br>
<input type="submit" id="st" value="Run Code"><br><br><br>
</form>
<script>
       
 var editor = ace.edit("editor");
   editor.setTheme("ace/theme/twilight");
   editor.getSession().setMode("ace/mode/c_cpp");
        editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion:true
    });
    function themchng(){
           var thems=document.getElementById('theme').value;
        editor.setTheme("ace/theme/"+thems);
         }     
function disp(){
          var x = editor.getValue();
    var y=document.getElementById('txtar').innerHTML=x;
   }
     function downld(){
         var sel=document.getElementById("lan").value;
         var textToWrite = editor.getValue();
            var textFileAsBlob = new Blob([textToWrite], { type: 'text/plain' });
         if(sel=='c'){
            var fileNameToSaveAs = "MyFile.c";
             }
         else if(sel=='cpp'){
             var fileNameToSaveAs = "MyFile.cpp"; 
         }
         else{}
            var downloadLink = document.createElement("a");
            downloadLink.download = fileNameToSaveAs;
            downloadLink.innerHTML = "My Hidden Link";
            window.URL = window.URL || window.webkitURL;
            downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
            downloadLink.onclick = destroyClickedElement;
            downloadLink.style.display = "none";
            document.body.appendChild(downloadLink);
            downloadLink.click();
    }
    function destroyClickedElement(event) {
            document.body.removeChild(event.target);
        }
        </script> 
<script type="text/javascript">
  
  $(document).ready(function(){

     $("#st").click(function(){
  
           $("#div").html("Loading ......");

});

  });


</script>

<script>

$(document).ready(function(){
   
    $('form').on('submit', function(e){
     
      e.preventDefault();
$.ajax({
            type: "POST", 
            cache: false, 
            url: "compile.php", 
            datatype: "html", 
            data: $('form').serialize(), 
            success: function(result) { 
                $('#div').html(result);
            }
        });
    });
});
</script>


<label for="out">Output</label><br>
<textarea id='div' name="output" rows="10" cols="50"></textarea><br><br>
</div>
</body>
</html>


