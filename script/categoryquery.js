 
  var jsonDataCat = {     
      "Table": [{
          "catid": "registration",
          "catname": "registration"
      }, {
          "catid": "transaction",
          "catname": "transaction"
      }, {
          "catid": "sellerIssue",
          "catname": "seller issue"
      }, {
          "catid": "undelivered",
          "catname": "undelivered"
      }, {
          "catid": "technical",
          "catname": "technical"
      },{
          "catid": "productIssue",
          "catname": "product issue"      
      }]
  };
     $(document).ready(function () {
         var listItems = '<option selected="selected" value="0">Enquiry category</option>';
      for (var i = 0; i < jsonDataCat.Table.length; i++) {
        listItems += "<option value='" + jsonDataCat.Table[i].catid+ "'>" + jsonDataCat.Table[i].catname  + "</option>";
         }     	
         $("#query_category").html(listItems);
     });

