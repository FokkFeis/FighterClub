var fighter1_mmr;
var fighter2_mmr;
var selectedFighter1;
var selectedFighter2;
var diff;
var fighter1_roll;
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
    selectedFighter1 = $("#select1 option:selected").text();
    getFighterInfo(selectedFighter1,1);
    selectedFighter2 = $("#select2 option:selected").text();
    getFighterInfo(selectedFighter2,2);
  })
  .trigger("change");

//work in progress
var showFighterInfo = function(jsonData,selector){
  var fighterObj = jQuery.parseJSON(jsonData);
  if (selector === 1) {
    $("#fighter1").html(`
      <p>Name: ${fighterObj.FighterName}</p>
      <p>Strength: ${fighterObj.strength}</p>
      <p>Wins: ${fighterObj.wins}</p>
      <p>League: ${fighterObj.League}</p>`
    );
    fighter1_mmr = fighterObj.strength;
  }else {
    $("#fighter2").html(`
      <p>Name: ${fighterObj.FighterName}</p>
      <p>Strength: ${fighterObj.strength}</p>
      <p>Wins: ${fighterObj.wins}</p>
      <p>League: ${fighterObj.League}</p>`
    );
    fighter2_mmr = fighterObj.strength;
  }

};

var dice = {
  sides: 6,
  roll: function () {
    var randomNumber = Math.floor(Math.random() * this.sides) + 1;
    return randomNumber;
  }
}

$('#fightButton').on('click',function(){
  function diff(mmr1,mmr2){
    var diff;
    if(mmr1 < mmr2){
      diff = mmr1/mmr2;
      return diff;
    }
    if(mmr2 > mmr1){
      diff = mmr2/mmr1
      return diff;
    }
  }


  $('#fightBox').html(diff(fighter2_mmr, fighter1_mmr));
})
