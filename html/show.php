<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX with PHP</title>
    <link rel="stylesheet" href="../css/insert.css">
    <script src="../js/jquery.js"></script>
</head>

<body>

    <h2>insert Data from Database</h2>

    <form>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="email">email:</label>
        <input type="email" name="email" id="email" required>

        <input type="submit" name="submit" id="submit" value="Submit Now">
    </form>
    <h2>Data from Database</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="data-table"></tbody>
    </table>

    <script>
        $(document).ready(function() {
            function load() {
                $.ajax({
                    url: "../php/show.php",
                    method:"GET",
                    dataType: "json",
                    success: function(data) {
                        let rows = "";
                        data.forEach(function(row) {
                            rows += `<tr>
                                            <td>${row.id}</td>
                                            <td>${row.name}</td>
                                            <td>${row.email}</td>
                                        </tr>`;
                        });
                        $("#data-table").html(rows);
                    }
                });
            }
            load();

            $("#submit").on("click",function(e){
                e.preventDefault();
                    var name = $("#name").val();
                    var email = $("#email").val();

                    $.ajax({
                        url:"../php/insert.php",
                        method:"POST",
                        data:{name:name,email:email},
                        success:function(data){
                            if(data == 1){
                                load();
                                $("form").trigger("reset");
                            }
                            else{
                                alert("can't set data");
                            }
                        }
                    });
            });
        });
    </script>

</body>

</html>