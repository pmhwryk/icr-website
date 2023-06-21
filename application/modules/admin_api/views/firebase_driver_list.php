<?php if(!isset($outlet_id))
        $outlet_id="";
      if(!isset($order_id))
        $order_id=""; ?>
<script src="https://www.gstatic.com/firebasejs/5.6.0/firebase.js"></script>
<script type="text/javascript" src="<?=STATIC_FRONT_JS_NEW?>jquery-1.11.3.min.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyC35Rg9XWCLIKmF_ViLa4vFP9fn9DWfIAE",
    authDomain: "dinehome-9f43d.firebaseapp.com",
    databaseURL: "https://dinehome-9f43d.firebaseio.com",
    projectId: "dinehome-9f43d",
    storageBucket: "dinehome-9f43d.appspot.com",
    messagingSenderId: "790971107783"
  };
  firebase.initializeApp(config);
  var databaseRef = firebase.firestore().collection('drivers_location');
  var broadcast = null;
  var driver_array =[];
      databaseRef.get().then(function(querySnapshot) {
        querySnapshot.forEach(function(doc) {
          
          console.log(doc.data());
          if (doc && doc.exists) {
            const myData = doc.data();
            var childKey = doc.id;
            var data = {id:childKey,lat: myData.lat,long:myData.lng};
            driver_array.push(data);
          } 
        });
        broadcast= $.ajax({
          type: "POST",  
          url: '<?php echo ADMIN_BASE_URL;?>admin_api/broadcast_order_response',  
          data: {"outlet_id":"<?=$outlet_id?>","order_id":"<?=$order_id?>","driver":driver_array},
          complete: function(result) {
            eval(result.responseText)
          }
        });
    });
</script>