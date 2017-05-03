var getFighterInfo = function(fighterName,selector) {
$.ajax({
    url: url + "/fights/ajaxGetFighter",
    type: 'GET',
    data: {fighterName:fighterName},
    success: function(data) {
        showFighterInfo(data,selector);
    },
    error: function () {
        console.log('AJAX ERROR PLES FIX');
    }
});
};

$("select")
  .change(function() {
    var selectedFighter1 = $("#select1 option:selected").text();
    getFighterInfo(selectedFighter1,1);
    var selectedFighter2 = $("#select2 option:selected").text();
    getFighterInfo(selectedFighter2,2);
  })
  .trigger("change");

//work in progress
var showFighterInfo = function(jsonData,selector){
  var fighterObj = jQuery.parseJSON(jsonData);
  if (selector === 1) {
    $("#fighter1").html(`
      <li class="list-group-item">Strength: ${fighterObj.strength}</li>
      <li class="list-group-item">Wins: ${fighterObj.wins}</li>
      <li class="list-group-item">League: ${fighterObj.League}</li>`
    );

  }else {
    $("#fighter2").html(`
      <li class="list-group-item">Strength: ${fighterObj.strength}</li>
      <li class="list-group-item">Wins: ${fighterObj.wins}</li>
      <li class="list-group-item">League: ${fighterObj.League}</li>`
    );
  }
};
