<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <script>

    function metodosUsuario(){
        //metodo add usuario
        function addUser(){
            let xhr;
            window.XMLHttpRequest? xhr = new XMLHttpRequest()
            : xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

            xhr.onreadystatechange = () =>{
                if(xhr.readyState == 4 && xhr.status==200){
                    let res = JSON.parse(xhr.responseText);
                    console.log(res);
                }
            };
            let user = {
                    nombre:"Vidal",
                    apellido:"De Los Santos",
                    carrera:"Software",
                    telefono:"809-469-1476",
                    correo:"vidaldls@gmail.com",
                    pass:"1234"
                }
            let data = JSON.stringify(user);
            xhr.open("POST","usuario.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send(`data=${data}&action=addUser`);
        }
        //addUser();

        //metodo update usuario
        function updateUser(){
            let xhr;
            window.XMLHttpRequest? xhr = new XMLHttpRequest()
            : xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

            xhr.onreadystatechange = () =>{
                if(xhr.readyState == 4 && xhr.status==200){
                    let res = JSON.parse(xhr.responseText);
                    console.log(res);
                }
            };
            let user = {
                    id:"1",
                    nombre:"Juan",
                    apellido:"De Los Santos",
                    carrera:"Software",
                    telefono:"809-469-1476",
                    correo:"vidaldls@gmail.com",
                    pass:"1234"
                }
            let data = JSON.stringify(user);
            xhr.open("POST","usuario.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send(`data=${data}&action=updateUser`);
        }
        //updateUser();

        //metodo get todos usuario
        function getAllUsers(){
            let xhr;
            window.XMLHttpRequest? xhr = new XMLHttpRequest()
            : xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

            xhr.onreadystatechange = () =>{
                if(xhr.readyState == 4 && xhr.status==200){
                    let res = JSON.parse(xhr.responseText);
                    console.log(res);
                }
            };
            xhr.open("POST","usuario.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send("action=getAllUsers");
        }
        //getAllUsers();

        //metodo get usuario
        function getUser(){
            let xhr;
            window.XMLHttpRequest? xhr = new XMLHttpRequest()
            : xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

            xhr.onreadystatechange = () =>{
                if(xhr.readyState == 4 && xhr.status==200){
                    let res = xhr.responseText;
                    console.log(res);
                }
            };
            let user = {
                    id:"1"
                }
            let data = JSON.stringify(user);
            xhr.open("POST","usuario.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send(`data=${data}&action=getUser`);
        }
        //getUser();
        
        //metodo delete usuario
        function deleteUser(){
            let xhr;
            window.XMLHttpRequest? xhr = new XMLHttpRequest()
            : xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

            xhr.onreadystatechange = () =>{
                if(xhr.readyState == 4 && xhr.status==200){
                    let res = xhr.responseText;
                    console.log(res);
                }
            };
            let user = {
                    id:"1"
                }
            let data = JSON.stringify(user);
            xhr.open("POST","usuario.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send(`data=${data}&action=deleteUser`);
        }
        //deleteUser();
    }

////////////////////////////////////////////////////////////////////////////////////////////
    function metodosHabilidades(){
            //metodo add habilidad
            function addAbility(){
            let xhr;
            window.XMLHttpRequest? xhr = new XMLHttpRequest()
            : xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

            xhr.onreadystatechange = () =>{
                if(xhr.readyState == 4 && xhr.status==200){
                    let res = xhr.responseText;
                    console.log(res);
                }
            };
            let ability = {
                    nombre:"Desaroollo web",
                    tipo:"uno"
                    
                }
            let data = JSON.stringify(ability);
            xhr.open("POST","habilidades.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send(`data=${data}&action=addAbility`);
        }
        //addAbility();

        //metodo update habilidad
        function updateAbility(){
            let xhr;
            window.XMLHttpRequest? xhr = new XMLHttpRequest()
            : xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

            xhr.onreadystatechange = () =>{
                if(xhr.readyState == 4 && xhr.status==200){
                    let res = JSON.parse(xhr.responseText);
                    console.log(res);
                }
            };
            let ability = {
                    id:"1",
                    nombre:"Desaroollo web",
                    tipo:"dos"
                }
            let data = JSON.stringify(ability);
            xhr.open("POST","habilidades.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send(`data=${data}&action=updateAbility`);
        }
        //updateAbility();

        //metodo get todas habilidades
        function getAllAbilities(){
            let xhr;
            window.XMLHttpRequest? xhr = new XMLHttpRequest()
            : xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

            xhr.onreadystatechange = () =>{
                if(xhr.readyState == 4 && xhr.status==200){
                    let res = JSON.parse(xhr.responseText);
                    console.log(res);
                }
            };
            xhr.open("POST","habilidades.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send("action=getAllAbilities");
        }
        //getAllAbilities();

        //metodo get habilidad
        function getAbility(){
            let xhr;
            window.XMLHttpRequest? xhr = new XMLHttpRequest()
            : xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

            xhr.onreadystatechange = () =>{
                if(xhr.readyState == 4 && xhr.status==200){
                    let res = xhr.responseText;
                    console.log(res);
                }
            };
            let ability = {
                    id:"1"
                }
            let data = JSON.stringify(ability);
            xhr.open("POST","habilidades.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send(`data=${data}&action=getAbility`);
        }
        //getAbility();

        //metodo delete habilidad
        function deleteAbility(){
            let xhr;
            window.XMLHttpRequest? xhr = new XMLHttpRequest()
            : xhr = new ActiveXObject("Microsoft.XMLHTTP"); 

            xhr.onreadystatechange = () =>{
                if(xhr.readyState == 4 && xhr.status==200){
                    let res = xhr.responseText;
                    console.log(res);
                }
            };
            let ability = {
                    id:"1"
                }
            let data = JSON.stringify(ability);
            xhr.open("POST","habilidades.php",true);
            xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.send(`data=${data}&action=deleteAbility`);
        }
        //deleteAbility();
    }
    //metodosHabilidades();
    </script>    
</body>
</html>