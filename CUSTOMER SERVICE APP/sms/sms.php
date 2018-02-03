<!DOCTYPE>
<html>
<head>

<meta charset="UTF-8"/>

<link rel="stylesheet" href="dist/css/bootstrap.min.css">


<script type="text/javascript">
  function eraseText(){document.getElementById("output").value ="";}
</script>

<title>Untitled Document</title>
<style>
 
 body{color: #fff;}
 

  .form-area{
 
  height: 350px;
  width: 100%;
    border: 1px solid;
    border-radius: 5px;
   
    margin: auto;
}

 .button-submit{
  width: 100%;
  border: 1px solid;
  border-radius: 5px;
  font-size: 20px;
  font-weight: 50px;
  color: #fff;
  font-style: bold;
  margin-top: 5px;
  background: #034061;
}

.button-clear{
  
  width: 100%;
  border: 1px solid;
  border-radius: 5px;
  font-size: 20px;
  font-weight: 50px;
  color: #fff;
  font-style: bold;
  margin-top: 5px;
  background: #A41B1B;
}
img{text-align:middle; width: 150px;border-radius: 50px;margin-left:em;margin:;}
</style>
</head>

<body background="image/bg.jpg">

  <div class="container-fluid" >
     <div class="row" >  
      <div class="col-md-6 col-md-offset-3">
              <img src="image/profile.jpg" align="middle">
      </div>  
    </div>
    <div class="row" style="padding-top: 30px;">  
      <div class="col-md-6 col-md-offset-3">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input  type="number" name="phone" class="form-control" placeholder="Phone Number">
            </div >

            <div class="form-group">
            <label for="exampleInputPassword1">Message</label>
            <textarea class="form-area" class="form-control" placeholder="Please Input A Message"  id="output" name="message"></textarea>
            </div>
             <input type="button" class="button-clear"  value="clear" onclick="javascript:eraseText();">
            <button type="submit" class="button-submit" class="btn btn-default " name="submit">Send</button>
            
     </form>

      </div>  
    </div>
  </div>


<?php 
if(isset($_POST['submit'])){
@$phone=$_POST['phone'];
@$message=$_POST['message'];


 // Be sure to include the file you've just downloaded
    require_once('AfricasTalkingGateway.php');
    // Specify your login credentials
    $username   = "sandbox";
    $apikey     = "8292d9a267fc25cead98cc3a62d172cd002781eea0cdb49ae92fd88bb75f71ef";
    // NOTE: If connecting to the sandbox, please use your sandbox login credentials
    // Specify the numbers that you want to send to in a comma-separated list
    // Please ensure you include the country code (+254 for Kenya in this case)
    $recipients = $phone;
    // And of course we want our recipients to know what we really do
    $message    = $message;
    // Create a new instance of our awesome gateway class
    $gateway    = new AfricasTalkingGateway($username, $apikey ,"sandbox");
    // NOTE: If connecting to the sandbox, please add the sandbox flag to the constructor:
    /*************************************************************************************
                 ****SANDBOX****
    $gateway    = new AfricasTalkingGateway($username, $apiKey, "sandbox");
    **************************************************************************************/
    // Any gateway error will be captured by our custom Exception class below, 
    // so wrap the call in a try-catch block
    try 
    { 
      // Thats it, hit send and we'll take care of the rest. 
      $results = $gateway->sendMessage($recipients, $message);
                
      foreach($results as $result) {
        // status is either "Success" or "error message" 
          echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
      }
    }
    catch ( AfricasTalkingGatewayException $e )
    {
      echo "Encountered an error while sending: ".$e->getMessage();
    }

                

  }              

?>
</body>
</html>
