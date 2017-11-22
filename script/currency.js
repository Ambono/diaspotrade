 
  var jsonDataCur = {     
      "Table": [{
          "curid": "CFAFranc",
          "curname": "CFA Franc"
      }, {
         "curid": "Peso",
          "curname": "Peso"
      }, {
          "curid": "Dollar",
          "curname": "Dollar"
      }, {
         "curid": "Euro",
          "curname": "Euro"
      }, {
          "curid": "Yen",
          "curname": "Yen"
      },{
          "curid": "Pound",
          "curname": "Pound"      
      },{
          "curid": "Rupee",
          "curname": "Rupee"      
      },{
         "curid": "Rand",
          "curname": "Rand"     
      },{
          "curid": "Dirham",
          "curname": "Dirham"      
      },{
          "curid": "Naira",
          "curname": "Naira"      
      },{
          "curid": "Yuan",
          "curname": "Yuan"      
      }
  ]
  };
     $(document).ready(function () {
         var listItems = '<option selected="selected" value="0">Currency</option>';
      for (var i = 0; i < jsonDataCur.Table.length; i++) {
        listItems += "<option value='" + jsonDataCur.Table[i].curid+ "'>" + jsonDataCur.Table[i].curname  + "</option>";
         }     	
         $("#item_currency").html(listItems);
     });

