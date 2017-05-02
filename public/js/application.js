var fighter1_mmr =0;
var fighter2_mmr =0;
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
    var tempMMR =fighterObj.strength;
    fighter1_mmr = tempMMR;
  }else {
    $("#fighter2").html(`
      <p>Name: ${fighterObj.FighterName}</p>
      <p>Strength: ${fighterObj.strength}</p>
      <p>Wins: ${fighterObj.wins}</p>
      <p>League: ${fighterObj.League}</p>`
    );
    var tempMMR =fighterObj.strength;
    fighter2_mmr = tempMMR;
  }

};

var dice = {
  sides: 6,
  roll: function () {
    var randomNumber = Math.floor(Math.random() * this.sides) + 1;
    return randomNumber;
  }
}

function getDiff(mmr1,mmr2){

  if(mmr1 < mmr2){
    diff = mmr2/mmr1;
  }
  if(mmr1 > mmr2){
    diff = mmr1/mmr2;
  }
  if(mmr1 == mmr2){
    diff = 0;
  }
}

$('#fightButton').on('click',function(){
  getDiff(Number(fighter2_mmr),Number(fighter1_mmr));
  
  $('#fightBox').html(diff);
})
