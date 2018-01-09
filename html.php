<html>
<head>
    <title>ONLINE HTML EDITOR</title>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.2.8/ace.js"></script>
    <script src="ace/src-noconflict/ace.js"></script>
    <script src="ace/src-noconflict/ext-language_tools.js"></script>
     <link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
    #outr{
    width: 48%;
    height: 90%;
    float: left;
         border: 2px solid #F0F8FF;
         border-radius: 4px;
    }
#editor {
   width: 100%;
  height: 100%;
   font-size: 18px;
    margin-top: 0;
}
     iframe{
         border: 2px solid #00BFFF;
         width:48%;
           height: 90%;
         float: right;
         background: white;
     }
      input[type=button]{
            padding: 10px 15px;
            border-radius: 4px;
            background-color: #10EE12;
            border: none;
            font-size: 15px;
            color: white;
          height: 40px;
           }
     button[type=button]{
            padding: 15px 30px;
            border-radius: 4px;
            background-color: #00FFFF;
            border: none;
            font-size: 15px;
            color: black;
         font-weight: bold;
         float: right;
           }
     h11{
         color:#FF00FF;
         font-size: 25px;
         font-weight: bold;
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
         padding: 10px 15px;
    }
    .fa-download{
       font-size: 20px;
    }
    select{
        height: 30px;
        border-radius: 4px;
        font-size: 18px;
    }
    label{
        color: rebeccapurple;
        font-size: 20px;
        font-weight: bold;
    }
    </style>   
    
</head>
    <body bgcolor="#DCDCDC">
 
        <center><h1>HTML EDITOR</h1></center>
      <label> SELECT THEME:</label> <select id="theme" onchange="themchng()">
        <option value="twilight" >Twilight</option>
            <option value="monokai">Monokai</option>
            <option value="terminal">Terminal</option>
            <option value="eclipse">Eclipse</option>
            <option value="tomorrow_night_blue">Tomorrow night blue</option>
        <option value="iplastic">Iplastic</option>
        <option value="merbivore_soft">Merbivore Soft</option>
        <option value="cobalt">Cobalt</option>
        </select>
       <a href="KeyupEditor.html" target="_blank"> <button type="button">CLICK FOR KEY UP EDITOR</button></a><br><br>
 <br>
      <div id="outr"> 
          <div id="iner">
              <input onclick="run();" type="button" value="Run Code">
         <button type="button" onclick="downld()" id="dwn"><i class="fa fa-download fa-fw"style="color:black"></i></button>
          </div>
     <div id="editor">
</div>
</div>
<iframe name="tragetCode" id="myframe"></iframe>
    
   <script>
       var editor = ace.edit("editor");
   editor.setTheme("ace/theme/twilight");
   editor.getSession().setMode("ace/mode/html");
        editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion:true
    });
    function themchng(){
           var thems=document.getElementById('theme').value;
        editor.setTheme("ace/theme/"+thems);
         
       }
function run(){
   
  var x = editor.getValue();
     document.getElementById('myframe').srcdoc=x;
           
}
      
function downld(){
         //var textToWrite = document.getElementById("content").value;
         var textToWrite = editor.getValue();
            var textFileAsBlob = new Blob([textToWrite], { type: 'text/plain' });
            var fileNameToSaveAs = "myNewFile.html";
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
   
    </body>
</html>