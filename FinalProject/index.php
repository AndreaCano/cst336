
<!DOCTYPE html>
<html>
    <head>
        <title> Candy Shop </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
       <link href="https://fonts.googleapis.com/css?family=Aladin|Bonbon|Butterfly+Kids|Gochi+Hand|La+Belle+Aurore" rel="stylesheet">
        <link rel="icon" href="pinkCandy.png" sizes="32x32">

        <style>
            body {
                   	background:url("candy.jpg")left repeat-y,url("candy.jpg") right repeat-y;
                    width:100%;height:100%;

            }
            h1{
                font-family: 'Butterfly Kids', cursive;
                font-size: 4em;
                font-weight: bold;
                padding-top:1em;
                text-align:center;

            }
            form{
               text-align:center;
               color:black;
            }
            nav,#navBar{
                font-family: 'Butterfly Kids', cursive;
                font-size: 2em;
                font-weight: bold;
                display:block;
                text-align: center !important;
                color:black;
                text-decoration:none;
                list-style-type: none;
                position: absolute;
                width:40%;
                margin:0 auto;
                padding-bottom:10px;

            }
            .cLink{
                animation: rainbow 1s infinite; 

            }
            /* Standar Syntax */
@keyframes rainbow{
	20%{color: #fff18e;}
	40%{color: #ff91de;}
	60%{color: #3c6651;}
	80%{color: #89ebf4;}
	70%{color: #bdfc8f;}	
}
            #selections{
                font-family: 'Gochi Hand', cursive;
                padding: none;
                font-size: 2em;
                text-align:center;
            }
  
        </style>
   
    </head>
    <body>
        <div id="navBar"></div>
        <nav class="navbar navbar-expand-lg navbar-light bg-#2ed3cb">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="viewCart.php">Cart</a>
              <a class="nav-item nav-link" href="http://acano-cst336.herokuapp.com/labs/lab1/index.html">About</a>
              <a class="nav-item nav-link" href="adminLogin.php">Admin</a>
            </div>
          </div>
        </nav>
        
</nav>
  
    

    <?php
    session_start();
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection("candy");
    
    //Display the items
    function getItems() {
        global $conn;
        $sql = "SELECT * 
                FROM selection
                INNER JOIN type  
                ON selection.type = type.typeId
                INNER JOIN flavor  
                ON selection.flavor = flavor.flavorId
                WHERE 1";

    if (isset($_GET['search'])){
        
        $namedParameters = array();
        
        
        if (!empty($_GET['candyName'])) {
            //echo $_GET['deviceName'];
    //The following query allows SQL injection due to the single quotes
            $sql .= " AND name LIKE '%" . $_GET['candyName'] . "%'";
  
           // $sql .= " AND deviceName LIKE :deviceName"; //using named parameters
            //$namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%";

         }

           // $sql .= " AND deviceName LIKE :deviceName"; //using named parameters
            //$namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%"
        if (!empty($_GET['type']) && $_GET['type']!= "Select One") {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND typeName = :gType"; //using named parameters
            $namedParameters[':gType'] =   $_GET['type'];
         }  
         if (!empty($_GET['flavor']) && $_GET['flavor']!= "Select One") {
            
            //The following query allows SQL injection due to the single quotes
            //$sql .= " AND deviceName LIKE '%" . $_GET['deviceName'] . "%'";
  
            $sql .= " AND flavorName = :cType"; //using named parameters
            $namedParameters[':cType'] =   $_GET['flavor'];
            
         }

         if(isset($_GET['orderBy'])){
            $sql .= " ORDER BY ".$_GET['orderBy']." ASC";
        } 
    }//endIf (isset)
       
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        showItems($games);
    }
    
    function display($items){
         foreach($items as $candy) {
             echo "Name: ";
            echo "<a href='#' class='cLink' id='".$candy['candyId']."' >". $candy['name'] . "</a><br>";
            echo "Flavor: " . $candy['flavorName'] . " ";
            echo "<form action='addToCart.php' style='display:inline'>";
            echo "<input type='hidden' name='itemId' value='".$candy['candyId']."'>";
            echo '<button class = "btn-info" value="'.$candy['name'].'"><span class="glyphicon glyphicon-ok-sign"></span>Add to cart</button>';
            echo "</form>";
  
            echo "<hr><br>";
            /*echo $item['candyId']." ".$item['name'] . " " . $item['type']."<br>Genre: ".$item['genre'] . "<br>Release: " . $item['game_release']."</a><br>";
            
            echo "<form action='addtocart.php' style='display:inline'>";
            echo "<input type='hidden' name='itemId' value='".$item['game_id']."'>";
            echo '<button value="'.$item['game_name'].'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> &nbsp;&nbsp;&nbsp;Add to cart</button>';
          
            echo "<br />";*/
        }
    }
    
   
    function showItems($items){
        foreach($items as $candy) {
            echo "Name: ";
            echo "<a href='#' class='cLink' id='".$candy['candyId']."' >". $candy['name'] . "</a><br>";
            echo "Type: " . $candy['typeName'] . " ";
            echo "<form action='addToCart.php' style='display:inline'>";
            echo "<input type='hidden' name='itemId' value='".$candy['candyId']."'>";
            echo '<button class = "btn-info" value="'.$candy['name'].'"><span class="glyphicon glyphicon-ok-sign"></span>Add to cart</button>';
            echo "</form>";
  
            echo "<hr><br>";
        }
    }
    
   function getFlavor(){
    global $conn;        
    $sql = "SELECT flavorName, flavorId 
            FROM flavor 
            ORDER BY flavorName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
     foreach ($records as $record) {
        
        echo "<option> "  . $record['flavorName'] . "</option>";
        
    }
    
}
function getype(){
    global $conn;        
    $sql = "SELECT typeName, typeId 
            FROM type 
            ORDER BY typeName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
      foreach ($records as $record) {
        
        echo "<option> "  . $record['typeName'] . "</option>";
        
    }
    
}

    if(!isset($_SESSION['ids']) || empty($_SESSION['ids'])){
        $_SESSION['ids']=array();
    }
?>


<script>

    $(document).ready( function(){
        
        $(".cLink").click( function(){
            
            //alert($(this).attr('id'));
            $('#candyInfoModal').modal("show");
            $.ajax({

                type: "GET",
                url: "getCandyInfo.php",
                dataType: "json",
                data: { "candyId": $(this).attr('id')},
                success: function(data,status) {
                
                  $("#candyInfo").html(" Candy: " + data.name + " $" + data.price + "<br >" + 
                                       data.description);     
                                       
                    $('#candyNameModalLabel').html(data.name);
                    //order matters

                
                },
                complete: function(data,status) { //optional, used for debugging purposes
                //alert(status);
                }
                
            });//ajax
            
            
        }); //.getLink click
        
    });//document.ready

    
</script>


<h1>Welcome to the Candy Shop</h1>

<form method="get">
             Candy Name: <input type="text" name="candyName" placeholder="Candy Name"/><br />
                 <div class="btn-group">
                Type:  <select style="color:black;"name="type" class="selectpicker" >
                <option value="">Select One</option>
                    <?=getype()?>
                </select>
                </div>
                Flavor:  <select style="color:black;"class="selectpicker"  name="flavor">
                <option value="">Select One</option>
                    <?=getFlavor()?>
                </select>
                <br>
            Order by:
            <div class="radio-inline">
            <input type="radio" name="orderBy" id="orderByName" value="name"/> 
             <label for="orderByName"> Name </label></div>
            <div class="radio-inline">
            <input type="radio" name="orderBy" id="orderByPrice" value="price"/> 
             <label for="orderByPrice"> Price </label></div>
            
            <button class="btn" type="submit" name="search" value="Search">Search<span class="glyphicon glyphicon-search"></span></button>
        </form>
        <br>
        <div id= "selections">
        <?php $items = getItems(); ?>
        </div>
<script>
        
       
                $(document).ready(function(){
                    $(".btn-info").click(function(){
                      // $(".alert").removeClass("in").show();
                       //$(".msg").html("<div class='alert alert-success alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a><strong>Added</strong> " + $(this).attr('value') + " item to your cart.</div>")
	                   //$(".alert").delay("slow").addClass("in").fadeOut();
                        alert("Added " + $(this).attr('value') + " item to your cart.");
                    });
                });
        </script>
    </div>
    <div class="col-md-4"></div>
    </div>
    

<!-- Modal -->
<div class="modal fade" id="candyInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="candyNameModalLabel">Candy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div id="candyInfo"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- End Modal -->
 
    </body>
</html>