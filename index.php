<?php require_once("../CRUD2/php/component.php"); 
      require_once("../CRUD2/php/operation.php");
      
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,user-scalable=no, intital-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Books</title>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
<main>
<div class="container text-center">
    <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i>Book Store</h1>
    <div class="d-flex justify-content-center">
           <form action="" method="POST" class="w-50">
           <div class="pt-2">
           <div class="input-group mb-3">
           <?php inputElement("<i class='fas fa-id-badge'></i>","ID","book_id", ""); ?>
           </div>
           <div class="pt-2">
           <?php inputElement("<i class='fas fa-book'></i>","Book Name","book_name", ""); ?>
           <div class="row pt-2">
           <div class="col">
           <?php inputElement("<i class='fas fa-people-carry'></i>","Publisher","book_publisher", ""); ?>
           </div>
           <div class="col">
           <?php inputElement("<i class='fas fa-dollar-sign'></i>","price","book_price", ""); ?>
           </div>
           </div>
           <div class="d-flex justify-content-center">
          
            <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "dat-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
            <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "dat-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
            <?php buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "dat-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
            <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete", "dat-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
            <?php deleteRecord();?>
           </div>
           </form>
    </div>
    <div class="d-flex table-data">
    <table class="table table-striped table-dark">
          <thead class="thead-dark">
          <tr>
          <th>ID</th>
          <th>Book Name</th>
          <th>Publisher</th>
          <th>Book Price</th>
          <th>Edit</th>
          </tr>
          </thead>
          <tbody id="tbody">
          <?php 
            if(isset($_POST['read'])){
                $result=getData();
            }
            if($result){
                while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                    <td data-id="<?php echo $row['book_name']; ?>"><?php echo $row['book_name']; ?></td>
                    <td data-id="<?php echo $row['book_publisher']; ?>"><?php echo $row['book_publisher']; ?></td>
                    <td data-id="<?php echo $row['book_price']; ?>"><?php echo '$'.$row['book_price']; ?></td>
                    <td><i class="fas fa-edit btnedit data-id=<?php echo $row['id']; ?>"></i></td>
                </tr>  
            <?php 
                }
            }
          ?>
          </tbody>
    </table>
    </div>
</div>
</main>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>   
<script src="../CRUD2/php/main.js"></script>
<script>
    $(".btnedit").click( e =>{
    let textvalues = displayData(e);

    let id=$("input[name*='book_id'");
    let bookname=$("input[name*='book_name'");
    let bookpublisher=$("input[name*='book_piblisher'");
    let bookprice=$("input[name*='book_price'");

    id.val(textvalues[0]);
    bookname.val(textvalues[1]);
    bookpublisher.val(textvalues[2]);
    bookprice.val(textvalues[3].replace("$", ""));
});
function displayData(e){
    let id=0;
    const td = $("#tbdoy tr td");
    let textvalues = [];
    for(const value of td){
        if(value.dataset.id == e.target.dataset.id){
           textvalues[id++] = value.textContent;
        }
    }
    return textvalues;
}
</script>
</body>
</html>