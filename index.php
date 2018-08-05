<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    
    
           <title>BetIs.Fun (BIF)</title>
           
     <meta http-equiv="refresh" content="23" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<META NAME="author" CONTENT="therealfalcon">
<META NAME="Description" CONTENT="1st Bitcoin Blockchain Based Lottery System ">
<META NAME="Classification" CONTENT="1st Bitcoin Blockchain Based Betting System ">
<META NAME="Keywords" CONTENT="bitcoin,bitcoin lottery, bitcoin betting,bitcoin blockchain,blockchain lottery,bitcoin bet,bet is fun,fun,is,bet">
<META NAME="Language" CONTENT="English">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META NAME="distribution" CONTENT="Global">
<META NAME="Robots" CONTENT="INDEX,FOLLOW">



     
<style>
 .custom-col {
    width: 20%;
    margin-left: auto;
    left: auto;
    right: auto;
    overflow: hidden
}

.aa li a{
  color: white;
 }
 
 
</style>
           </head>  
		
			
			
			
			
<nav> <div class="nav-wrapper brand-logo center">
    Betis.Fun
</div></nav>


 <?php
   
   $winner = "0";
   $txidv = "[yet to be determined]";
   $pizza = file_get_contents("http://pastebin.com/raw/Sr8dzN0Y");
    
    
$pieces = explode(" ", $pizza);
$xpub =  $pieces[0]; 
$amountbet =  $pieces[1]; 
    
    
    
    
    $url = "http://api.smartbit.com.au/v1/blockchain/address/".$xpub;
    $fgc = json_decode(file_get_contents($url), true);
    $new = $fgc["address"]["extkey_next_receiving_address"];
    $old = $fgc["address"]["extkey_addresses"];
   $txidv =  $fgc['address']['transactions'][0]['txid'];
    
    
    $asat = $amountbet *100000000;
    
     $winner = preg_replace("/[^0-9,.]/", "", $fgc["address"]["transactions"][0]["txid"] );
     $winner = substr( $winner, -1 );
 $i = 0 ;


 
 
 ?>

<nav> <div class=" flow-text nav-wrapper  center">
 Bitcoin Blockchain Based Bitcoin Lottery
</div></nav>
           
<nav> <div class=" flow-text nav-wrapper  center">
Book Any Slot By Sending <? echo $amountbet; ?> BTC to that address
</div></nav>
           
           
           
      



                     <div class="container">
            <div class="row">	
  
      
     

 
    
    
            
          
<?php     
     if(!empty($old)){
 foreach ($old as $a) {
 
    $temp = json_decode(file_get_contents("http://api.smartbit.com.au/v1/blockchain/address/" . $a), true);
    $tempbalance = $temp["address"]["total"]["balance_int"];
     $slotbooked = " <small>Slot $i Avaible</small>";
      $imgqr = "http://api.qrserver.com/v1/create-qr-code/?data=bitcoin:$a?amount=$amountbet" ;
     
     
     if($tempbalance >= $asat){
     $slotbooked = "<small>Slot $i <font color=red>Booked</font></small>";
       $imgqr = "$i.png" ;
    }
    
       if($winner == $i){
      $slotbooked = $slotbooked . "<small> <font color=red>[current winner]</font> </small>" ;
       }
      $i++;
     
     
     echo "
		    <div class='col custom-col'><div class=card>
        <div class=card-image><img src=$imgqr></div>
        <div class=card-content>
          <p>$slotbooked </p>
        </div>
		 <div class=card-action>
         <a target=_blank href=http://blockchain.info/payment_request?address=$a&message=Betis.Fun&amount=$amountbet ><small>View Address</small></a>
        </div></div></div>
	 ";
}
}
			
			 if(count($old)<10){
   while( $i < 10 ) {
   $imgqr = "http://api.qrserver.com/v1/create-qr-code/?data=bitcoin:$new?amount=$amountbet" ;
 
 
      echo "
		    <div class='col custom-col'><div class=card>
        <div class=card-image><img src=$imgqr></div>
        <div class=card-content>
          <p><small>Slot $i Avaible </small> </p>
        </div>
		 <div class=card-action>
         <a target=_blank href=http://blockchain.info/payment_request?address=$new&message=Betis.Fun&amount=$amountbet><small>View Address</small></a>
        </div></div></div>
	 ";
	 
$i++;
     }
 }
 
 
			?>
			


		   
   </div>  </div>
  
  

  
  
    <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col s7">
                <h5 class="white-text">Proof :</h4>
                <p>We used this <a class="grey-text text-lighten-4" target=_blank href=http://blockchain.info/xpub/<? echo $xpub; ?> > PublicKey</a> to generate  addresses below, the last transaction to this public key was <a target=_blank class="grey-text text-lighten-4 "  href=http://btc.com/<? echo $txidv; ?> > ....<? echo substr($txidv, -8);  ?></a>, which has <? echo $winner; ?> as its last numerical digit, which is chosen as the winning slot. </p>
              </div>
			  
			      <div class="col s5">
                <h5 class="white-text">How We Pay :</h4>
                <p  >When All Slots Are Filled [Total 10 Slots per game], Winner Gets All Amount To The Address From Which They Paid. [Please Do Not Send From Bitcoin Exchanges, Only use your bitcoin wallet] </p>
              </div>
             
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
           © 2018 Copyright Text
            <a class="grey-text text-lighten-4 right" href="http://bitcointalk.org/index.php?topic=3336476.msg34895495#msg34895495">Bitcointalk</a>
            </div>
          </div>
        </footer>
        
        