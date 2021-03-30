<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script>
        function add(){
            var xmlhttp = new XMLHttpRequest();
            model = document.getElementById("model").value;
            marka = document.getElementById("marka").value;
            rok_produkcji = document.getElementById("rok_produkcji").value;
            if(model=="" || marka=="" || rok_produkcji==""){
                alert("Uzupełnij wszystkie pola!");
            }else{
                xmlhttp.open("GET", "add.php?model=" + model + "&marka=" + marka + "&rok_produkcji=" + rok_produkcji, true);
                xmlhttp.send();
                alert("Dodano pojazd.");
                show();
                document.getElementById('model').value='';
                document.getElementById('marka').value='';
                document.getElementById('rok_produkcji').value='';
            }
        }
        function clearFrom(){
            document.getElementById('model').value='';
            document.getElementById('marka').value='';
            document.getElementById('rok_produkcji').value='';
            document.getElementById('id').value='';
            document.getElementById('add_id').style.display = 'block';
            document.getElementById('edit_id').style.display = 'none';
        }
        function del(id){
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "del.php?id=" + id, true);
            xmlhttp.send();
            alert("Usunięto pojazd.");
            show();
            clearFrom();
        }
        function showedit(id, model, marka, rok_produkcji){
            document.getElementById('model').value=model;
            document.getElementById('marka').value=marka;
            document.getElementById('rok_produkcji').value=rok_produkcji;
            document.getElementById('id').value=id;
            document.getElementById('add_id').style.display = 'none';
            document.getElementById('edit_id').style.display = 'block';
        }
        function edit(){
            var xmlhttp = new XMLHttpRequest();
            id = document.getElementById("id").value;
            model = document.getElementById("model").value;
            marka = document.getElementById("marka").value;
            rok_produkcji = document.getElementById("rok_produkcji").value;
            if(model=="" || marka=="" || rok_produkcji==""){
                alert("Uzupełnij wszystkie pola!");
            }else{
                xmlhttp.open("GET", "edit.php?id=" + id + "&model=" + model + "&marka=" + marka + "&rok_produkcji=" + rok_produkcji  , true);
                xmlhttp.send();
                alert("Edytowano pojazd.");
                show();
                clearFrom();
            }
        }
        function show(){
            var obj, dbParam, xmlhttp, myObj, x, txt = "";
            obj = { "table":"customers", "limit":100 };
            dbParam = JSON.stringify(obj);
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                myObj = JSON.parse(this.responseText);
                for (x in myObj) {
                    edit_txt = myObj[x].id+',"'+myObj[x].model+'","'+myObj[x].marka+'","'+myObj[x].rok_produkcji+'"';
                    txt += "<tr><th scope='row'>"+myObj[x].id+"</th><td>"+myObj[x].model+"</td><td>"+myObj[x].marka+"</td><td>"+myObj[x].rok_produkcji+"<button type='button' style='float:right; margin-left:10px;' class='btn btn-danger' onclick='del("+myObj[x].id+")'>Usuń</button><button type='button' style='float:right' class='btn btn-primary' onclick='showedit("+edit_txt+")'>Edytuj</button> </td></tr>";
                }
                document.getElementById("writing_elements").innerHTML = txt;
                }
            };
            xmlhttp.open("POST", "writing_elements.php?sort="+sort, true);
            xmlhttp.send("x=" + dbParam);
        }
        var sort = "id ASC";
        show();
        function sortTable(sortVal){
            if(sort==sortVal+" ASC"){
                sort = sortVal+" DESC";
            }else{
                sort = sortVal+" ASC";
            }
            
            show();
        }
    </script>
</head>
<body>
    <main class="container">
        <br>
        <form action="">
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" class="form-control">
            </div>
            <div class="form-group">
                <label for="marka">Marka:</label>
                <input type="text" id="marka" name="marka" class="form-control">
            </div>
            <div class="form-group">
                <label for="rok_produkcji">Rok produkcji:</label>
                <input type="number" id="rok_produkcji" name="rok_produkcji" class="form-control">
            </div><br>
            <input type="hidden" id="id">
            <button type="button" id="add_id" onclick="add()" class="btn btn-primary">Dodaj</button>
            <button type="button" id="edit_id" style="display:none" onclick="edit()" class="btn btn-primary">Edytuj</button>
        </form>
        <br>
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col" id="id" style="cursor:pointer" onclick="sortTable(this.id)">ID</th>
            <th scope="col" id="model" style="cursor:pointer" onclick="sortTable(this.id)">Model</th>
            <th scope="col" id="marka" style="cursor:pointer" onclick="sortTable(this.id)">Marka</th>
            <th scope="col" id="rok_produkcji" style="cursor:pointer" onclick="sortTable(this.id)">Rok produkcji</th>
            </tr>
        </thead>
        <tbody id="writing_elements">
            
        </tbody>
        </table>
    </main>
    


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</body>
</html>