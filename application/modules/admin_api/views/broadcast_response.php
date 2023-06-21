<?php if(!isset($outlet_id))
        $outlet_id = 0;
      if(!isset($order_id))
        $order_id = 0;
      if(!isset($status) || empty($status))
        $status = 'false';
      if(!isset($message))
        $message = "Some thing went wrong.";
      $document_number = $outlet_id.','.$order_id;?>

      var data = {
      status: <?=$status ?>,
      message: '<?=$message ?>'
     }
      firebase.firestore().collection('broadcast_order_response').doc('<?=$document_number ?>').set(data).then(function() {
      console.log("Document successfully written!");
  })
  .catch(function(error) {
      console.error("Error writing document: ", error);
  });