 
  var jsonDataCat = {     
      "Table": [{
          "catid": "Clothes",
          "catname": "Clothes"
      }, {
          "catid": "Watches",
          "catname": "Watches"
      }, {
          "catid": "Shoes",
          "catname": "Shoes"
      }, {
          "catid": "Jewellery",
          "catname": "Jewellery"
      }, {
          "catid": "Autos",
          "catname": "Autos"
      },{
          "catid": "Appliances",
          "catname": "Appliances"      
      },{
          "catid": "Event tickets",
          "catname": "Event tickets"      
      },{
          "catid": "Toys",
          "catname": "Toys"      
      },{
          "catid": "Women handbags",
          "catname": "Women handbags"      
      },{
          "catid": "Books",
          "catname": "Books"      
      },{
          "catid": "Electro Games",
          "catname": "Electro Games"      
      }]
  };
     $(document).ready(function () {
         var listItems = '<option selected="selected" value="0">Item category</option>';
      for (var i = 0; i < jsonDataCat.Table.length; i++) {
        listItems += "<option value='" + jsonDataCat.Table[i].catid+ "'>" + jsonDataCat.Table[i].catname  + "</option>";
         }     	
         $("#productcategory").html(listItems);
     });

