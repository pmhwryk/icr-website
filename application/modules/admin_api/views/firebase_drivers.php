<script type="text/javascript" src="<?=STATIC_FRONT_JS_NEW?>jquery-1.11.3.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.6.0/firebase.js"></script>
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
</script>
<script type="text/javascript">
    var databaseRef = firebase.firestore().collection("drivers_location");
    var driver_array =[];
      databaseRef.get().then(function(querySnapshot) {
        var array = []
        querySnapshot.forEach(function(doc) {
          if (doc && doc.exists) {
            const myData = doc.data();
            var childKey = doc.id;
            var test = {"id":childKey,"lat":myData.lat,"long":myData.lng};
            array.push(test)
          } 
        });
        document.write(JSON.stringify(array))
    });
</script>