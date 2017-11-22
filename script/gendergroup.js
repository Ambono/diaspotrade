 
  var jsonDataGender = {     
      "Table": [{
          "genderid": "Women",
          "gendername": "Women"
      }, {
         "genderid": "Men",
          "gendername": "Men"
      }, {
          "genderid": "Boys",
          "gendername": "Boys"
      }, {
        "genderid": "Girls",
          "gendername": "Girls"
      }, {
          "genderid": "Not Applicable",
          "gendername": "Not Applicable"
      },{
        "genderid": "Others",
          "gendername": "Others"     
      }]
  };
     $(document).ready(function () {
         var listItems = '<option selected="selected" value="0">Gender group</option>';
      for (var i = 0; i < jsonDataGender.Table.length; i++) {
        listItems += "<option value='" + jsonDataGender.Table[i].genderid+ "'>" + jsonDataGender.Table[i].gendername  + "</option>";
         }     	
         $("#gender").html(listItems);
     });



var jsonDataGender_search = {     
      "Table": [{
          "gender_searchid": "Women",
          "gender_searchname": "Women"
      }, {
         "gender_searchid": "Men",
          "gender_searchname": "Men"
      }, {
          "gender_searchid": "Boys",
          "gender_searchname": "Boys"
      }, {
        "gender_searchid": "Girls",
          "gender_searchname": "Girls"
      }, {
          "gender_searchid": "Not Applicable",
          "gender_searchname": "Not Applicable"
      },{
        "gender_searchid": "Others",
          "gender_searchname": "Others"     
      }]
  };
     $(document).ready(function () {
         var listItems = '<option selected="selected" value="0">Select gender group</option>';
      for (var i = 0; i < jsonDataGender_search.Table.length; i++) {
        listItems += "<option value='" + jsonDataGender_search.Table[i].gender_searchid+ "'>" + jsonDataGender_search.Table[i].gender_searchname  + "</option>";
         }     	
         $("#gendergroup").html(listItems);
     });

